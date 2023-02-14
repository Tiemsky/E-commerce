<?php

namespace App\Services;

class Uploader{

    function upload($request,$file_name, $path)
        {
            $image = $request->file($file_name);
            if (!$image) {
                return false;
            }
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $image_url = $path.$image_full_name;
            $image->move($path,$image_full_name);
            return $image_url;
        }
}