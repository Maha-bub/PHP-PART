<?php

class Person
{
    public $name;
    public $address;

    function __construct($name, $address)
    {
        $this->name = $name;
        $this->address = $address;
    }
}

class InfoAll extends Person
{
    public $id;

    function __construct($name, $id, $address)
    {
        parent::__construct($name, $address);
        $this->id = $id;
    }

    function data_Store_Style()
    {
        $line = $this->name . "," . $this->id . "," . $this->address . "\n";
        file_put_contents("database.txt", $line, FILE_APPEND);
    }

    // 🔍 search by ID
    function display($searchId)
    {
        if (file_exists("database.txt")) {
            $data = file("database.txt");
            $found = false;

            foreach ($data as $line) {
                $row = explode(",", trim($line));

                // id match
                if ($row[1] == $searchId) {
                    echo "ID: " . $row[1] . "<br>";
                    echo "Name: " . $row[0] . "<br>";
                    echo "Address: " . $row[2] . "<br>";
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                echo "Record not found!";
            }

        } else {
            echo "File Not Found!";
        }
    }
}
?>