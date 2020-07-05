<?php
	$CC="gcc";
	$out="timeout 5s ./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.c";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";
	$command=$CC." -lm ".$filename_code;	
	$command_error=$command." 2>".$filename_error;
	$check=0;

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
        echo "<center><H1>OUTPUT</H1></center><br><pre>$output</pre>";
	}
	else if(!strpos($error,"error"))
	{ 
		echo "$error";
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
                echo "<center><H1>OUTPUT</H1></center><br><pre>$output</pre>";
	}
	else
	{
		echo "<center><H1>ERROR</H1></center><br><pre>$error</pre>";
		$check=1;
	}
	$executionEndTime = microtime(true);
	$seconds = $executionEndTime - $executionStartTime;
	$seconds = sprintf('%0.2f', $seconds);
	echo "<a>Compiled And Executed In: $seconds s</a></br>";
	if($check==1)
	{
		//echo "<a>Verdict : CE</a>";
	}
	else if($check==0 && $seconds>3)
	{
		//echo "<a>Verdict : TLE</a>";
	}
	else if(trim($output)=="")
	{
		//echo "<a>Verdict : WA</a>";
	}
	else if($check==0)
	{
		//echo "<a>Verdict : AC</a>";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
