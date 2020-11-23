<?php

namespace App\Helpers;
use Auth;
use App\File;
/**
 * Class CategoryHierarchy
 * @package App\Helpers
 */
class FileHelper {
	public static function add_file($file,$dir,$name=""){
		$extension = $file;
        $extension = $file->getClientOriginalExtension(); // getting excel extension
		if($name == ""){
			$filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
		}else{
			$filename = $name."_".uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
		}

        $file->move($dir, $filename);

        $file_id = File::create([
            "name" => $filename,
            "path" => $dir.$filename,
            "user_id" => Auth::user()->id
        ]);

        return $file_id;
	}

	public static function delete_file($id){
		$file = File::find($id);
        $file->delete();
        unlink($file->path);
        return ["Success" => true];
	}
    public static function getMimeType($file){
        return $file->getMimeType();
    }
    public static function getEx($file){
        return $file->getClientOriginalExtension();
    }

}
