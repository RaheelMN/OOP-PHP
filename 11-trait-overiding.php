<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trait overriding</title>
</head>
<body>
    <p>If function of same name is defined in derived class,trait and base class</p>
    <p>then first priority is given to dervied class, then trait then base class</p>
    <p>If dervied class uses two traits having same function name then it will generate error</p>
    <p>To avoid error we use special notation in dervied class in use statment.</p>
    <p>If you want to use same function name in both traits then use special statement</p>
    <p>We can change access modifier or trait in class in use statment</p>
</body>
</html>
<?php

use derived as GlobalDerived;

class base {
    public function greeting(){
        echo "<br> Good morning from base class.";
    }   

}

trait t1{
    public function greeting(){
        echo "<br> Good morning from trait t1.";
    }
    private function bye(){
        echo "<br> Good bye from trait t1.";
    }         
}

trait t2{
    public function greeting(){
        echo "<br> Good morning from trait t2.";
    }    
}

class derived extends base{
    use t1,t2{
        //specifying which trait function to use
        t2::greeting insteadOf t1;

        //changing access modifier of function
        t1::bye as public;
    }
    // public function greeting(){
    //     echo "<br> Good morning from derived class.";
    // }    
}

$obj = new derived();
$obj->greeting();
$obj->bye();
?>