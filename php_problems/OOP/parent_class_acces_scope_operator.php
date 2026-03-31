<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent class access</title>
</head>
<body>
    <?php
    class ParentClass {
    public function show() {
        echo "Parent Method";
    }
}

class ChildClass extends ParentClass {
    public static function display() {
        parent::show();
    }
}

ChildClass::display();
// $obj = new ChildClass();
// $obj->display();
?>
?>

</body>
</html>