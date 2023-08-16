<?php

//Base class
class employee{
    public $name,$age,$salary;

    function __construct($n,$a,$s){
        $this->name=$n;
        $this->age=$a;
        $this->salary=$s;
    }

    function info(){
        echo "<br><br> Employee Information<br>"; 
        echo "<br> Name: ".$this->name;
        echo "<br> Age: ".$this->age;
        echo "<br> Salary: ".$this->salary; 
    }
}

//derived class
class manager extends employee{
    public $ta=90;
    public $allowance=100;
    public $total_salary;

    //declaring method of same name including __construct in derived class will overide the method in base class
    function info(){
        $this->total_salary = $this->salary + $this->ta + $this->allowance;
        echo "<br><br> Manager Information<br>"; 
        echo "<br> Name: ".$this->name;
        echo "<br> Age: ".$this->age;
        echo "<br> Salary: ".$this->total_salary;         
    }
}

//constructor function of base class is called automatically for derived class
$manager = new manager("Hamid",32,20000);
$employee = new employee('Salman',24,15000);

$manager->info();
$employee->info();
?>