<?php
/**
 * Created by PhpStorm.
 * User: jhuang
 * Date: 7/22/17
 * Time: 2:57 PM
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;

class UsersController extends AppController
{
    public function __construct(){
        parent::__construct();
    }


    public function index()
    {
      if(isset($_POST['submit'])){
        $email      =$_POST['Email'];
        $username   =$_POST['username'];
        $password   =$_POST['password'];
        $rpassword  =$_POST['rpassword'];
      }if($password != $rpassword){
        $error[] ='Password does not match!';
      }else{
        $this->Model->Table->UserTable->InsertUser($email, $username,$password);
}
      //  $id = $this->Controller->QueryController->InsertUser($postdata)
      //  $Query = new QueryController();
      //  $Query->InsertUser($Attributes);
      }
    }
}
