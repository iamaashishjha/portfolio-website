<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileTrait
{
    public function uploadFileToDisk($request, $requestName, $destinationPath, $oldPath = null)
    {
        $fileName = null;
        if(isset($oldFilePath)) {
            $fileName = $oldFilePath;
        }
        if ($request->has($requestName)) {
            $fileName = $request->{$requestName}->store($destinationPath, 'public');
            if($oldPath){
                $oldFilePath = $destinationPath.'/'.$oldPath;
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
        }
        return $fileName;
    }


    public function uploadFileToDiskFromArray($requestsArr, $requestName, $destinationPath, $oldPath = null){
        $fileName = null;
        if(isset($oldFilePath)) {
            $fileName = $oldFilePath;
        }

        if (array_key_exists($requestName, $requestsArr)) {
            $fileName = $requestsArr[$requestName]->store($destinationPath, 'public');
            if($oldPath){
                $oldFilePath = $destinationPath.'/'.$oldPath;
                if (Storage::exists($oldFilePath)) {
                    Storage::delete($oldFilePath);
                }
            }
        }

        $requestsArr[$requestName] = $fileName;
        return $fileName;
    }
}
