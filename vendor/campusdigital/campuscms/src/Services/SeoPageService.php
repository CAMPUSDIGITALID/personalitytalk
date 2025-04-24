<?php

namespace Campusdigital\CampusCMS\Services;

use Illuminate\Support\Facades\Validator;
use Campusdigital\CampusCMS\Models\SeoPage;

class SeoPageService
{
    public function seoStore($request)
    {
        $validator = Validator::make($request, [
            "page" => "nullable|string|max:255",
            "meta_title" => "nullable|string",
            "meta_keyword" => "nullable|string",
            "meta_description" => "nullable|string",
            "active" => "nullable|in:0,1",
        ], array_validation_messages());

        // Mengecek jika ada error
        // if ($validator->fails()) {
        //     // Kembali ke halaman sebelumnya dan menampilkan pesan error
        //     return redirect()->back()->withErrors($validator->errors())->withInput();
        // }
        if ($validator->fails()) {
            return [
                'status' => false,
                'errors' => $validator->errors(),
            ];
        }

        // Jika tidak ada error
        else {
            $data = $request;
            $page = SeoPage::updateOrCreate(
                ['id' => $data['seo_id']], // Kriteria pencarian (ID)
                [ // Data yang akan diupdate atau dibuat
                    'path_file' => $data['page'],
                    'meta_title' => $data['meta_title'],
                    'meta_keyword' => $data['meta_keyword'],
                    'meta_description' => $data['meta_description'],
                    'active' => $data['active'],
                ]
            );

            return [
                'status' => true,
                'data' => $page
            ];
        }
    }
}