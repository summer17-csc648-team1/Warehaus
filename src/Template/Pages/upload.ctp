<?php $this->layout = false;?>

<!DOCTYPE html>
<html>
<head>

	<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

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

        .center
        {   
            text-align: center;
            padding: 100px 0;
            margin: auto;
            width: 60%;
            height: 40%;
            line-height: 100px;
            border: 1px solid red;
        }

        .dropdown
        {   
            margin: auto;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            width: 60%;
            height: 40%;
        }
        .CategoryBtn
        {background-color: green;}

        .priceform
        {
            align-items: right;
            width: 30%;
        }

        </style>

        <link rel="stylesheet" type="text/css" href="site.css">
    </head>
     <body>
        <ul>
            <li><a class="logo" href="home.ctp">WAREHAUS</a></li>
            <li><a href="register.ctp">REGISTER</a></li>
            <li><a href="login.ctp">LOGIN</a></li>
            <li><a href="upload.ctp">UPLOAD</a></li>
            <li><a href="contact.ctp">CONTACT</a></li>
            <li><a href="about.ctp">ABOUT US</a></li>
        </ul>
    
        
        
        
        <div class="dropdown">
            
            <form>
                <a><div class="center">Click to upload.</div></a>
                <input type="text" style="width: 250px; float: left; margin-top: 30px" placeholder="Enter a Category" />
                <br><input type="number" style="width: 250px; float: right; height: 40px" placeholder="Enter your price" /></br>
                <br><br><b><font size="5">Title</font></b></br></br>
                <input type="text" placeholder="Enter a Title" style="float: right; clear: both" />
                <br><b><font size="5">Description</font></b></br>
                <textarea placeholder="Enter a Descriptions of the product" style="height: 100px" ></textarea>
                <input type="submit" value="Submit" style="float: right">
            </form>
        </div>


    </body>
</html>

