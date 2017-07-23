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

        img {

            width:600px;
            /*height:320px;*/
            /*
            margin-top:50px;
            margin-left:50px;
            */

        }

        h3 {

            margin-left: 50px;
            margin-top: 50px;


            margin:0;
            padding:0;
        }



        table {
            /*            border-collapse: collapse;
                        margin-left: 600px;*/
            margin:0;
            padding:0;
        }

        th, td {
            /*
                        padding: 15px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;*/
            margin:0;
            padding:0;
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

<div style="margin-left: 5%; margin-top: 5%">
    <div>
        <div style="float: left;">
            <img id="preview" src="<?php echo $this->request->webroot; ?>img/testImg.jpg" >
        </div>

        <div style="float: left; margin-left: 10%;">
            <table>
                <tr>
                    <h1 id="title">Test Image</h1>
                </tr>
                <tr>
                    <p id="category"> <b>Category: </b> <?php echo "Games";?></p>
                </tr>
                <tr>
                    <p id="price"><b>Price: </b> <?php echo "$1.00"; ?></p>
                </tr>
                <tr>
                    <p id="owner"><b>Owner: </b> <?php echo "AUserName"?></p>
                    <a target="_blank" href="https://www.google.com"><button >Contact Owner</button></a>
                    <!--<a target="_blank" href="https://www.google.com"><button >Buy it now</button></a>-->
                </tr>
            </table>

        </div>
    </div>
    <div style="clear: both;">
        <hr>
        <h3>Description</h3>
        <p id="description"><?php echo "Here is the description of the picture provided by the seller." ?></p>
    </div>
</div>

</body>
</html>

