<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destruct methods</title>
</head>
<body>
    <p>As the name suggests this method is called when the object is destroyed and no longer in use.</p>
    <p> Generally at the end of the program and end of the function.</p>
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


class mysql1 {
    private $conn;
    public function __construct(string $ser_name="localhost", string $user_name="root", string $password="", string $db_name="test"){
        $this->conn = mysqli_connect($ser_name,$user_name,$password,$db_name);
        echo "<br>.This is magic method __construct";
    }

    public function selectAll():array{
        $sql = "SELECT * FROM stock";
        $result = mysqli_query($this->conn,$sql);
        $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $output;
    }
    public function __destruct()
    {
        echo "<br>.This is magic method __destruct";
        mysqli_close($this->conn);
    }
}

$obj = new mysql1();
$asar = $obj->selectAll();
echo "<pre>";
print_r($asar);
echo "</pre>";
?>