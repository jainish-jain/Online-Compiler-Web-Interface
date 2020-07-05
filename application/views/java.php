<?php
	$CC="javac";
	$out="java Example";
	/*$cl=$_POST["code"];
	if(cl==""){
		$out="java main";
	}*/
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.java";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$runtime_file="runtime.txt";
	$executable="*.class";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;
	$runtime_error_command=$out." 2>".$runtime_file;

	if(trim($code)=="")
	die("The code area is empty");

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
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$output=shell_exec($out);

		}
		else
		{
			shell_exec($runtime_error_command);
			$runtime_error=file_get_contents($runtime_file);
			$out=$out." < ".$filename_in;
			
			$output=shell_exec($out);

		}
		//echo "<h1>error</h1><pre>$runtime_error</pre>";
		echo "<h1><center>Output</center></h1><pre>$output$runtime_error</pre>";
		//echo "<textarea id='div' class=\"form-control\" name=\"output\" rows=\"10\" cols=\"50\" style=\"color:white;background-color:black;\">$output</textarea><br><br>"
  }
	else if(!strpos($error,"error"))
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
		echo "<h1><center>Error</center></h1><pre>$error\n$output</pre>";
		
	}
	else
	{
		echo "<h1><center>Error</center></h1><pre>$error</pre>";
	}
	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<code >Compiled And Executed In: $seconds s</code></br></br>";
	if($seconds>5)
	{
		echo "<a>Verdict : TLE</a>";
	}
	else
	{
		echo "<a>Verdict : AC</a>";
	}
	exec("rm $filename_code");
	exec("rm *.txt");
	exec("rm $executable");
?>
