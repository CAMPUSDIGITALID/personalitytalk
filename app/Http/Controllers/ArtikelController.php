<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Campusdigital\CampusCMS\Models\Blog;
use Campusdigital\CampusCMS\Models\KategoriArtikel;
use Campusdigital\CampusCMS\Models\Komentar;
use Campusdigital\CampusCMS\Models\Kontributor;
use Campusdigital\CampusCMS\Models\Tag;

class ArtikelController extends Controller
{		
    /**
     * Menampilkan semua artikel
     *
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Referral
        referral($request->query('ref'), 'site.artikel.index', ['page' => $request->query('page')]);
		
		// Data artikel
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->orderBy('blog_at','desc')->paginate(12);

        // Data kategori artikel
        $kategori = KategoriArtikel::limit(12)->get();

        // View
        return view('front.artikel.index', [
            'artikel' => $artikel,
            'kategori' => $kategori,
		]);
    }

    /**
     * Menampilkan detail artikel
     *
     * string $permalink
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $permalink)
    {
        // Referral
        referral($request->query('ref'), 'site.artikel.detail', ['permalink' => $permalink]);

        // Data artikel
        $blog = Blog::join('users','blog.author','=','users.id_user')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->where('blog_permalink','=',$permalink)->firstOrFail();

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
        $recents = Blog::join('users','blog.author','=','users.id_user')->orderBy('blog_at','desc')->limit(6)->get();

        // View
        return view('front.artikel.detail', [
            'blog' => $blog,
            'blog_tags' => $blog_tags,
            'blog_komentar' => $blog_komentar,
            'kategori' => $kategori,
            'recents' => $recents,
            'tag' => $tag,
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan kategori
     *
     * string $category
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function byCategory(Request $request, $category)
    {
        // Referral
        referral($request->query('ref'), 'site.artikel.by-category', ['permalink' => $category, 'page' => $request->query('page')]);

        // Get kategori
        $kategori = KategoriArtikel::where('slug','=',$category)->firstOrFail();

        // Data artikel
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->where('blog_kategori','=',$kategori->id_ka)->orderBy('blog_at','desc')->paginate(12);

        $kategori_head = KategoriArtikel::limit(12)->get();

        // View
        return view('front.artikel.by-category', [
            'kategori' => $kategori,
            'artikel' => $artikel,
            'kategori_head' => $kategori_head,
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan author
     *
     * string $author
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function byAuthor(Request $request, $author)
    {
        // Referral
        referral($request->query('ref'), 'site.artikel.by-author', ['username' => $author, 'page' => $request->query('page')]);

        // Get user
        $user = User::where('username','=',$author)->firstOrFail();

        // Data artikel
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->where('author','=',$user->id_user)->where('blog_kontributor','=',0)->orderBy('blog_at','desc')->paginate(12);

        // View
        return view('front.artikel.by-author', [
            'user' => $user,
            'artikel' => $artikel,
        ]);
    }

    /**
     * Menampilkan artikel berdasarkan kontributor
     *
     * string $contributor
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function byContributor(Request $request, $contributor)
    {
        // Referral
        referral($request->query('ref'), 'site.artikel.by-contributor', ['username' => $contributor, 'page' => $request->query('page')]);

        // Get kontributor
        $user = Kontributor::where('slug','=',$contributor)->firstOrFail();

        // Data artikel
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->where('blog_kontributor','=',$user->id_kontributor)->orderBy('blog_at','desc')->paginate(12);

        // View
        return view('front.artikel.by-contributor', [
            'user' => $user,
            'artikel' => $artikel,
        ]);
    }

    /**
     * Search Article
     *
     * string $permalink
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        // Keyword dan kategori
        $q = $request->query('q');

        // Referral
        referral($request->query('ref'), 'site.artikel.search', ['q='.$q]);

        // Result Article
        $artikel = Blog::join('users','blog.author','=','users.id_user')->join('kontributor','blog.blog_kontributor','=','kontributor.id_kontributor')->orderBy('blog_at','desc')->where('blog_title','like','%'.$q.'%')->orWhere('konten','like','%'.$q.'%')->orWhere('blog_kategori','like','%'.$q.'%')->paginate(12);

        // View
        return view('front.artikel.search', [
            'artikel' => $artikel,
        ]);
    }

}
