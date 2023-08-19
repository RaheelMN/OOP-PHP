<?php

    namespace constants;

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

    define('PI',3.14);
    $c = new cons(__LINE__,__FILE__,__DIR__,__FUNCTION__);
    $c->setTrait();
    echo "<br>This is main"; 
    echo "<pre>";
    print_r($c);
    echo "</pre>"; 
    show($c);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>constants magic method</title>
</head>
<body>
    <p>Constants are created using define function. There scope is global and can be</p>
    <p>used anywhere in script. Similarly objects have constants two that can be used</p>
    <p>in class such as when we pass object as argument in function then its datatype</p>
    <p>is denoted by __class__ constant.</p>
    <p>It is used when object is called as function.</p>
    <p>In invoke method we can perfom any task</p>
</body>
</html>

