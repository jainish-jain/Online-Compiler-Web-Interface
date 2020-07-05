<?php
	$CC="g++ --std=c++11";
	$out="timeout 5s ./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
$o1=$_POST['output1'];
	$o2=$_POST['output2'];
	$q=$_POST['ques'];
	//if(trim($code)=="")
	//die("The code area is empty");
	
	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable"); 
	exec("chmod 777 $filename_error");	

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
	$executionStartTime = microtime(true);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		//echo "<pre>$output</pre>";
             // echo "<h1><center>Output</center></h1><pre>$output</pre>";
	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		                //echo "<h1><center>Output</center></h1><pre>$output</pre>";
	}
	else
	{
		echo "<h1><center>Output</center></h1><pre>$error</pre>";
	}

	$rt = $this->session->userdata("user");
	//echo "<script>alert('aayega tera time aayega: $rt')</script>";
	if($q=="q1"){
		if(trim($output)==$o1){
			 
			 $this->db->set('q1','1');
             $this->db->where('usr',$rt);
             $this->db->update('user');
             echo "<center><h1>Program Worked Correctly</h1></center>";
            // echo "<center><H1>OUTPUT</H1></center><br><pre>$output</pre>";

		}
		else {
			$this->db->set('q1','0');
            $this->db->where('usr',$rt);
            $this->db->update('user');
            echo "<center><h1> Output Format Incorrect</h1></center>";
			//echo "<script>alert('Program is incorrect')</script>";
			//echo "<center><H1>OUTPUT</H1></center><br><pre>$output</pre>";

		}
	}
	if($q=="q2"){
		if(trim($output)==$o2){
			 
			 $this->db->set('q2','1');
             $this->db->where('usr',$rt);
             $this->db->update('user');
			// echo "<script>alert('Program worked correctly')</script>";
			 //echo "<center><H1>OUTPUT</H1></center><br><pre>$output</pre>";
			 echo "<center><h1>Program Worked Correctly</h1></center>";
            
		}
		else {
			$this->db->set('q2','0');
            $this->db->where('usr',$rt);
            $this->db->update('user');
             echo "<center><h1>Output Format Incorrect</h1></center>";
            // echo "<center><H1>OUTPUT</H1></center><br><pre>$output</pre>";
			//echo "<script>alert('or<br> Program is incorrectly')</script>";
		}
	}


	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.5f', $seconds);
	echo "<a>Compiled And Executed In: $seconds s</a></br>";
	/*if($seconds>3)
	{
		echo "<a>Verdict : TLE</a>";
	}
	else
	{
		echo "<a>Verdict : AC</a>";
	}*/
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
