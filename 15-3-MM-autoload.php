<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>magic method autoload</title>
</head>
<body>
    <p>If we have mutliple classess in multiple files and we want to use them in script</p>
    <p>then one way is to use require/include</p>
    <p>Another way is to use magic method __autoload</p>
    <p>We create function __autoload and pass parameter which contains name of class</p>
    <p>which is same as name of file</p>
    <p>when we create new object of class 'A' it searches it first script then in autoload function</p>
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

spl_autoload_register(function($class_name) {
    $filename ='15-3-1-'.$class_name.'.php';
    echo "<br>filename is $filename";
    if(file_exists($filename))
    require_once $filename;
    // else
    // throw myExceptionHandler('File of class name doesnot exists.');
});

$obj = new greetings();
$obj->hello();
?>