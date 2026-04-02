<?php
$document=file("student_info.txt");
// using foreach loop for get every single record from this file.
foreach($document as $record){
    list($ID,$Name,$Address)=explode(",",$record);
    echo "ID: ".$ID." <br>";
    echo "Name: ".$Name." <br>";
    echo "Address: ".$Address." <br>";
}

?>