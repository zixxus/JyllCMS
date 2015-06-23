<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Jyll Framework Cms</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo sitecss; ?>Jyll_framework_bootstrap.css" />

    </head>
    <body>
        <header>
            <div class="infobar">
                <div class="infobar_p">
                    <img style="width: 25px;" src="<?php echo imagelink;?>icon/email.png" /><p>youremail@domian.com</p>
                    <img style="width: 12px;" src="<?php echo imagelink;?>icon/smartphone.png" /><p>123-123-442</p>
                </div>
            </div>
            <hr>
            <div class="secound_heder">
                <img src="<?php echo imagelink;?>logo.png" class="logo">
                <nav>
                    <?php echo Jyll_menu::make('Home', 'homepage/index',array('nologged','admin','user')); ?>
                    <?php echo Jyll_menu::make('About As', 'homepage/about',array('nologged','admin','user')); ?>
                    <?php echo Jyll_menu::make('Products', 'item/products',array('nologged','admin','user')); ?>
                    <?php echo Jyll_menu::make('Services', 'item/services',array('nologged','admin','user')); ?>
                    <?php echo Jyll_menu::make('Contact', 'homepage/contact',array('nologged','admin','user')); ?>
                    <?php echo Jyll_menu::make('Login', 'login/index','nologged'); ?>
                    <?php echo Jyll_menu::make('Panel', 'login/index2',array('admin','user')); ?>
                </nav>
                </div>
        </header>
        <hr>
        <div class="content">
