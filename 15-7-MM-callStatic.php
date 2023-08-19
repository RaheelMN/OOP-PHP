<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>call static magic method</title>
</head>
<body>
    <p>It is error method.</p>
    <p>When we call object's static method that is private or undefined</p>
    <p>then php parser genrates fatal error. To overwrite that error</p>
    <p>we can define our own method to deal with issue.</p>
    <p>It takes name of method and its arguments as an argument.</p>
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
    private $name;
    function __construct(string $name = ""){
        $this->name = $name;
    }
    private function greetings(){
        echo "<br>Good evening";
    }

    private static function hello(){
        echo "<br>Hello, nice to meet you";
    }
    //error handler for property
    function __get($param){
        if(property_exists($this,$param)){
            echo "<br>Error get(): $param is a private property.";
        }else
            echo "<br>Error get(): $param property doesnot exists.";
    }
    //error handler for property
    function __set($param,$value){
        if(property_exists($this,$param)){
            echo "<br>Error set(): $param is a private property.";
        }else
            echo "<br>Error set(): $param property doesnot exists.";
    }
    function __call($method,$arg){
        if(method_exists($this,$method)){
            echo "<br>Error call(): $method is a private method.";
        }else
            echo "<br>Error call(): $method method doesnot exists.";
    }  
    static function __callStatic($method,$arg){
        if(method_exists(__class__,$method)){
            echo "<br>Error call(): $method is a private static method.";
        }else
            echo "<br>Error call(): $method static method doesnot exists.";
    }    
    //error handler for method
    function __destruct(){
        echo "<br>class a object destroyed.";
    }
}

    $obj = new a('raheel');
    echo $obj->nsme;
    $obj->name = "raheel";
    $obj->tell();
    a::tell();
    a::hello();
?>