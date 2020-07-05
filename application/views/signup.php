<!doctype html>
<html>
<head>
<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/normalize.css') ; ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>">
        <script src="<?php echo base_url('js/vendor/modernizr-2.8.3.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/vendor/jquery-1.12.0.min.js'); ?>"></script>
        <script src="<?php echo base_url('bootstrap-3.3.7/js/bootstrap.min.js'); ?>" ></script>
        <script src="<?php echo base_url('bootstrap-3.3.7/js/bootstrap.js'); ?>" ></script>
 <title> SIGNUP PAGE</title>
<style type="text/css">

.well{
    background-color: white;
    position: absolute;
    width: 500px;
    left: 33%;
    top: 20%;
    text-align: center;
}
body{
    background-color: #e6eeff;
  }
.form-control{
width: 400px;
}
.form-inline{

}
</style>
</head>
<body>
<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-light navbar-fixed-top nbar" style="background-color: #002877;">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="<?php echo base_url(); ?>" style="color: white;">HOME</a>

    </div>
     <ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url("Login"); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <li>&emsp;
        &emsp;&emsp;
        &emsp;&emsp;
        &emsp;&emsp;
        &emsp;&emsp;
        &emsp;</li>
    </ul>
   <div class="collapse navbar-collapse navbar-menubuilder">
    <ul class="nav navbar-nav">
    </ul>
    </div>
</nav>
</div>
</div>
<div class="container">
<div class="well">
  <center><h3 class="jumbtron" >SIGN UP </h1></center>

        <form class="form-inline" action="<?php echo base_url('Signup/form_validation'); ?>" method="post"></br>
        <input type="text" name="usr" class="form-control" placeholder="enrollment no. here">
        <span class="text-danger"><?php echo form_error("usr");?></span></br></br>
        <input type="password" name="pass" class="form-control" placeholder="password here">
        <span class="text-danger"><?php echo form_error("pass");?></span></br></br>
        <select class="form-control" name="combobranch">
        <option disabled selected value>--Select Branch--</option>
        <option>Civil Engineering</option>
        <option>Chemical Engineering</option>
        <option>Computer Science &  Engineering</option>    
        <option>Computer Science & Information Technology</option>
        <option>Computer Science & Technology</option>
        <option>Computer Engineering</option>
        <option>Electronics & Communication</option>
        <option>Elect. & Elex Engineering</option>
        <option>Fire Tech & Safety Engineering</option>
        <option>Mechanical Engineering</option>
        </select><br><br>
         <select class="form-control" name="comboyear">
        <option disabled selected value>--Select Year--</option>
        <option>First Year</option>
        <option>Second Year</option>
        <option>Third Year</option>
        <option>Fourth Year</option>
        </select><br><br>
<select class="form-control" name="combosection">
        <option disabled selected value>--Select Section--</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
       
        </select><br><br>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Sign up</button>
        <?php

        echo $this->session->set_flashdata('error'); ?>
        </form><br/><br>
</div>
</div>
<footer style="color: white;">all right reserved.copyright 2018</footer>
</body>
</html>
