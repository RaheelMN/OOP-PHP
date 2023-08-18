<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function paremter declaration</title>
</head>
<body>
    <p>When function is declared,its paremter names are assigned.</p>
    <p>We can restrict datatype of argument by using data type before name</p>
    <p>It will cause error when function is if paramter datatype donot match</p>
    <p>Else error will occur within function when parameter is used.</p>
</body>
</html>


<?php

function sum(int $a,int $b): int{
    return $a+$b;
}

function print_array(array $arr):void{
    foreach($arr as $key=>$value){
        echo '<br>'.$key.":".$value;
    }
}
class a{

    public function name(string $n=""):void{
        echo '<br>'.$n;
    }
}

$arr = ['name'=>'raheel','age'=>22,'hobby'=>'cycling'];
print_array([1,2,3]);
$arr1 = [1,2,3,4];
foreach($arr1 as $value){
    echo '<br>'.$value;
}
$obj = new a();
$obj->name($arr['name']);
echo '<br>'.gettype($obj);
echo '<br>'.gettype($arr);
echo '<br>'.gettype($arr['name']);
echo '<br>'.gettype($arr1[0]);
?>