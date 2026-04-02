
    <?php
    $employee_info =[
        [1,"Mahabub","alam@gamil.com","+8801755"],
        [2,"Asad","islam@gamil.com","+8801755"],
        [3,"Tanjil","hasan@gamil.com","+88017155"],
        [4,"Polok","palok@gamil.com","+8801755"],
    ];

    // for value assign and array destructuring

    foreach( $employee_info as list($Id, $name , $mail , $contact)){
        echo "$Id | $name | $mail"."<br>";
    }

    $data=["Rakib",12,77]
    // echo $data;
    ?>
