<!DOCTYPE HTML>
<html>
<body style="background-color: rgb(225,225,225)">
    <form name="savefile" method="post" action="">
        File Name: <input type="text" name="filename" value=""><br/>
        <textarea rows="16" cols="100" name="textdata"></textarea><br/>
        <input type="submit" name="submitsave" value="Save Text to Server">
</form>
    <br/><hr style="background-color: rgb(150,150,150); color: rgb(150,150,150); width: 100%; height: 4px;"><br/>
    <form name="openfile" method="post" action="">
        Open File: <input type="text" name="filename" value="">
       <button type="submit" name="submitopen" value="Submit File Request">sdfghj</button>
    <br/><hr style="background-color: rgb(150,150,150); color: rgb(150,150,150); width: 100%; height: 4px;"><br/>
    File Contents:<br/>
    <?php
    if (isset($_POST)){
        if ($_POST['submitsave'] == "Save Text to Server"  && !empty($_POST['filename'])) {
            if(!file_exists($_POST['filename'] . ".txt")){
                $file = tmpfile();
            }
            $file = fopen($_POST['filename'] . ".txt","a+");
            while(!feof($file)){
                $old = $old . fgets($file). "<br />";
            }
            $text = $_POST["textdata"];
            file_put_contents($_POST['filename'] . ".txt", $old . $text);
            fclose($file);
        }

        if ($_POST['submitopen'] == "Submit File Request") {
            if(!file_exists($_POST['filename'] . ".txt")){
                exit("Error: File does not exist.");
            }
            $file = fopen($_POST['filename'] . ".txt", "r");
            while(!feof($file)){
                echo fgets($file). "<br />";
            }
            fclose($file);
        }
    }
    ?>
</body>
</html>