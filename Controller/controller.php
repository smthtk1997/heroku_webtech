<?php
/**
 * Created by PhpStorm.
 * User: smith
 * Date: 2019-02-12
 * Time: 16:12
 */

if(isset($_POST))
{
    readCSV();
}

function readCSV(){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["userMail"];
    echo $fname.' '.$lname.' E-mail >>> '.$email;
    echo ("<br>");

    $file=fopen($_FILES["filepath"]["tmp_name"],"r") or die("Unable to open file!");

    while (!feof($file)){
        $content=fgetcsv($file);
        $count=count($content);
        for ($i=0;$i<$count;$i++){
            echo $content[$i]."\t";
        }
        echo "<br>";
    }
    fclose($file);
}


?>