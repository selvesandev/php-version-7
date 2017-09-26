<?php

function setNav()
{
    $distance = 0;
    echo 'start from top <br>';
    yield 'First Top<br>';
    echo 'second echo statement<br>';
    yield 'Second Step <br>';
    echo 'Second Last <br>';
    echo 'Last <br>';
    return 'hello';
}

$generatorControls = setNav();
echo $generatorControls->current();//Goes to the 1st yield will execute the code till there an return the yield value value.
echo $generatorControls->current();//will print First Top
echo $generatorControls->current();//will print First Top


echo $generatorControls->next();//the next method will not return anything so echo here is useless.

echo $generatorControls->current();//will print Second Step.

$generatorControls->next();

echo $generatorControls->getReturn();//will return the returned value from function here 'hello'
