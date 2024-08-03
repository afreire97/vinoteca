<?php

namespace App\Services;
use Illuminate\Http\UploadedFile;

class UploadService
{
    /**
     * Create a new class instance.
     */


    public static function upload(UploadedFile $file, $folder, $disk='public')
    {



        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $extension = $file->getClientOriginalExtension();
        $filename = $filename . '-' - time() . '.' . $extension;

        return $file->storeAs($folder, $filename, $disk);



    }

    public static function delete($path, $disk = 'public')
    {

        if(! Storage::disk($disk)->exists($path))
        {
            return false;
        }

        return Storage::disk($disk)->delete($path);


    }
    public static function url($path, $disk = 'public')
    {


        return Storage::disk($disk)->url($path);


    }
}
