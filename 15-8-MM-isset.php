<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isset magic method</title>
</head>
<body>
-------------------------------------------------------------------------------
|   Expression     | gettype()  | empty()  | is_null()  | isset()  | boolean  |
-------------------------------------------------------------------------------
| $x = "";         | string     | TRUE     | FALSE      | TRUE     | FALSE    |
| $x = null        | NULL       | TRUE     | TRUE       | FALSE    | FALSE    |
| var $x;          | NULL       | TRUE     | TRUE       | FALSE    | FALSE    |
| $x is undefined  | NULL       | TRUE     | TRUE       | FALSE    | FALSE    |
-------------------------------------------------------------------------------
    <p>It is error method.</p>
    <p>When we check if property is initialized and it is private or undefined</p>
    <p>then php parser genrates fatal error. To overwrite that error</p>
    <p>we can define our own method to deal with issue.</p>
    <p>It takes name of property and its arguments as an argument.</p>
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
    public $age;
    function __construct(string $name,int $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function get_name(){
        return $this->name;
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

    function __isset($name)
    {
        if(isset($this->$name)){
            echo "<br> this->$name is set";
        }else{
            echo "<br> this->$name is not set";
        }
    }
    //error handler for method
    function __destruct(){
        echo "<br>class a object destroyed.";
    }
}

    $obj = new a('u',33);
    // echo $obj->nsme;
    // $obj->name = "raheel";
    // $obj->tell();
    // a::tell();
    // a::hello();
    if(isset($obj->age)){
        echo "<br>obj->age is set";
    }else 
        echo "<br> obj->age is not set";
    if(isset($obj->name)){
        echo "<br> obj->name is set";
    }else 
        echo "<br> obj->name is not set";  
    $n=[];
    unset($n);
    $n = [];
    if(isset($n)){
        echo "<br> n is set";
    }else 
        echo "<br> n is not set";            
?>