<?php
	$CC="python3";
	//$out="./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.py";
	$filename_in="input.txt";
	$filename_error="error.txt";
	//$executable="a.out";
	$command=$CC." ".$filename_code;
	$command_error=$command." 2>".$filename_error;

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
			$output=shell_exec($command);
		}
		else
		{
			$command=$command." < ".$filename_in;
			$output=shell_exec($command);
		}
		echo "<h1><center>Output</center></h1><pre>$output</pre>";
	}
	else
	{
		echo "<h1><center>Output</center></h1><pre>$error</pre>";
	}
    $executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<a>Compiled And Executed In: $seconds s</a></br></br>";
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
?>
