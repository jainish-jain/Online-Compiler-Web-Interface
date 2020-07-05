<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
  $ht= 'file name should not be empty ';
  
foreach($_POST as $key=>$value){
    echo $key.' '.$value."\n";
}

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
    background-color: white;
  }
  .sidenav {
    width: 130px;
    position: absolute;
    z-index: 1;
    top: 120px;
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


@media screen and (max-height: 750px) {

    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 8px;}
}
footer{

   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #002877;
   color: white;
   text-align: center;
}
</style>
<script>

</script>
</head>
<body>
<div class="main">


<?php if($this->session->userdata('user') != ''){ ?>
<div class="sidenav">
<?php

$this->load->database();
$rt=$this->session->userdata('user');

$this->db->where('usr',"$rt");
$query = $this->db->get('user');
$result = $query->row();
$b=$result->branch;
$y=$result->year;
$s=$result->section;

?>
  
<select class="form-control" id="combo" onclick="ttt()">
     <option disabled selected value>--select file name--</option>
 <?php
/*
$queryb = $this->db->query("select branch from user where usr='$rt'");
foreach ($queryb->result_array() as $rowb)
{
        print_r($rowb);
        $b=$rowb["branch"];
        
}
$queryy = $this->db->query("select year from user where usr='$rt'");
foreach ($queryy->result_array() as $rowy)
{
        $y=$rowy["year"];
        
}
$querys = $this->db->query("select section from user where usr='$rt'");
foreach ($querys->result_array() as $rows)
{
        $s=$rows["section"];
        
}
   */


$path ="./Folders/$b/$y/$s/".$this->session->userdata('user');
$dir = opendir($path) or die("ubale to locate");
while($file =readdir($dir))
{
    if($file=="."||$file=="..")
       continue;
    echo "<option>$file</option>";
}
?>
  </select>

</div>



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

<?php


         }

 else{ ?>
  <div class="row">
  <div class="col-sm-12">
  <nav class="shadow navbar navbar-light navbar-fixed-top nbar" style="background-color: #002877;">
    <div class="navbar-header">
      <a class="navbar-brand lspace" href="<?php echo base_url(); ?>" style="color: white;">COMPILER</a>
    </div>
    <ul class="nav navbar-nav navbar-right">

      <li><a href="<?php echo base_url("signup"); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="<?php echo base_url("Login"); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
       <li>&emsp;
        &emsp;&emsp;

        </li>
    </ul>
   <div class="collapse navbar-collapse navbar-menubuilder">
    <ul class="nav navbar-nav">
    </ul>
    </div>
</nav>
</div>
</div>
<?php } ?>




























































<div class="row cspace">
<div class="col-sm-1">

</div>
<div class="col-sm-10">
<div class="form-group">
<form id="form" action="<?php echo base_url('main/compile'); ?>" method="POST">
<label for="lang">Choose Language</label>

<select class="form-control" name="language" id="language">
<option value="c">C</option>
<option value="cpp11">C++</option>
<option value="java">Java</option>
<option value="python2.7">Python 2</option>
<option value="python3.2">Python 3</option>


</select><br><br>

<label>Write Your Code</label>

<textarea class="form-control" id="editor" name="code"></textarea><br/><br/>
<label>Enter Your Input</label>
<textarea id="input" class="form-control" name="input" rows="5" cols="50"></textarea><br><br>
<input id="submit" type="submit" class="btn btn-success" value="Run Code" onclick="clik();"> 
<textarea hidden id="harshit" name="code" rows="1" cols="1" style="resize: none;"></textarea>

</form>

<?php if($this->session->userdata('user') != ''){ ?>

<div style="position: relative;padding: 6px 7px 6px 765px;">
<form action="<?php echo base_url('main/save'); ?>" method="POST" >
<textarea hidden id="har" name="code" rows="1" cols="1" style="resize: none;"></textarea>
<textarea hidden id="h" name="co" rows="1" cols="1" style="resize: none;"></textarea>
<button type="submit" class="btn btn-success" onclick="save()"><span class="glyphicon glyphicon-save-file"></span> save file</button>
</form> </div>

<script >
	   function ttt(){

      var skillsSelect = document.getElementById("combo");
      var selectedText = skillsSelect.options[skillsSelect.selectedIndex].text;
      var dd="./Folders/"+"<?php echo $b; ?>/"+"<?php echo $y; ?>/"+"<?php echo $s; ?>/"+"<?php echo $this->session->userdata('user'); ?>"+"/"+selectedText;
          var request=new XMLHttpRequest();
          request.open('GET',dd);
          request.onreadystatechange=function(){
			  /*	if (request.readyState===2) {
            //var modify =document.getElementById("input")
            //  console.log(request);
            //var modify=request.responseText;
            editor.setValue("Connecting...");
          // modify.innerHTML=request.responseText;
          }
          if (request.readyState===3) {
            //var modify =document.getElementById("input")
            //  console.log(request);
            //var modify=request.responseText;
            editor.setValue("//Receiving...");
          // modify.innerHTML=request.responseText;
          }*/
          if ((request.readyState===4) && (request.status===200)) {
            //var modify =document.getElementById("input")
            //  console.log(request);
            var modify=request.responseText;
            editor.setValue(modify);
          // modify.innerHTML=request.responseText;
          }
          /*else{
            alert("ERROR./nEither file is not present./nOr unable to read.");
          }*/
          }
          request.send();
}

</script>

<!--<p id="d"></p>
<input type="button" class="btn btn-default" onclick="save()" value="save file"></input>-->
<?php
/*foreach($_POST as $key=>$value){
    echo $key.' '.$value."\n";
}*/      }

else{ ?>
<p></br>To save a file Please Login.</p>
<?php } ?>

<div id="output"> </div>
<span id="created" > </span>
</div>
</div>
</div>
</div>



































<script src="<?php echo base_url('ace/src/ace.js') ?>"></script>
<script src="<?php echo base_url('ace/src/ext-language_tools.js') ?>"></script>
<script>
    ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true,
        autoScrollEditorIntoView: true,
        maxLines: 24,
        minLines: 10,
        fontSize: "12pt"
    });
    editor.renderer.setScrollMargin(20, 20, 20, 20);
    editor.setTheme("ace/theme/monokai");
    //editor.session.setMode("ace/mode/python");
   // editor.session.setMode("ace/mode/java");
    editor.session.setMode("ace/mode/c_cpp");
	editor.setReadOnly(true);

    function save(){
        var txt;
        var p = prompt("Please enter name of file:");
     if (p == null || p == "") { var ad ="<?php echo $ht; ?>";
     document.getElementById('d').innerHTML = ad;

       // var txt = "User cancelled the prompt. or area is empty.";
        //document.getElementById('d').innerHTML = txt;

     }
     else{ var ad ="<?php echo $ht; ?>";
document.getElementById('h').innerHTML = ad;
        var txt = p;
        var h1 = editor.getValue();
      document.getElementById('har').innerHTML = h1;
      document.getElementById('h').innerHTML = txt;
    }}
 $(document).ready(function() {
           
           $("#form #language").on("click",function(){
             editor.setReadOnly(false);
           var la=$('#form #language').val();
         
           if(la=='c'){
           editor.session.setMode("ace/mode/c_cpp");
            editor.setValue('#include<stdio.h>\n\nint main()\n{\n \tprintf("Hello World!");\n\treturn 0;  \n} ');
             $('#form #input').html("");
           
           }
           else if(la=='cpp11'){
            editor.session.setMode("ace/mode/c_cpp");
            editor.setValue('#include<iostream>\n\nusing namespace std; \n\nint main()\n{\n \tcout<<"Hello World!";\n\treturn 0;  \n} ');
             $('#form #input').html("");
            
           }
           else if(la=='java'){
            editor.session.setMode("ace/mode/java");
            editor.setValue('class Example //Class name with "main()" method should be "Example"\n{\n\tpublic static void main(String args[])\n\t{\n\t\tSystem.out.print("Hello World!");\n\t}\n} ');
             $('#form #input').html("");
            
           }
           else if(la=='python2.7'){
            editor.session.setMode("ace/mode/python");
            editor.setValue('try:\t\t#TIP:Always use "try" for "raw_input()" function\n\tx=raw_input()\n\tprint("Hello "+x)\nexcept:\n\tprint()');
            $('#form #input').html("World!");
           
           }
            else if(la=='python3.2'){
         	editor.session.setMode("ace/mode/python");
            editor.setValue('try:\t\t#TIP:Always use "try" for "input()" function\n\tx=input()\n\tprint("Hello "+x)\nexcept:\n\tprint()');
            $('#form #input').html("World!");
            
           }

       });


       
        });
   function clik(){
   
   var h = editor.getValue();
      document.getElementById('harshit').innerHTML = h;
}
    
    

 $(document).ready(function() {
  $('#form #submit').click(function() {
    
    // Fade in the progress bar
    $('#output').hide();
    $('#output').html('<br/>Generating the output &nbsp;&nbsp;&nbsp; <img src="<?php echo base_url('images/loader.gif'); ?>" />');
    $('#output').fadeIn();
    // Disable the submit button
    $('#form #submit').attr("disabled", "disabled");
    // Clear and hide any error messages
    $('#form .error').html('');
    // Set temporary variables for the script
    var isFocus=0;
    var isError=0;
    // Get the data from the form
    var code=$('#form #harshit').val();
    var input=$('#form #input').val();
    var language=$('#form #language').val();
    // Validate the data
    if($.trim(code)=='') {
      
      alert("Code area Should not be EMPTY.");
editor.setHighlightActiveLine(false);
      $('#form #editor').focus();
      isFocus=1;
      isError=1;
    }
    // Terminate the script if an error is found
    if(isError==1) {
      $('#output').html('');
      $('#output').hide();
      // Activate the submit button
      $('#form #submit').removeAttr("disabled", "disabled");
      return false;
    }
    
    $.ajaxSetup ({
      cache: false
    });
    var dataString = 'code='+ encodeURIComponent(code) + '&input=' + encodeURIComponent(input) + '&language=' + encodeURIComponent(language);
    var o1="13";
    var o2="15";
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('main/compile'); ?>",
      data: dataString,
      success: function(msg) {
        $('#output').html(msg);
        $('#form #submit').removeAttr("disabled", "disabled");
      },
      error: function(ob,errStr) {
        $('#output').html('');
        // Activate the submit button
        $('#form #submit').removeAttr("disabled", "disabled");
      }
    });
    return false;
  });
});


</script>


<!--</div>-->

<div class="col-sm-3">

</div>
<br><br><br>
<footer>
     <div class="container">
       <div class="row">
         
         <div class="col-sm-4">
<a href='<?php echo base_url("main/devs"); ?>' ref='dofollow' title='Harshit Nigam'><h4 style="color:white;"><b>DEVELOPERS</b></h4></a>
           <ul class="list-inline quicklinks">
             <li class="list-inline-item">
               <a href="#"></a>
             </li>
             <li class="list-inline-item">
               <a href="#"></a>
             </li>
           </ul>
         </div>
         <div class="col-sm-7">
           
         </div>
       </div>
     </div>
   </footer>

</body>
</html>
