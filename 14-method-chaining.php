<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>method chainning</title>
</head>
<body>
    <p>To use multiple methods in same statment we use method chaining</p>
    <p>It is similar to jquery method chainning</p>
    <p>To chain next method with current method we use return $this</p>
    <p>It return current object after function returns and now object can</p>
    <p>be used to call other method</p>
</body>
</html>

<?php
class a {

    public function first(){
        echo "<br> This is first method";
        return $this;
    }
    public function second(){
        echo "<br> This is second method";
        return $this;
    }
    public function third(){
        echo "<br> This is third method";
        return $this;
    }
}
$obj = new a();
$obj->first()->second()->third();

?>