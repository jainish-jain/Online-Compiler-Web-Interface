<?php
if(!defined('BASEPATH')) exit('No direct script access allowed'); 
  $ht= 'file name should not be empty ';
?>
<!DOCTYPE html>
<html>
<head>
  
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home</title>
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
<style>
	#editor{
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        }
body{
    background-color: #e6eeff;
  }
  .sidenav {
    width: 130px;
    position: fixed;
    z-index: 1;
    top: 20px;
    left: 10px;
    background: #eee;
    overflow-x: hidden;
    padding: 8px 0;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #2196F3;
    display: block;
}

.sidenav a:hover {
    color: #064579;
}

main {
    margin-left: 140px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>

</head> 
<body>

<div class="main">
<?php if($this->session->userdata('user') != ''){ ?>

<?php	function Read() {
    $file = "qw.txt";
    $fp = fopen($file, "r");
    while(!feof($fp)) {
        $data = fgets($fp, filesize($file));
        echo "$data <br>";
    }
    fclose($fp);
}

function Write() {
    $file = "qw.txt";
    $fp = fopen($file, "w");
    $data = $_POST["code"];
    fwrite($fp, $data);
    fclose($fp);
}
?>
<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-light navbar-fixed-top nbar" style="background-color: #002877;">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="http://ies.ipsacademy.org/"style="color: white;">IPS ACADEMY</a>
     
    </div>
     <ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url("Login/logout"); ?>"><span class="glyphicon glyphicon-user"></span> welcome <i><?php echo $this->session->userdata('user'); ?></i>&emsp;(logout)</a></li>
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

<?php } 
 else{ ?>
 <div class="main">
<div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-light navbar-fixed-top nbar" style="background-color: #002877;">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="http://ies.ipsacademy.org/"style="color: white;">IPS ACADEMY</a>
     
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url("signup"); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
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
<?php } ?>

<div class="row log">

<div class="col-sm-1">
  
</div>

<div class="col-sm-10">
<div class=""><h3 style="text-align:center;">Compiler</h3></div>
</div>



<div class="col-sm-1">
  
</div>

</div>














</div>

<div class="col-sm-3">

</div>
</div>
</div>
</div><br><br><br>

<div class="area">
<div class="well foot"style="background-color: #002877;">
<div class="row area">
<div class="col-sm-3">
</div>

<div class="col-sm-5">


<div class="fm">

<b>Version-1.0</b><br>
<b>Developed By <a href="name.php">IPS ACADEMY</a></b>

</div>
</div>


<div class="col-sm-4">  

</div>
</div>
</div>
</div>



</body>
</html>
