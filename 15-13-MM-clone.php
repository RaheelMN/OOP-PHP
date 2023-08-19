<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clone magic method</title>
</head>
<body>

    <p>It is called when one object is copied to another using equal sign.</p>
    <p>When variables have base datatype such as int, string etc and </p>
    <p>one variable is assigned to other then both variables have seperate memory allocation</p>
    <p>and data is passed as value. If we want to pass data by reference then & is used</p>
    <p>In this case both variables points to same memory address</p>
    <p>In objects when one object is assigned to other, it is by reference that means</p>
    <p>both objects points to same memory address. To prevent this clone keyword is used </p>
    <p>in assigment statment ie $obj1 = clone $obj2. But if one object has property of datatype class</p>
    <p>then it is passed as reference. To prevent it magic method clone is used</p>

</body>
</html>

<?php
//set default execption handling function
set_exception_handler('myExceptionHandler');

//define default exeption handling function
function myExceptionHandler(\Exception|string $e):void{
    if(gettype($e)=='object'){
        echo "<br> myException: ".$e->getMessage();
    }else
    echo "<br> myException: ".$e;
}

//set default error handling funtion
set_error_handler('myErrorHandler');

//define default error handling function
function myErrorHandler(int $errno,string $errstr,string $errfile,int $errline){

    $error_msg = "-- myErrorHandler -- Error[$errno] in line: ".$errline."-- File Name: " .$errfile." -- Message:  ".$errstr;
    echo "<br> myError: ".$error_msg;

}

class a {
    public $name;
    public $age;
    public $cr;
    function __construct(string $name,int $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function set_course(course $course): void{
        $this->cr = $course;
    }
    
    function __clone()
    {
        $this->cr = clone $this->cr;
    }
    function __destruct(){
        echo "<br>class a object destroyed.";
    }
}

class course{
    public $cname;
    private $hours;
    public $time;
    function __construct(string $c, int $h, string $t){
        $this->cname = $c;
        $this->hours = $h;
        $this->time = $t;
    }
}


    $st1 = new a('usman khan',33);
    $cr = new course('php',72,'morning');
    $st1->set_course($cr);
    echo "<br> student 1: ";
    echo "<pre>";
    print_r($st1);
    // echo "</pre>";
    $st2 = clone $st1;
    $st2->name = 'hamid';
    $st2->cr->cname = 'mysql';
    echo "<br> student 1: ";
    print_r($st1);
    echo "<br> student 2: ";
    print_r($st2);    
?>