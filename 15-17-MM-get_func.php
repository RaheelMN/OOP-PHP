<?php

    namespace gett;


    class jobs{

        public $name;

        function __construct(string $n){
            $this->name = $n;
        } 
        public static function getclass()  {
            echo "<br> i am in ".get_called_class();
        }
    }

    class employee extends jobs{
        public $title;
        public $salary;
        public function getInfo(string $t, int $s){
            $this->title = $t;
            $this->salary = $s;
        }
    }


        $c = new jobs('raheel');
        $clas = get_class($c);
        echo "<br>object c is of class $clas"; 
        $e = new employee('hamid');
        $pc = get_parent_class($e);
        echo "<br>object e parent class is $pc"; 
        $cm = get_class_methods($e);
        echo "<pre>";
        print_r($cm);
        echo "</pre>";
        $cp = get_class_vars(get_class($e));
        echo "<pre>";
        print_r($cp);
        echo "</pre>";
       
        jobs::getclass();
        employee::getclass();

        echo "<pre>";
        print_r(get_declared_classes());
        echo "</pre>";

        echo "<pre>";
        print_r(get_declared_interfaces());
        echo "</pre>";      
        
        echo "<pre>";
        print_r(get_declared_traits());
        echo "</pre>";         
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get functions</title>
</head>
<body>
    <p>These functions return information about objects, class etc.</p>
</body>
</html>

