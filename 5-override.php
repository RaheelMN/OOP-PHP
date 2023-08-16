<?php

//Override is used in dervied class. 
//If base class and derived class have same name of properties and methods then
//properties and methods in derived class will overide base class

//Base class
class employee{
    protected $name,$age,$salary;

    public function __construct($n,$a,$s){
        $this->name=$n;
        $this->age=$a;
        $this->salary=$s;
    }

    public function info(){
        echo "<br><br> Employee Information<br>"; 
        echo "<br> Name: ".$this->name;
        echo "<br> Age: ".$this->age;
        echo "<br> Salary: ".$this->salary; 
    }
}

//derived class
class manager extends employee{
    private $ta;
    private $allowance;
    public $total_salary;

    //declaring method of same name including __construct in derived class will overide the method in base class
    public function info(){
        $this->total_salary = $this->salary + $this->ta + $this->allowance;
        echo "<br><br> Manager Information<br>"; 
        echo "<br> Name: ".$this->name;
        echo "<br> Age: ".$this->age;
        echo "<br> Salary: ".$this->total_salary;         
    }

    function set_ta($x){
        $this->ta = $x;
    }

    function set_allowance($x){
        $this->allowance = $x;
    }    
}

//constructor function of base class is called automatically for derived class
$manager = new manager("Hamid",32,20000);
$employee = new employee('Salman',24,15000);
$manager->set_allowance(300);
$manager->set_ta(500);
$manager->info();
$employee->info();
?>