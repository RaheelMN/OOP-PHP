<?php

//There are three types of access modifiers
//Public, Protected and Private

//These modifiers are used in class before properties and methods (including constructor) declaration
//They restrict the scope and access of these properties

//Public 
//Public property or method can be accessed within class
//It can be accessed within derived class
//It can be accessed using its object

echo "<br><br> Public Access modifier <br>";

class public_student{
    public $name;
    public function __construct($n = 'No name'){
        //property has global scope within class
        $this->name = $n;

    }
    public function show(){
        //
        echo "<br>Student name is : ".$this->name;
    }
}

class public_dstudent extends public_student{

    public $age=0;

    //overiding base function
    public function show(){
        //accessing property $name in derived class
        echo "<br>Student name is : ".$this->name;  
        echo "<br>Student age is : ".$this->age;
    }
}

$st_base = new public_student("raheel");
$st_derive = new public_dstudent("mansoor");

$st_base->show(); //accessing public method
$st_base->name = 'kami'; //accessing public property

$st_derive->name = 'idress'; //accessing public property of base class
$st_derive->age=40; //accessing public property 
$st_derive->show();

//Protected
//Protected property or method can be accessed within class
//It can be accessed within derived class
//It cannot be accessed using its object or derived objects
echo "<br><br> Protected Access modifiers <br>";

class protect_student{
    //protected property can be accessed within base and its derived class 
    //but not through object
    protected $name;
    
    //constructor cannot be protected or object will not initialized
    public function __construct($n = 'No name'){

        $this->name = $n;

    }
    public function show(){
        //
        echo "<br>Student name is : ".$this->name;
    }
}

class protect_dstudent extends public_student{

    public $age=0;

    //overiding base function

    //Setting protected property value through method
    public function set_name($n){
        $this->name=$n;
    }

    public function show(){
        //accessing protected property $name in derived class
        echo "<br>Student name is : ".$this->name;  
        echo "<br>Student age is : ".$this->age;
    }
}

$stp_base = new protect_student("haider");
$stp_derive = new protect_dstudent("ali");

$stp_base->show(); //accessing public method

$stp_derive->age=40; //accessing public property 
$stp_derive->show();

$stp_derive->set_name('khan'); //accessing protected property through public method
$stp_derive->show();


//Private
//Private property or method can be accessed within class
//It cannot be accessed within derived class
//It cannot be accessed using its object or derived objects
echo "<br><br> Private Access modifiers <br>";

class private_student{
    private $name;
    
    //constructor cannot be private or object will not initialized
    public function __construct($n = 'No name'){

        $this->name = $n;

    }

    //accessing private property within class
    public function get_name(){
        
        echo "<br>Student name is : ".$this->name;
    }

    //setting private property within class
    protected function set_name($n){
        
        $this->name=$n;
    }    
}

class private_dstudent extends private_student{

    public $age=0;

    //setting private property $name of base class using protected function in base class 
    //using pubic method in derived class
    public function set_dname($name){
        $this->set_name($name);
    }

    //getting private property $name of base class using public function in base class
    //using public function in derived class
    public function show(){
        $this->get_name();
        echo "<br>Student age is : ".$this->age;
    }    
}

$stpr_base = new private_student("jamal");
$stpr_derive = new private_dstudent("ali");

$stpr_base->get_name(); //accessing private proptery through public method

$stpr_derive->age=40; //accessing public property 
$stpr_derive->show();

$stpr_derive->set_dname('khan1'); //setting private property of base class using its protected method in derived class
$stpr_derive->show();
?>