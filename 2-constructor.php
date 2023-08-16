<?php
//constructor function.
//It is used within class declaration
//It is called automatically when object is created
//It starts with double underscore then construct
//It takes arguments whose scope is local to constructor function
//Agruments can be initialized

class student{
    public $name,$age;

    function __construct($name="no name",$age = 0){
        $this->name= $name;
        $this->age = $age;
    }

    function show(){
        echo "<br>Your name is : ".$this->name;
        echo "<br>Your age is : ".$this->age;
    }
}


$st1 = new student();
$st2 = new student('jamal',20);

$st1->show();
$st2->show();
?>