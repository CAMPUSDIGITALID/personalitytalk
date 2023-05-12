<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Campusdigital\CampusCMS\Models\KategoriProgram;
use Campusdigital\CampusCMS\Models\Program;

class ProgramController extends Controller
{
    /**
     * Menampilkan program berdasarkan kategori
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category)
    {
        // Referral
		if($request->query('page') !== null)
        	referral($request->query('ref'), 'site.program.index', ['category' => $category, 'page' => $request->query('page')]);
		else
        	referral($request->query('ref'), 'site.program.index', ['category' => $category]);

		// Data kategori
		$kategori = KategoriProgram::where('slug','=',$category)->firstOrFail();
		
        // Data program
        $program = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_kategori',$kategori->id_kp)->orderBy('program_at','asc')->paginate(12);

        // View
        return view('front.program.index', [
			'kategori' => $kategori->kategori,
            'program' => $program
        ]);
    }

    /**
     * Menampilkan detail program
     *
     * string $permalink
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $permalink)
    {		
        // Referral
        referral($request->query('ref'), 'site.program.detail', ['permalink' => $permalink]);

        // Data program
        $program = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_permalink','=',$permalink)->firstOrFail();

        // Data program list
        $program_list = Program::join('users','program.author','=','users.id_user')->join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('program_kategori',$program->id_kp)->orderBy('program_at','asc')->limit(5)->get(); 

        // View
        return view('front.program.detail', [
            'program' => $program,
            'program_list' => $program_list
        ]);
    }
}
