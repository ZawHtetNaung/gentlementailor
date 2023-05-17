<?php
namespace App;

use App\Ads;
use Illuminate\Support\Carbon;


class Ajax{


    public function encode($request,$folderPath){

        // $folderPath = public_path('images/news/');

        foreach($request as $re){
          $image_parts = explode(";base64,", $re);
          $image_type_aux = explode("image/", $image_parts[0]);
          // $image_type = $image_type_aux[1];
          $image_base64 = base64_decode($image_parts[1]);

          $imageName = uniqid() . '.png';

          $imageFullPath = $folderPath.$imageName;


          file_put_contents($imageFullPath, $image_base64);
        }

        return $imageName;
    }

    public function fileStore($file,$folderPath){

      $newFileName = uniqid() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path($folderPath), $newFileName);

      return $newFileName;
    }



}
