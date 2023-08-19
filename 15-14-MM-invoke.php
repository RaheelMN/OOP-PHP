<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>invoke magic method</title>
</head>
<body>
    <p>It is error method</p>
    <p>It is used when object is called as function.</p>
    <p>In invoke method we can perfom any task</p>
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

    //error handler for property

    //when object is called as function
    function __invoke()
    {
        echo "<br>Error Object cannot be called as function.";
    }
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
    //error handler when private method is called using object
    function __call($method,$arg){
        if(method_exists($this,$method)){
            echo "<br>Error call(): $method is a private method.";
        }else
            echo "<br>Error call(): $method method doesnot exists.";
    }  
    //error handler when private static function is called
    static function __callStatic($method,$arg){
        if(method_exists(__class__,$method)){
            echo "<br>Error call(): $method is a private static method.";
        }else
            echo "<br>Error call(): $method static method doesnot exists.";
    }    
    //error handler when isset function is used on private proptery of object
    function __isset($name){
        if(property_exists($this,$name)){
            if(isset($this->$name)){
                echo "<br> this->$name is set";
            }else{
                echo "<br> this->$name is not set";
            }
        }else
        echo "<br> this->$name is doesnot exists";        
    }
    //error handler when unset function is called on private property
    function __unset($name){
        if(property_exists($this,$name)){
            if(isset($this->$name)){
                unset($this->name);
                echo "<br> this->$name is unset";
            }else{
                echo "<br> this->$name is not initialized";
            }
        }else
        echo "<br> this->$name is doesnot exists";
    }    
    //error handler when object name is used as string
    function __toString()
    {
        return "<br> object cannot be used as string";
    }
    
    function __destruct(){
        echo "<br>class a object destroyed.";
    }
}

class student{
    public $course;
    private $hours;
    public $time;
    function __construct(string $c, int $h, string $t){
        $this->course = $c;
        $this->hours = $h;
        $this->time = $t;
    }
}


    $obj = new a('usman khan',33);
    $obj();

?>