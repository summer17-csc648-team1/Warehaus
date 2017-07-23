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
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
 
    
    
    <script>
        $(document).ready(
            function(event){

            $('#SearchMedia').on('submit', (function(e){
                e.preventDefault();

                var value = $('#name').serialize();
                $("#append").empty();
                $('#image').empty()
                $.ajax({
                    type:"POST",
                    url: "http://sfsuse.com/~su17g01/Warehaus/query/search",
                    data:{
                        name : value
                    },
                    success: function(data){

                        var html = "<table>";

                        var objs = JSON.parse(data);

                        for(var i = 0; i < 1; i++) {
                            html += "<tr>";
                            $.each(objs[0],function(key, value) //this loops the attributes of the object
                            {
                                html += '<th>' + key + '</th>';
                            });
                            html += "</tr>";
                        }
                        $.each(objs, function(index, obj) //this loops the array
                        {
                            html += "<tr>";
                            $.each(obj,function(key, value) //this loops the attributes of the object
                            {
                                if(key == 'File_Location') {
                                    var link = window.location.href.match(/^.*\//) +  value.replace("/webroot/","");
                                    $('#image').prepend($('<img>',{id:'theImg',src:link}))
                                }
                                html += '<td>' + value + '</td>';
                            });
                            html += "</tr>";
                        });
                        html += "</table>";
                        $("#append").append(html);


                    },
                    error: function(xhr,textStatus,error){ 
                        alert(error); 
                    }
                });
            }));
            }
        );
    </script>


   
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

<body class="home">
    

    
    
    <!--    <div class="container">
	<div class="row">
            <div class="input-group col-md-12">
                <form id="SearchMedia">
                    Search Text: <input type="text" name="name" id="name"><br>
                    <input type="submit" value="Search">
                </form>
            </div>
        </div>
        <div class="row" id="append"></div>
        <div class="row" id="image"> </div>
    </div>-->
    
    
    
    <ul>

            <li><a class="logo" href="home.ctp">WAREHAUS</a></li>
            <li><a href="register.ctp">REGISTER</a></li>
            <li><a href="login.ctp">LOGIN</a></li>
            <li><a href="upload.ctp">UPLOAD</a></li>
            <li><a href="contact.ctp">CONTACT</a></li>
            <li><a href="about.ctp">ABOUT US</a></li>

    </ul>
    
    <div class="container">

        <div class="text-center">
            <h1>SW Project Team One</h1>
            <p class="lead">This is homepage. *for demonstration only*</p>
        </div>
        
        <div class="row" >
            <div class="col-md-12" style="padding-top:20px;"> </div>
                <div class="input-group col-md-12">

                    <form method="post" accept-charset="utf-8" action="" id="SearchMedia">

                        <select name="genre" class="inlineDrop" id="genre" style="float: left">
                            <option value="">
                                GENRE
                            </option>
                            <option value="1">
                                Food
                            </option>
                            <option value="2">
                                Architecture
                            </option><option value="3">
                                City
                            </option>
                            <option value="4">
                                Pets
                            </option>
                        </select>
<!--                        
                        Search Text: <input type="text" name="name" id="name"><br>
                        <input type="submit" value="Search">-->
                        
                        
                        <input type="submit" value="Search" style="float: right" /> 
                        
                        <div style="overflow: hidden; padding-right: .5em;">
                            <input type="text" style="width: 100%;" />
                        </div>
                        
                    </form>
                </div>

                <input type="checkbox" name="photo" value="photo">photos
                <input type="checkbox" name="video" value="video">videos
                <input type="checkbox" name="all" value="all">all
                
        </div>
        <div class="row" id="append"></div>
        <div class="row" id="image"> </div>
        
    </div>
</body>
</html>
