<?php


namespace App\Classes;


use App\Models\Image;

class Upload
{

    protected  $request          = null;
    protected  $inputName        = null;
    protected  $path             = null;
    protected  $modelName        = null;
    protected  $imagePathColumn  = 'path';
    protected  $extensions       = null;

    public function __construct($request, $inputName, $path, $extensions, $model)
    {
        $this->request          = $request;
        $this->inputName        = $inputName;
        $this->path             = $path;
        $this->extensions       = $extensions;
        $this->modelName        = $model;
    }

    public function storageUpload()
    {
        if ($uploadedFile = $this->request->file($this->inputName))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $filePath = $uploadedFile->storeAs($this->path, $fileName);
            $image = $this->modelName::create(['name' => $fileName, $this->imagePathColumn => $filePath]);
            return $image->id;
        }
    }

    /*****************************************************************************************
     **** This Function Used in uploading in Public Directory With Handling dynamic paths ****
     *****************************************************************************************/
    public function publicUpload()
    {
        $this->request->validate([
            $this->inputName  =>  $this->extensions,
        ]);

        if ($uploadedFile = $this->request->file($this->inputName))
        {
            $fileName = time() . $uploadedFile->getClientOriginalName();
            $uploadedFile->move(uploadedImagePath() . DIRECTORY_SEPARATOR . $this->path, $fileName);
            $filePath = uploadedImagePath() . DIRECTORY_SEPARATOR . $this->path . DIRECTORY_SEPARATOR .$fileName;
            $image = $this->modelName::create(['name' => $fileName, 'path' => $filePath]);
            return $image->id;
        }

    }

}
