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

$this->html->css('bootstrap.css');
$this->html->script('jquery-3.2.1.min.js');
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


    </head>
    <body>
    <ul>
            <li><a class="logo" href="/pages/home">WAREHAUS</a></li>
            <li><a href="/pages/register">REGISTER</a></li>
            <li><a href="/pages/login">LOGIN</a></li>
            <li><a href="/pages/upload">UPLOAD</a></li>
            <li><a href="/pages/contact">CONTACT</a></li>
            <li><a href="/pages/about">ABOUT US</a></li>
    </ul>

    <div class="text-center">
        <h1>SW Project Team One</h1>
        <p class="lead">This is homepage. *for demonstration only*</p>
    </div>
            <select name="category" id="category" style="float: left"><option value="">CATEGORY</option><option value="1">Food</option><option value="2">Architecture</option><option value="3">City</option><option value="4">Pets</option></select>
            <input type="submit"value="Search" style="float: right" />
            <div style="overflow: hidden; padding-right: .5em;">
                <input type="text" style="width: 100%;" />
            </div>
                <input type="radio" name="group1" value="photo">photos
                <input type="radio" name="group1" value="video">videos
                <input type="radio" name="group1" value="all" checked>all
    <br>

    </body>
</html>
