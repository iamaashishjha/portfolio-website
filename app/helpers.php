<?php

use App\Models\User;
use App\Utils\DateHelper;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


//get all models
function modelCollection()
{
    $output = [];
    $base_path = \base_path() . '/app/Models';

    //scan all the models/entities in particular module
    $entities = \scandir($base_path);
    foreach ($entities as $entity) {
        if (\str_starts_with($entity, '.')) continue;  //ignore '.' and '..' files
        $output[\strtolower(\substr($entity, 0, -4))] = \substr($entity, 0, -4);
    }
    return $output;
}

//get all models
function getAllPlugins($path = '/public/plugins')
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
        $entityName = Str::replace('/public', '', $entityName);
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
