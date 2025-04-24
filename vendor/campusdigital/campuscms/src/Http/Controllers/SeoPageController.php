<?php

namespace Campusdigital\CampusCMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Campusdigital\CampusCMS\Models\SeoPage;
use Campusdigital\CampusCMS\Services\SeoPageService;


class SeoPageController extends Controller
{

    public function index()
    {
        has_access(generate_method(__METHOD__), Auth::user()->role);

        $files_path = getBladeFiles('front');
        $files = $files_path->map(function ($file) {
            return str_replace('.blade.php', '', $file); // Hapus ekstensi
        });

        // dd($files);
        $updatedItems = [];

        foreach ($files as $item) {
            if (strpos($item, '/detail') !== false) {
                // $item = str_replace('/detail', '/page', $item);
                continue;
            }
            if (strpos($item, '/index') !== false) {
                $item = str_replace('/index', '/homepage', $item);
            }
            $updatedItems[] = $item;
        }

        // dd($updatedItems);

        $seo_db = SeoPage::whereIn('path_file', $updatedItems)->get()->toArray();
        $fl = $updatedItems;

        // Buat map dari seo_db berdasarkan path_file
        $seo_map = [];
        foreach ($seo_db as $seo) {
            $seo_map[$seo['path_file']] = $seo;
        }
        // dd($seo_map);
        $array_seo = [];
        foreach ($fl as $i => $path) {
            $array_seo[$i]['id'] = isset($seo_map[$path]) ? $seo_map[$path]['id'] : null;
            $array_seo[$i]['path_file'] = $path;
            $array_seo[$i]['meta_title'] = isset($seo_map[$path]) ? $seo_map[$path]['meta_title'] : null;
            $array_seo[$i]['meta_description'] = isset($seo_map[$path]) ? $seo_map[$path]['meta_description'] : null;
            $array_seo[$i]['meta_keyword'] = isset($seo_map[$path]) ? $seo_map[$path]['meta_keyword'] : null;
            $array_seo[$i]['url_page'] = isset($seo_map[$path]) ? $seo_map[$path]['url_page'] : null;
            $array_seo[$i]['active'] = isset($seo_map[$path]) ? $seo_map[$path]['active'] : null;
            $array_seo[$i]['updated_at'] = isset($seo_map[$path]) ? $seo_map[$path]['updated_at'] : null;
        }

        $collection_array = collect($array_seo);
        // dd($collection_array);
        return view('faturcms::admin.seoPage.index', [
            'files' => $collection_array,
        ]);
    }

    public function store(Request $request,SeoPageService $seoPageService)
    {

        $result = $seoPageService->seoStore($request->all());

        if (!$result['status']) {
            return redirect()->back()->withErrors($result['errors'])->withInput();
        }
    
        return redirect()->route('admin.seo.index')->with(['message' => 'Berhasil Mengupdate data.']);

    }
}
