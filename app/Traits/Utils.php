<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Utils
{
    //get all plugins from plugins directory
    public function getAllPluginsForWebMix($path = '/public/plugins')
    {
        $cssFiles = [];
        $jsFiles = [];
        $base_path = \base_path() . $path;
        $entities = \scandir($base_path);
        foreach ($entities as $entity) {

            $jsFilesStatusCheck = Str::endsWith($entity, '.js') || Str::endsWith($entity, '.min..js') || Str::endsWith($entity, '.js.map');
            $cssFilesStatusCheck = Str::endsWith($entity, '.css') || Str::endsWith($entity, '.min.css') || Str::endsWith($entity, '.css.map');
            $ignoreFilesStatusCheck = Str::startsWith($entity, '.'); //ignore '.' and '..' files
            $entityName = $path . '/' . $entity;

            if ($ignoreFilesStatusCheck) {
                continue;
            }

            if ($jsFilesStatusCheck) {
                array_push($jsFiles, $entityName);
            } elseif ($cssFilesStatusCheck) {
                array_push($cssFiles, $entityName);
            }else{
                continue;
            }

        }
        return [
            'cssFiles' => $cssFiles,
            'jsFiles' => $jsFiles
        ];
    }
}
