<?php

require_once './MyClass.php';
require_once './myfunction.php';

use mynamespace\MyClass as x;

use function  myFunction\calc as calc;
calc();

$obj=new x();

