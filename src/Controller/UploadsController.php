<?php

namespace App\Controller;

use App\Controller\AppController;
use App\HelperClasses\QueryDB;

class UploadsController extends AppController {

        public function initialize()
        {   
            parent::initialize();
            $this->loadComponent('Flash');
        }
 


    public function upload() 
    {   
        
//        $time = time();
        $Title = $_POST["Title"];
        $FileLocation = "/webroot/Images/dummy.jpg";
        $MediaType = "Image";
        $ThumbnailLocation = "/webroot/Images/dummy.jpg";
        //$DateUploaded = '2003-12-31 01:02:05';
        $DateUploaded = $_POST['time'];
        $Format = "jpg";
        $Price = $_POST["Price"];
        $Categories = $_POST["Category"];
        $User_UserID = 1;
        
        $Attributes = [
            "Title" => $Title,
            "FileLocation" => $FileLocation,
            "MediaType" => $MediaType,
            "ThumbnailLocation" => $ThumbnailLocation,
            "DateUploaded" => $DateUploaded,
            "Format" => $Format,
            "Price" => $Price,
            "Categories_Category_ID" => 3,
            "User_UserID" => $User_UserID
        ];
        $query = new QueryDB();
      
        if ($this->request->is('post')) 
        {
            $query->InsertMedia($Attributes);
            $this->Flash->success(__("Product created!"));
        }
    }

}

?>
