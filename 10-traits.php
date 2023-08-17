<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traits</title>
</head>
<body>
    <p>To use common functions in multiple class we can use trait</p>
    <p>Common function cannot access property of class like in inheritance</p>
    <p>in class we use notation use then name of function ie use getinfo;</p>
    <p>If there are multiple trait functions then we can seperate them by comma</p>
    <p>ie use getinfo,greetings;</p>

</body>
</html>
<?php
trait greetings{
    public function hello1(){
        echo "<br>Good morning";
    }
    public function bye(){
        echo "<br>Nice meeting you. See you soon.";
    }
}

trait hobby{
    public function getHobby(){
        echo "<br>My hobbies are: cycling, yoga,jumping jack";
    }
}

class a {
    public $name = 'hamid';
    use greetings,hobby;
}
$obj = new a();
$obj->hello1();
$obj->bye();
$obj->getHobby();


?>