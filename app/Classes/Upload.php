<?php

namespace App\Classes;

use File;
use Auth;
use App\User;
use Image;

class Upload
{
    private $directory;
    private $pathToUploads;
    
    public function __construct()
    {
        $this->generateDirectory(Auth::user());                                #получаем авторизованного пользователя
        $this->pathToUploads = public_path(config('filesystems.uploadpath'));         #абсолютный путь до public и добавляет путь из filesystems
    }
    
    public function getDirectory()
    {
        return $this->directory;
    }
    
    public function getFullPath()
    {
        return $this->pathToUploads . $this->directory;
    }
    
    public function generateDirectory(User $user)
    {
        $this->directory = mb_substr(md5($user->id . '53F2s'), 0, 6) . $user->id;
    }
    
    public function createDirectory()
    {
        if(!File::exists($this->getFullPath())){
            File::makeDirectory($this->getFullPath(), $mode = 0777, true, true);   #создаем новую директорию
        }
        
        return $this->directory;
    }
    
    public function createPreview($name)
    {
        $img = Image::make($this->getFullPath() . '/' . $name);
        $img->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        
        $img->save($this->getFullPath() . '/preview_' . $name, 80);
    }
}