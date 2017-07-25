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
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            // Create connection
            $conn = new mysqli($servername, $username, $password);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "Connected successfully";
        ?>
        
        
        <ul>
            <li><a class="logo" href="home.ctp">WAREHAUS</a></li>
            <li><a href="register.ctp">REGISTER</a></li>
            <li><a href="login.ctp">LOGIN</a></li>
            <li><a href="upload.ctp">UPLOAD</a></li>
            <li><a href="contact.ctp">CONTACT</a></li>
            <li><a href="about.ctp">ABOUT US</a></li>
        </ul>


        <div style="margin-left: 30%; margin-top: 10%">           
            
            <?php
                // define variables and set to empty values
                $user1 = $user2 = $comment = "";
                $date =  date('m/d/Y'); //$date for storing into db

                if ($_SERVER["REQUEST_METHOD"] == "POST") {             
                    if (empty($_POST["comment"])) {
                         $comment = "";
                    } else {
                        $comment = test_input($_POST["comment"]);                  
                    }
                }
                
                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }               
            ?>

            <h2>To:  &nbsp;&nbsp;&nbsp; <?php echo "John";?></h2>  <!--Data of "John" need to get from DB-->

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <h2>Message*:</h2>
                <textarea name="comment" rows="15" cols="40"></textarea>
                <br><br> 
            </form>
            
            <form method="POST" action=''>
                <input type="submit" name="submit"  value="Submit">
            </form>
            
            <?php
                if (isset($_POST['submit'])) 
                { 
                    header("Location: http://localhost:8765/pages/detail");
                    exit;
                   //add function here to store values into DB  
                }
            ?>  
            
            
        </div>          
    </body>
</html>

