
    <?php
    $employee_info =[
                        [1,"Mahabub","alam@gamil.com","+8801755"] ,
                        [2,"Asad","islam@gamil.com","+8801755"] ,
                        [3,"Tanjil","hasan@gamil.com","+88017155"] ,
                        [4,"Polok","palok@gamil.com","+8801755"] 
                    ];

     for value assign and array destructuring

    foreach( $employee_info as $value){
        list($Id, $name , $mail , $contact)=explode(",",$value);
        echo "$Id | $name | $mail"."<br>";
    }

    $employee_info = [
    "1,Mahabub,alam@gmail.com,+8801755",
    "2,Asad,islam@gmail.com,+8801755",
];

   

    foreach($employee_info as $value){
    list($Id, $name , $mail , $contact) = explode(",", $value);
    echo "$name | $mail |$contact | $Id"."<br>";
}

    
    ?>
