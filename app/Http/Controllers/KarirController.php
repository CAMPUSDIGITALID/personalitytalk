<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Campusdigital\CampusCMS\Models\Karir;

class KarirController extends Controller
{

    /**
     * Menampilkan data karir
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {		
        // Referral
		if($request->query('page') !== null)
        	referral($request->query('ref'), 'site.karir.index', ['page' => $request->query('page')]);
		else
        	referral($request->query('ref'), 'site.karir.index');

        // Data karir
        $karir = Karir::join('users','karir.author','=','users.id_user')->orderBy('karir_at','desc')->paginate(12);

        // View
        return view('front.karir.index', [
            'karir' => $karir
        ]);
    }


    /**
     * Menampilkan detail karir
     *
     * string $permalink
     * @return \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request, $permalink)
    {		
        // Referral
        referral($request->query('ref'), 'site.karir.detail', ['permalink' => $permalink]);
		
		// Data karir
        $karir = Karir::join('users','karir.author','=','users.id_user')->where('karir_permalink','=',$permalink)->firstOrFail();

        // View
        return view('front.karir.detail', [
			'karir' => $karir,
            'permalink' => $permalink
        ]);
    }
}
