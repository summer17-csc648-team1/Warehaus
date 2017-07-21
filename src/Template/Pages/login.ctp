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

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
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

        label{
            display:inline-block;
            width:100px;
        }

    </style>


    <link rel="stylesheet" type="text/css" href="site.css">
</head>
<body>
<ul>

    <li><a class="logo" href="home.ctp">WAREHAUS</a></li>


    <li><a href="register.ctp">REGISTER</a></li>
    <li><a class="active" href="login.ctp">LOGIN</a></li>
    <li><a href="upload.ctp">UPLOAD</a></li>
    <li><a href="contact.ctp">CONTACT</a></li>
    <li><a href="about.ctp">ABOUT US</a></li>

</ul>

<div class="container-full">

    <div class="row">





            <form class="col-lg-12">


                <div class="container">
                    <h1>Login:</h1>
                    <div>

                        <form action='login.ctp' method='post'>
                                <label>Username:</label><input type="text" name="username" /><br>
                                <label>Password:</label><input type="password" name="password" /><br>
                                <br>
                            <label></label><input type='submit' value='Login' />
                            </div>
                        </form>


                    </div>


                    <div class="row" id="append"></div>
                    <div class="row" id="image"></div>



                    <div class="row">
                        <div class="col-lg-12">
                            <br><br>
                            <p class="pull-right"><a href="http://www.bootply.com">Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand.</p>
                            <br><br>
                        </div>
                    </div>
                </div>
</body>
</html>