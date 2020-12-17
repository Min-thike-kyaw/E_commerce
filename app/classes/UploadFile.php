<?php

namespace App\Classes;

class UploadFile
{
    private $filename;
    private $ext;
    private $maxsize = 2197152;
    private $path;

    public function setName($file, $name="")
    {
        if( empty($name)) {
            $name = pathinfo($file->file->tmp_name, PATHINFO_FILENAME);
        }
        $name = strtolower(str_replace(["_", " "], "-", $name));
        $hash = md5(microtime());
        $ext = pathinfo($file->file->name, PATHINFO_EXTENSION);
        $this->filename = "{$hash}-{$name}.{$ext}" ;

        return $this->filename;
    }

    public function checkSize($file)
    {
        return $file->file->size < $this->maxsize;
    }

    public function isImage($file)
    {
        $ext = pathinfo($file->file->name, PATHINFO_EXTENSION);
        $validEx = ["jpg","jpeg", "png", "bmp", "gif", 'jfif'];
        return in_array($ext, $validEx);
        
    }

    public function getPath()
    {
        return $this->path;
    }
    
    public function move($file)
    {
        $name = self::setName($file);

        if ($this->isImage($file)) {
            if ($this->checkSize( $file)) {
                $path = APP_ROOT . "/public/assets/uploads/";
            if(!is_dir($path)){
                mkdir($path);
            }
            $this->path = URL_ROOT . "assets/uploads/" . $name;
            $file_path = $path.$name;
            return move_uploaded_file($file->file->tmp_name, $file_path);
            } else {
                return "your file size exceeded";
            }
        } else{
            return false;
        }  
    }
}