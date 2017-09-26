<?php

$myFunc = function () {
    return 'test';
};

echo $myFunc();


$callMethod = function () {
    var_dump($this);
};

class A
{
    private $x = 10;
}

return $callMethod->call(new A());