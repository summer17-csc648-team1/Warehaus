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

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">
<div class="container">
	<div class="row">
        <div class="input-group col-md-12">
            <form id="SearchMedia">
                Search Text: <input type="text" name="name" id="name"><br>
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
    <div class="row" id="append">
    </div>
    <div class="row" id="image">
    </div>
</div>
<script>

    
$(document).ready(function(event){

    $('#SearchMedia').on('submit', (function(e){
        e.preventDefault();
        
        var value = $('#name').serialize();
        $("#append").empty();
        $('#image').empty()
        $.ajax({
            type:"POST",
            url: "/Query/search",
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
                            var link = value.replace("/webroot","");
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
});
</script>
<style>
    th {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

</body>
</html>
