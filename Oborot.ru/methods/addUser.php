<?php
    include("../classes/DataBase.php");

    function valid($elem, $min , $max, $reg){
       if (iconv_strlen($elem) > $min && iconv_strlen($elem) < $max && preg_match($reg, $elem) !== 1){
           return 1;
       }
       return 0;
    }

    $db = new DataBase();

    $name = $_POST[Name];
    $lastname = $_POST[Last_name];
    $phone = $_POST[Phone];
    $comment = $_POST[Comment];

    $valid_name = valid($name, 2, 150, "/[^a-zA-Z0-9|-||.|\s]/");
    $valid_lastname = valid($lastname, 2, 150, "/[^a-zA-Z0-9|-||.|\s]/");

    $sql = "INSERT INTO `users` (`name`, `last_name`, `phone`, `comment`)
          VALUES 
          ( '{$name}', 
            '{$lastname}' ,
            '{$phone}' ,
            '{$comment}' )
        ";

    if(filter_var($phone , FILTER_VALIDATE_INT)  !== false ){
        if($valid_name == 1 ){
            if($valid_lastname == 1){
                $db->getConnection($sql);
                echo "The client has been added to the database."
            } else {
                echo "The last name must contain at least 2 characters and a maximum of 150.";
            }
        } else {
            echo "The name must contain at least 2 characters and a maximum of 150.";
        }
    } else {
        echo 'The phone number must consist only of digits.';
    }
?>