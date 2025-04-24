<?php
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Campusdigital\CampusCMS\Models\SeoPage;


if (!function_exists('getBladeFiles')) {
    function getBladeFiles(string $subFolder = ''): Collection
    {
        $basePath = resource_path('views' . ($subFolder ? '/' . trim($subFolder, '/') : ''));

        if (!File::exists($basePath)) {
            return collect();
        }

        return collect(File::allFiles($basePath))
            ->filter(function ($file) {
                return Str::endsWith($file->getFilename(), '.blade.php');
            })
            ->map(function ($file) use ($basePath) {
                // Ambil path relatif terhadap base path, tanpa prefix subfolder
                $relativePath = str_replace($basePath . DIRECTORY_SEPARATOR, '', $file->getPathname());

                return str_replace(DIRECTORY_SEPARATOR, '/', $relativePath);
            });
    }
}

if(!function_exists('seo_setting')){
    function seo_setting($value){
        $cek_seo = SeoPage::where('path_file', '=', $value)->first();

        $cek_seo->meta_keyword = $cek_seo->active == 1 ? $cek_seo->meta_keyword.','.setting('site.keywords') : $cek_seo->meta_keyword;
        $cek_seo->meta_description = $cek_seo->active == 1 ? $cek_seo->meta_description.','.setting('site.description') :  $cek_seo->meta_description;
        $cek_seo->meta_title = $cek_seo->active == 1 ? $cek_seo->meta_title.' | '.setting('site.name').' - '.setting('site.tagline') :  $cek_seo->meta_title;

        return $cek_seo;
    }
}


