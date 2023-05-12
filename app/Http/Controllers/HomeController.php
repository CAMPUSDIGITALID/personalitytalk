<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Campusdigital\CampusCMS\Models\Karir;
use Campusdigital\CampusCMS\Models\Mitra;
use Campusdigital\CampusCMS\Models\Program;
use Campusdigital\CampusCMS\Models\Slider;
use App\User;

class HomeController extends Controller
{		
    /**
     * Home Page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Referral
        referral($request->query('ref'), 'site.home');

        // Get data slider
        $slider = Slider::where('status_slider','=',1)->orderBy('order_slider')->get();

        // Data program e-learning
        $program_elearning = Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('kategori_program.slug','=','e-learning')->orderBy('program_at','asc')->limit(5)->get();

        // Data program online course
        $program_course = Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('kategori_program.slug','=','online-course')->orderBy('program_at','asc')->limit(5)->get();

        // Data program workshop
        $program_workshop = Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('kategori_program.slug','=','workshop')->orderBy('program_at','asc')->limit(5)->get();

        // Data program sertifikasi
        $program_sertifikasi = Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('kategori_program.slug','=','sertifikasi')->orderBy('program_at','asc')->limit(5)->get();

        // Data karir
        $karir = Karir::orderBy('karir_at','desc')->limit(5)->get();
		
		// Get data mitra
		$mitra = Mitra::all();

        // View
        return view('front.home', [
            'karir' => $karir,
			'mitra' => $mitra,
            'program_elearning' => $program_elearning,
            'program_course' => $program_course,
            'program_workshop' => $program_workshop,
            'program_sertifikasi' => $program_sertifikasi,
			'slider' => $slider,
		]);
    }
}
