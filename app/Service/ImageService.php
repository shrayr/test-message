<?php

namespace App\Services;


class ImageService {

    /**
     * Save images
     * @param $file
     * @param $object
     * @return string
     */
    public static function saveImage($file, $object){
        if ($file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(
                base_path() . '/public/files/', $fileName
            );
            $object->file = $fileName;
            $object->save();
        }
    }
}