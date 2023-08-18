<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namespace</title>
</head>
<body>
    <p>If we include multiple files in script having same functions or classes</p>
    <p>then we use namespace. It is written at top of php code ie namespace name_of_namespace</p>
    <p>To use class in script we use name_of_namespace\className </p>
    <p>To use function in script we use \name_of_namespace\functionName</p>
    <p>use statment is used prevent giving full path to namespace class or function</p>
    <p>Use statment is also used to given alias</p>
</body>
</html>

<?php
    //include namespace n1
    require_once "13-namespace_file1.php";
    //include namespace n2
    require_once "13-namespace_file2.php";
    
    //use greetings class without specifying namespace n1
    use \n1\greetings;

    //use bye function without specifying namespace n1
    use function \n1\bye;
    
    set_exception_handler('myExceptionHandler');
    function myExceptionHandler(\Exception|string $e):void{
        if(gettype($e)=='object'){
            echo "<br> myException: ".$e->getMessage();
        }else
        echo "<br> myException: ".$e;
    }

    set_error_handler('myErrorHandler');
    function myErrorHandler(int $errno,string $errstr,string $errfile,int $errline){

        $error_msg = "-- myErrorHandler -- Error[$errno] in line: ".$errline."-- File Name: " .$errfile." -- Message:  ".$errstr;
        echo "<br> myError: ".$error_msg;

    }

    //function parameter type hint namespace
    function test(greetings $e): void{
        echo "<br>this is function test.";
        $e->hello();
    }

    //creating object of namespace n1's class
    $obj1 = new greetings();
    $obj1->hello();

    // creating object of namespace n2's class
    $obj2 = new n2\greetings();
    $obj2->hello();

    //calling n1 function
    bye();

    // calling n2 function
    \n2\bye();

    // passing n1 class object as argument
    test($obj1);
?>
