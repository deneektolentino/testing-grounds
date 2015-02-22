<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mobile Schedule</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.timepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/evol.colorpicker.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-templ.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/evol.colorpicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-dateFormat.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/main.js"></script>
</head>
<body>
    <div class="wrap">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container navigation">
                <h1><a class="brand" href="#">Scheduler</a></h1>
				<ul class="nav">
                        <li><a href="<?php echo base_url(); ?>scheduler"><i class="glyphicon glyphicon-home"></i>Home</a></li>
                        <li><a href="<?php echo base_url(); ?>scheduler/buildings"><i class="glyphicon glyphicon-plus"></i>Buildings</a></li>
                       <li><a href="<?php echo base_url(); ?>scheduler/rooms"><i class="glyphicon glyphicon-plus"></i>Rooms</a></li>
					   <li><a href="<?php echo base_url(); ?>scheduler/schedules"><i class="glyphicon glyphicon-plus"></i>Schedules</a></li>
					   
                    </ul>
            </div>
        </div>
        
        <div class="container main">
        
        <div id="ajaxLoader">
            <img src="<?php echo base_url(); ?>css/images/ajax-loader.gif" alt="Ajax Loading Animation" />
            <span>Loading...</span>
        </div>