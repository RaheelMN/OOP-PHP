<?php

//class declaration. class keyword then name of class and curly brackets
class calculator{
    //class properties. variables
    //public means variables can be accessed outside class
    //Below properties are declared not initialized
    public $a,$b,$c;

    //Below property is intialized
    public $age=10;

    //class methods start with keyword function then function name
    function sum(){
        //To access function properties within methods $this-> is used.
        //It refers to object
        return $this->c = $this->a + $this->b;
    }
    function show(){
        echo "<br>Your age is : ".$this->age;
    }
}

//Object initialization
$var = new calculator();

//To access object property use -> symbol
$var->a = 10;
$var->b = 10;

//To access object method use -> symbol
echo "{$var->sum()}";

//To display initialized property
$var->show();
?>