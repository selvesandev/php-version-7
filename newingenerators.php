<?php

function values()
{
    yield 200;
    yield 500;
    return 800;
}

$controls = values();

foreach ($controls as $control) {
    echo $control . '<br>';//when you are using the current, send or iterating in a loop like this you are going
    //to get the yield value but not the return value
}

echo "<br>" . $controls->getReturn();//this will help us to received the returned value i.e 800;

echo "<hr>";

function gen1()
{
    yield from gen2();
    yield from [200, 400];
    yield 500;
}

function gen2()
{
    yield 'this';
    yield 'is';
    yield 'demo';
}

$yControl=gen1();
foreach ($yControl as $item){
    echo $item.'<br>';
}