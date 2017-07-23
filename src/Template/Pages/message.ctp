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
use Cake\Routing\Router;

$this->layout = false;



$cakeDescription = 'CakePHP: the rapid development PHP framework';


?>

<!DOCTYPE html>
<html>
    <head>
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

        </style>
        <link rel="stylesheet" type="text/css" href="site.css">
    </head>

    <body class="detail">    
        <ul>
            <li><a class="logo" href="home.ctp">WAREHAUS</a></li>
            <li><a href="register.ctp">REGISTER</a></li>
            <li><a href="login.ctp">LOGIN</a></li>
            <li><a href="upload.ctp">UPLOAD</a></li>
            <li><a href="contact.ctp">CONTACT</a></li>
            <li><a href="about.ctp">ABOUT US</a></li>
        </ul>


        <div style="margin-left: 30%; margin-top: 10%">

            <h2>

                To:  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo "John";?>
            </h2>
            <h2>Message*:</h2>

            <!--Need variable to store message-->
            <!--This will be convert to php--> 

            <textarea rows="15" cols="50">
            </textarea><br>
            <input type="submit" value="Send"/>        
        </div>

        
        
               


    <div class="container">

    <div class="text-center">
        <h1>SW Project Team One</h1>
        <p class="lead">This is homepage. *for demonstration only*</p>
    </div>
        <div class="row">
            <div class="col-md-12" style="padding-top:20px;">

            </div>
            <form method="post" accept-charset="utf-8" action="">
            <select name="genre" class="inlineDrop" id="genre" style="float: left"><option value="">GENRE</option><option value="1">Food</option><option value="2">Architecture</option><option value="3">City</option><option value="4">Pets</option></select>
<!--            <button class="icon" style="float: right"><i class="glyphicon glyphicon-search"></i></button>-->
            <input type="submit"value="Search" style="float: right" />
            <div style="overflow: hidden; padding-right: .5em;">
                <input type="text" style="width: 100%;" />
            </div>â€‹
            </form>
                <input type="checkbox" name="photo" value="photo">photos
                <input type="checkbox" name="video" value="video">videos
                <input type="checkbox" name="all" value="all">all

        </div>
    </div>


        
        
        
        
        
<!--        <div id="textAreaDiv" style="visibility:hidden;">
            <textarea rows="15" cols = "50>
                <br>
                <input type="submit" value="Send"/>    
            </textarea></div>

        <input type="button" onClick="showTextArea()">
        <input type="button" onClick="hideTextArea()">

        <script>
            function showTextArea() {
                document.getElementById('textAreaDiv').style.visibility = "visible";
            }

            function hideTextArea() {
                document.getElementById('textAreaDiv').style.visibility = "hidden";
            }
        </script>-->
    

         


    </body>
</html>

