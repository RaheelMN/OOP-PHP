<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Static memebers</title>
</head>
<body>
    <p>Static member is attached to class not object</p>
    <p>For all of its objects its property value is same</p>
    <p>If we want to use class property or method without its instance ie object</p>
    <p>then we have to declare them static after access modifier</p>
    <p>To use static memeber of class we use double colons</p>
    <p>To access non static property within class we use $this that referes</p>
    <p>to its object but static member has no object. To access it within class we use</p>
    <p>self such as self::$name instead of $this->name</p>
    <p>if all memebers (properties and methods) of class are static then class itself</p>
    <p>is static class but if one or more members are non static then class is not static</p>
    <p>To use static member within derived class we use parent::$memeber instead of $this->member</p>
</body>
</html>

<?php
class a {
    protected $title;
    protected $age;
    protected $salary;
    protected static $staff=0;
    protected static $total_salary = 0;

    public static function getTotalInfo(){
        echo "<br>Total Staff: ".self::$staff;
        echo "<br>Total Salary: ".self::$total_salary;
    }

    public function getAge(){
         return self::$age;
    }
    public function setAge($a){
        $this->age=$a;
   }
    public function setTitle($t){
        $this->title=$t;
    }
    public function getTilte(){
        return $this->title;
    }
}

class b extends a{
    private $name;
    public static $hobby;
    public function __construct($name,$age,$title,$salary){
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->title = $title;
        parent::$staff++;
        parent::$total_salary += $salary;
    }

    public function getInfo(){
        echo "<br>Name: ".$this->name;
        echo "<br>Age: ".$this->age;
        echo "<br>Title: ".$this->title;
        echo "<br>Salary: ".$this->salary;
    }
}

//access static function through class name
a::getTotalInfo();

//initializing object
$child = new b('hamid',23,'developer',20000);

//initializing static property through object
$child::$hobby = "hiking";

//calling public method through object
$child->getInfo();

//access static function through derived object using double colon
$child::getTotalInfo();

//initializing object 2
$child2 = new b('idrees',33,'manager',30000);

//calling public method through object
$child2->getInfo();

//access static function through derived object using arrow notation
$child2->getTotalInfo();

//access static member of class through object
echo "<br>child2 hobby: ".$child2::$hobby;
?>