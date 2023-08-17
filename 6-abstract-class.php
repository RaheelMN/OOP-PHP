<?php

//Abstract class cannot have object. It is a secure class.
//To access abstract class we have to use inheritance
//It has atleast one abstract method which is declared not implemented
//The derived class should implement the abstract method

abstract class fruits{
    protected $name;
    function __construct($n){
        $this->name = $n;
    }
    //abstract methods are only decalared 
    abstract protected function info();

    //non abstract method
    public function sum($a,$b){
        return $a+$b;
    }
}

class orange extends fruits{

    // A protected abstract method can be declared public in derived class 
    //Parameters names in abstract method and derived methods can be different
    //Number of parameters in both methods should match
    public function info(){
        echo "{$this->name}";
    }

}

$obj = new orange('orange');
// $obj->info();
echo "<br> sum of two numbers: ".$obj->sum(3,4);
?>