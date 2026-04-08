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

class Student extends Person
{
    public $id;

    function __construct($name, $id, $address)
    {
        parent::__construct($name, $address);
        $this->id = $id;
    }

    function format()
    {
        $line = $this->name . "," . $this->id . "," . $this->address . "\n";
        file_put_contents("database.txt", $line, FILE_APPEND);
    }

    function display()
    {

        if (file_exists("database.txt")) {
            $data = file("database.txt");

            foreach ($data as $i => $line) {
                $row = explode(",", $line);

                echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                    </tr>";
            }
        }
    }
}