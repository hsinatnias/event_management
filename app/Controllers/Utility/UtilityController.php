<?php

namespace App\Controllers\Utility;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class UtilityController extends BaseController
{
    public function showuserprofileimage($file_name)
    {
        $file_name= "profile_images/{$file_name}";
        
        $path = WRITEPATH.'uploads/'.$file_name;
        if(file_exists($path)){
            return $this->response->setHeader('Content-type', mime_content_type($path))->setBody(file_get_contents($path));
        }else{
            throw new PageNotFoundException('Image not found');
        }
    }
}
