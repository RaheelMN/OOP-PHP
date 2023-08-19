<?php

    namespace constants;

    interface job{
        public function joining(string $date):void;
    }

    class cons{
        use greeting;
        public $line;
        public $file;
        public $dir;
        public $function;
        public $class=__CLASS__;
        public $method;
        public $namespace=__NAMESPACE__;
        public $trait;
        function __construct(int $line,string $file,string $dir,string $function)
        {
            $this->line = $line;
            $this->file = $file;
            $this->dir = $dir;
            $this->function = $function;
            $this->method = __METHOD__;
        }

        public function setTrait(){
            $this->trait = $this->getTrait();
        }    
    }

    function show(\constants\cons $d){
        echo "<br>This is function show";  
        echo "<pre>";
        $d->line = __LINE__;
        $d->function = __FUNCTION__;
        print_r($d);
        echo "</pre>";  

    }

    trait greeting{
        public function getTrait():string{
            return __TRAIT__;
        }
    }

    if(trait_exists(__NAMESPACE__."\\".'greeting')){
        echo "<br>Trait greeting exists"; 
    }

    if(class_exists(__NAMESPACE__."\\".'cons')){
        $c = new cons(__LINE__,__FILE__,__DIR__,__FUNCTION__);

        //if object exists
        if(is_a($c,__NAMESPACE__."\\".'cons')){

            //if method exits
            if( method_exists($c,'setTrait')){
                $c->setTrait(); 
                echo "<br>method isTrait exists";       
            }            
        }   
    }    

    if(property_exists($c,'file')){
        echo "<br>property file exists"; 
    }        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditional functions</title>
</head>
<body>
    <p>These functions check name of class,object,trait etc.</p>
    <p>If these are defined then they return true else false</p>
</body>
</html>

