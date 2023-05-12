<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Campusdigital\CampusCMS\Models\Psikolog;

class PsikologController extends Controller
{
    /**
     * Menampilkan data psikolog
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Referral
        referral($request->query('ref'), 'site.psikolog.index');

        // Data psikolog
        $psikolog = Psikolog::all();

        // View
        return view('front.psikolog.index', [
            'psikolog' => $psikolog,
        ]);
    }
}
