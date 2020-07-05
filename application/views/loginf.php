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
 <title> LOGIN PAGE</title>
<style type="text/css">
.well{
    background-color: white;
    position: absolute;
    width: 300px;
    left: 40%;
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

<?php if($this->session->userdata('user') != ''){ ?>
<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-light navbar-fixed-top nbar" style="background-color: #002877;">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="<?php echo base_url(); ?>" style="color: white;">HOME</a>

    </div>
     <ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url("signup"); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
 </br></br></br><div class="container">


<div class="well">
  <center><h3 class="jumbtron"  >You are already login.<br> please<a href="<?php echo base_url("Login/logout"); ?>"><span class="glyphicon glyphicon-user"></span> LOGOUT</a></h1></center></br>

      <br/>
</div>
</div>




<?php 
}
else{
 ?>


<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-light navbar-fixed-top nbar" style="background-color: #002877;">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="<?php echo base_url(); ?>" style="color: white;">HOME</a>

    </div>
     <ul class="nav navbar-nav navbar-right">
     	<li><a href="http://172.16.10.89/t/index.php"><span class="glyphicon glyphicon-log-in"></span> Admin LogIn</a></li>
    <li><a href="<?php echo base_url("signup"); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
</br></br></br><div class="container">


<div class="well">
  <center><h3 class="jumbtron"  >PLEASE LOGIN</h1></center></br>

        <form class="form-inline" action="<?php echo base_url('login/login_validation'); ?>" method="post">
        <input type="text" name="usr" class="form-control" placeholder="username here">
        <span class="text-danger"><?php echo form_error("usr");?><br><br>
        <input type="password" name="pass" class="form-control" placeholder="password here">
        <span class="text-danger"><?php echo form_error("pass");?></span><br><br>
        <label for="lang">Appearing for Test&emsp;</label>

        <select class="form-control" name="test" >
        <option value="yes">Yes</option>
        <option selected value="no">No</option>
        </select><br><br>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>

    <!--  <div class="btn btn-primary" >
        <a style="color:white;" href="<?php// echo base_url() ?>main/sign_up">Sign up
        </a>
      </div>-->
        <?php

        echo $this->session->flashdata('error'); ?>
        </form><br/>
</div>
</div>
<?php 

}

 ?>
</body>
</html>
