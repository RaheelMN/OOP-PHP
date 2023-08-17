<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Late static binding</title>
</head>
<body>
    <p>If both base class and derived class have same property name and</p>
    <p>we access same property through child object then it will refer to</p>
    <p>parent property.</p>
    <p>It will not override parent property</p>
    <p>To access child property we have to use static instead of self before ::</p>
    <p>If we access property through class that each will refer to its property</p>
    <p>not of parent class</p>
</body>
</html>

<?php

class base {
    public static $total = 0;
    public function setTotal($t){
        self::$total = $t;
    }
    public function getTotal(){
        return static::$total;
    } 
}

class derived extends base{
    protected $name;
    //overriding parent property
    public static $total = 10;
    public function getT(){
        return parent::$total;
    }
}

$obj = new derived();
base::$total = 30;
derived::$total = 50;
echo "<br> total from base :".base::$total;
echo "<br> total from derived :".derived::$total;
echo "<br> total from obj using method :".$obj->getTotal();
echo "<br> total from obj using getTotal:".$obj::$total;
echo "<br> total from obj using getT :".$obj->getT();
?>