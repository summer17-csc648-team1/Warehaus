<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
$this->layout = false;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
        }
        li a {
            float: right;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        li a:hover:not(.active) {
            color: white;
            background-color: black;
        }
        .logo {
            float: left;
            position: relative;
            margin: 0;

            padding: 0;
          diaplay: block;
           color: white;
           background-color: red;
           text-align: center;
           padding: 14px 20px;
           text-decoration: none;
       }
       .active {
           color: white;
           background-color: red;
       }
       .RPass{
         padding-right: 0px;
       }
       </style>


     <link rel="stylesheet" type="text/css" href="site.css">
 </head>
 <body>
 <ul>

         <li><a class="logo" href="/pages/home">WAREHAUS</a></li>
         <li><a  class="active" href="/pages/register">REGISTER</a></li>
         <li><a href="/pages/login">LOGIN</a></li>
         <li><a href="/pages/upload">UPLOAD</a></li>
         <li><a href="/pages/contact">CONTACT</a></li>
         <li><a href="/pages/about">ABOUT US</a></li>

 </ul>

     <div class="container-full">

   <div class="row">

     <div class="col-lg-12 text-center v-center">



       <form class="col-lg-12">


 <div class="container">

 <div class="text-center">
     <h1>SW Project Team One</h1>

     <div class="row" id="append"></div>
     <div class="row" id="image"></div>



     <div class="row">
     <form class="col-lg-12">
<div class="containter">
<h1>Register:</h1>
                 <div>

                   <form action='' method='post'>
<p>Username*<br /><input type='text' name='username' value='<?php if(isset($error)){ echo $_POST['username']; } ?>'></p>
<p>Email<br /><input type='text' name='email' value='<?php if(isset($error)){ echo $_POST['email']; } ?>'></p>
<p>Password*<br /><input type='password' name='password' value=''></p>
<p>Re-Enter Password*<br /><input type='password' name='passwordConfirm' value=''></p>
<form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms Of Services'); return false; }">

<input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the Terms and Conditions and Privacy Policy


</form>
<p><input type='submit' name='submit' value='Register'></p>

</form>

     <br><br>
       <p class="pull-right"><a href="http://www.bootply.com">Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand.</p>
     <br><br>
     </div>
 </div>
 </div>
 </body>
</html>
