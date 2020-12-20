<?php
/**
 * Created by PhpStorm.
 * User: Genady
 * Date: 12/19/20
 * Time: 1:55 PM
 */

declare(strict_types=0);
namespace Images;


class ImageUploader
{
    protected $file;
    protected $target;
    public function __construct(array $file, string $target)
    {
        $this->file = $file;
        $this->target = $target;

    }
    public function fileDataSave(){
        $target_file = $this->target . basename($this->file["name"]);
          if( move_uploaded_file($this->file["tmp_name"], $target_file)){
              return $target_file;
          }
          return $target_file;
    }

}
