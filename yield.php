<?php

function myFunc()
{
    $distance = 0;
    echo 'start of the generators <br>';
    $distance = yield.'<br>';
    echo $distance;
    $distance = yield.'<br>';
    echo $distance;
}

$control = myFunc();
$control->current();
echo 'analyzing distance....<br>';

$control->send(40);//the send method will let us send the value to the yield into the function

echo 'analyzing distance....<br>';

$control->send(80);