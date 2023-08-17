<?php
set_exception_handler('myexception');
function myexception($e){
    echo "<br>Error: ".$e->getMessage();
}

interface a{
    public function hello($name);
}

interface b{
    function fruit($name);
    function pi();
}

class c implements a,b {
    private $name;
    function __construct($n)
    {
        $this->name = $n;
    }
    public function hello($name){
        echo "hello fruity $name";
    }
    public function fruit($name)
    {
        echo "i have $name";
    }
    public function pi(){
        echo "value of pi is 3.14";
    }

}

$obj = new c('raheel');
$obj->hello('bilal');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
</head>
<body>
    <p>If we want to inherit more than one class at same time then we have to use interface.</p>
    <p>Instead of using class in declaration we write interface.</p>
    <p>Interface has no properties and it can not have an object like abstract.</p>
    <p>Interface can only have method declaration and it is defined in derived class</p>
    <p>Interface methods have only public access modifier</p>
    <p>Derived class use implements instead of extends</p>
    <p>It is used for security purpose like in laravel</p>
</body>
</html>