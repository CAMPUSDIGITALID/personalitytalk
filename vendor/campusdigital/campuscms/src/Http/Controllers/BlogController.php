<?php

namespace Campusdigital\CampusCMS\Http\Controllers;

use Auth;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Campusdigital\CampusCMS\Models\Tag;
use Campusdigital\CampusCMS\Models\Blog;
use Illuminate\Support\Facades\Validator;
use Campusdigital\CampusCMS\Models\Komentar;
use Campusdigital\CampusCMS\Models\Kontributor;
use Campusdigital\CampusCMS\Models\KategoriArtikel;
use Campusdigital\CampusCMS\Services\SeoPageService;

class BlogController extends Controller
{
    /**
     * Menampilkan data blog
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check Access
        has_access(generate_method(__METHOD__), Auth::user()->role);

        // Data blog
        $blog = Blog::join('users','blog.author','=','users.id_user')->join('kategori_artikel','blog.blog_kategori','=','kategori_artikel.id_ka')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->orderBy('blog_at','desc')->get();
		
        // View
        return view('faturcms::admin.blog.index', [
            'blog' => $blog,
        ]);
    }

    /**
     * Menampilkan form tambah blog
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check Access
        has_access(generate_method(__METHOD__), Auth::user()->role);

        // Kategori
        $kategori = KategoriArtikel::orderBy('id_ka','desc')->get();

        // Kontributor
        $kontributor = Kontributor::where('id_kontributor','>',0)->orderBy('kontributor','asc')->get();
        $files = collect(['blog']);
        // View
        return view('faturcms::admin.blog.create', [
            'kategori' => $kategori,
            'files' => $files,
            'kontributor' => $kontributor,
        ]);
    }

    /**
     * Menambah blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SeoPageService $seoPageService)
    {
        $validator = Validator::make($request->all(), [
            'judul_artikel' => 'required|max:255',
            'kategori' => 'required',
            'gambar' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    // Jika file upload
                    if ($request->hasFile('gambar')) {
                        $file = $request->file('gambar');
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (!in_array($ext, ['jpeg', 'jpg', 'png', 'webp'])) {
                            return $fail('Gambar harus berformat jpeg, jpg, png, atau webp.');
                        }
                        if (!$file->isValid()) {
                            return $fail('Upload gambar tidak valid.');
                        }
                    }
                    // Jika base64
                    elseif (is_string($value) && preg_match('/^data:image\/(jpeg|jpg|png|webp);base64,/', $value)) {
                        $image = explode(',', $value)[1];
                        $decoded = base64_decode($image, true);
                        if (!$decoded || !@imagecreatefromstring($decoded)) {
                            return $fail('Data gambar base64 tidak valid.');
                        }
                    }
                    // Bukan file dan bukan base64
                    elseif (!empty($value)) {
                        return $fail('Format gambar tidak dikenali.');
                    }
                },
            ],
            'konten' => 'required|string',
        ], array_validation_messages());
        
        
        // Mengecek jika ada error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->only([
                'judul_artikel',
                'kategori',
                'gambar',
                'konten'
            ]));
        }      
        DB::beginTransaction();
        
        try {
            // Menambah data blog
            $blog = new Blog;
            $blog->blog_title = $request->judul_artikel;
            $blog->blog_permalink = slugify($request->judul_artikel, 'blog', 'blog_permalink', 'id_blog', null);
            $blog->blog_gambar = generate_image_name("assets/images/blog/", $request->gambar, $request->gambar_url);
            $blog->blog_kategori = $request->kategori;
            $blog->blog_tag = generate_tag_by_name($request->get('tag'));
            $blog->blog_kontributor = $request->kontributor != null ? $request->kontributor : 0;
            $blog->konten = htmlentities(upload_quill_image($request->konten, 'assets/images/konten-blog/'));
            $blog->author = Auth::user()->id_user;
            $blog->blog_at = date('Y-m-d H:i:s');
            $blog->save();
        
            // Proses penyimpanan SEO
            $result = $seoPageService->seoStore($request->all());
            if (!$result['status']) {
                // Rollback jika SEO gagal
                DB::rollBack();
                return redirect()->back()->withErrors($result['errors'])->withInput();
            }
            $blog->seo_page_id = $result['data']->id;
            $blog->save();
        
            // Commit jika semua berhasil
            DB::commit();
        
            return redirect()->route('admin.blog.index')->with(['message' => 'Berhasil menambah data.']);
        
        } catch (Exception $e) {
            // Rollback jika terjadi exception
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Menampilkan form edit blog
     *
     * int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check Access
        has_access(generate_method(__METHOD__), Auth::user()->role);

    	// Data blog
    	$blog = Blog::with('seoPage')->where('id_blog',$id)->first();

        // Kategori
        $kategori = KategoriArtikel::orderBy('id_ka','desc')->get();

        // Kontributor
        $kontributor = Kontributor::where('id_kontributor','>',0)->orderBy('kontributor','asc')->get();
        $files = $blog->seoPage;
        // dd($files);

        // View
        return view('faturcms::admin.blog.edit', [
        	'blog' => $blog,
            'files' => $files,
            'kategori' => $kategori,
        	'kontributor' => $kontributor,
        ]);
    }

    /**
     * Mengupdate blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeoPageService $seoPageService)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            'judul_artikel' => 'required|max:255',
            'kategori' => 'required',
            'gambar' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    // Jika file upload
                    if ($request->hasFile('gambar')) {
                        $file = $request->file('gambar');
                        $ext = strtolower($file->getClientOriginalExtension());
                        if (!in_array($ext, ['jpeg', 'jpg', 'png', 'webp'])) {
                            return $fail('Gambar harus berformat jpeg, jpg, png, atau webp.');
                        }
                        if (!$file->isValid()) {
                            return $fail('Upload gambar tidak valid.');
                        }
                    }
                    // Jika base64
                    elseif (is_string($value) && preg_match('/^data:image\/(jpeg|jpg|png|webp);base64,/', $value)) {
                        $image = explode(',', $value)[1];
                        $decoded = base64_decode($image, true);
                        if (!$decoded || !@imagecreatefromstring($decoded)) {
                            return $fail('Data gambar base64 tidak valid.');
                        }
                    }
                    // Bukan file dan bukan base64
                    elseif (!empty($value)) {
                        return $fail('Format gambar tidak dikenali.');
                    }
                },
            ],
            'konten' => 'required|string',
        ], array_validation_messages());
        
        // Mengecek jika ada error
        if($validator->fails()){
            // Kembali ke halaman sebelumnya dan menampilkan pesan error
            return redirect()->back()->withErrors($validator->errors())->withInput($request->only([
                'judul_artikel',
                'kategori',
                'gambar',
                'konten'
            ]));
        }
        // Jika tidak ada error
        else{

            DB::beginTransaction();
        
            try {
                 // Mengupdate data
                $blog = Blog::find($request->id);
                $blog->blog_title = $request->judul_artikel;
                $blog->blog_permalink = slugify($request->judul_artikel, 'blog', 'blog_permalink', 'id_blog', $request->id);
                $blog->blog_gambar = generate_image_name("assets/images/blog/", $request->gambar, $request->gambar_url) != '' ? generate_image_name("assets/images/blog/", $request->gambar, $request->gambar_url) : $blog->blog_gambar;
                $blog->blog_kategori = $request->kategori;
                $blog->blog_tag = generate_tag_by_name($request->get('tag'));
                $blog->blog_kontributor = $request->kontributor != null ? $request->kontributor : 0;
                $blog->konten = htmlentities(upload_quill_image($request->konten, 'assets/images/konten-blog/'));
                $blog->save();
            
                // Proses penyimpanan SEO
                $result = $seoPageService->seoStore($request->all());
                if (!$result['status']) {
                    // Rollback jika SEO gagal
                    DB::rollBack();
                    return redirect()->back()->withErrors($result['errors'])->withInput();
                }
                $blog->seo_page_id = $result['data']->id;
                $blog->save();
            
                // Commit jika semua berhasil
                DB::commit();
            
                return redirect()->route('admin.blog.edit', ['id' => $request->id])->with(['message' => 'Berhasil mengupdate data.']);
            
            } catch (Exception $e) {
                // Rollback jika terjadi exception
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
            }


           
        }

        // Redirect
    }

    /**
     * Menghapus blog
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // Check Access
        has_access(generate_method(__METHOD__), Auth::user()->role);
        
    	// Menghapus data
        $blog = Blog::find($request->id);
        $blog->delete();

        // Redirect
        return redirect()->route('admin.blog.index')->with(['message' => 'Berhasil menghapus data.']);
    }
      
    /**
     * Menampilkan file gambar
     *
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function showImages(Request $request)
    {
        echo json_encode(generate_file(public_path('assets/images/blog'), ['..png']));
    }

    /**
     * Menampilkan semua artikel
     *
     * @return \Illuminate\Http\Response
     */
    public function posts()
    {
        // Data artikel
        $blogs = Blog::join('users','blog.author','=','users.id_user')->orderBy('blog_at','desc')->paginate(9);

        // View
        return view('artikel/guest/blogs', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan kategori
     *
     * string $category
     * @return \Illuminate\Http\Response
     */
    public function categories($category)
    {
        // Data kategori
        $kategori = KategoriArtikel::where('slug','=',$category)->first();

        if(!$kategori){
            return redirect('/artikel');
        }
        
        // Data artikel
        $blogs = Blog::join('users','blog.author','=','users.id_user')->where('blog_kategori','=',$kategori->id_ka)->orderBy('blog_at','desc')->paginate(9);

        // View
        return view('artikel/guest/kategori', [
            'blogs' => $blogs,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan tag
     *
     * string $tag
     * @return \Illuminate\Http\Response
     */
    public function tags($tag)
    {
        // Data tag
        $tag = Tag::where('slug','=',$tag)->first();

        if(!$tag){
            return redirect('/artikel');
        }

        // Data artikel
        $blogs = Blog::join('users','blog.author','=','users.id_user')->orderBy('blog_at','desc')->get();

        // Tag filter
        $ids = array();
        foreach($blogs as $key=>$blog){
            if($blog->blog_tag != ''){
                $explode = explode(',', $blog->blog_tag);
                if(in_array($tag->id_tag, $explode)){
                    array_push($ids, $blog->id_blog);
                }
            }
        }

        // Data artikel setelah di filter
        $blogs = Blog::join('users','blog.author','=','users.id_user')->whereIn('id_blog',$ids)->orderBy('blog_at','desc')->paginate(9);

        // View
        return view('artikel/guest/tag', [
            'blogs' => $blogs,
            'tag' => $tag,
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan pencarian
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {        
        // Data artikel
        $blogs = Blog::join('users','blog.author','=','users.id_user')->join('kategori_artikel','blog.blog_kategori','=','kategori_artikel.id_ka')->where('blog_title','like','%'.$request->keyword.'%')->orWhere('konten','like','%'.$request->keyword.'%')->orWhere('kategori','like','%'.$request->keyword.'%')->orderBy('blog_at','desc')->paginate(9);

        // View
        return view('artikel/guest/search', [
            'blogs' => $blogs,
            'keyword' => $request->keyword,
        ]);
    }

    /**
     * Menampilkan konten
     *
     * string $permalink
     * @return \Illuminate\Http\Response
     */
    public function post($permalink)
    {
        // Data artikel
        $blog = Blog::join('users','blog.author','=','users.id_user')->where('blog_permalink','=',$permalink)->first();

        if(!$blog){
            abort(404);
        }

        // Tag artikel
        $blog_tags = array();
        if($blog->blog_tag != ''){
            $explode = explode(",", $blog->blog_tag);
            foreach($explode as $id){
                $tag = Tag::find($id);
                array_push($blog_tags, $tag);
            }
        }

        // Komentar
        $blog_komentar = Komentar::join('users','komentar.id_user','=','users.id_user')->where('id_artikel','=',$blog->id_blog)->where('komentar_parent','=',0)->orderBy('komentar_at','desc')->get();

        // Kategori
        $kategori = KategoriArtikel::orderBy('id_ka','desc')->get();

        // Tag
        $tag = Tag::limit(10)->get();

        // Artikel terbaru
        $recents = Blog::join('users','blog.author','=','users.id_user')->orderBy('blog_at','desc')->limit(3)->get();

        // View
        return view('artikel/guest/post', [
            'blog' => $blog,
            'blog_tags' => $blog_tags,
            'blog_komentar' => $blog_komentar,
            'kategori' => $kategori,
            'recents' => $recents,
            'tag' => $tag,
        ]);
    }

    /**
     * Mengirim komentar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        // Mengirim komentar
        $komentar = new Komentar;
        $komentar->id_user = Auth::user()->id_user;
        $komentar->id_artikel = $request->id_artikel;
        $komentar->komentar = $request->komentar;
        $komentar->komentar_parent = $request->komentar_parent;
        $komentar->komentar_at = date('Y-m-d H:i:s');
        $komentar->save();

        // Data artikel
        $blog = Blog::find($request->id_artikel);

        // Redirect
        return redirect('/artikel/'.$blog->blog_permalink);
    }

    /**
     * Menghapus komentar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteComment(Request $request)
    {
        // Get komentar
        $komentar = Komentar::find($request->id_komentar);

        // Mencari dan menghapus anak komentar
        $children = Komentar::where('komentar_parent','=',$komentar->id_komentar)->get();
        if(count($children)>0){
            foreach($children as $data){
                $child = Komentar::find($data->id_komentar);
                $child->delete();
            }
        }

        // Menghapus komentar
        $komentar->delete();

        // Data artikel
        $blog = Blog::find($komentar->id_artikel);

        // Redirect
        return redirect('/artikel/'.$blog->blog_permalink);
    }
}
