<?php
//  mail validation example;
$userMail="mahabubulalam0511@gmail.c321om";
$pettern="/^[a-zA-Z0-9._+%-]+@gmail\.[a-zA-Z0-9]{2,}$/";
if(preg_match_all($pettern,$userMail)){
    echo "valid mail";
}
else{
    echo "invalid mail";
}



// $userMail="mahabubulalam0511@gmail.com";
// $pettern="/^[a-zA-Z0-9._+%-]+@[A-Za-z0-9]+\.[a-zA-Z]{2,}$/";
// echo preg_match_all($pettern,$userMail);


?>