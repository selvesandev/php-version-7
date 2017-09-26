<?php

function acceptClosure(callable $closure)
{
    echo "Accept Closure Function";
    $closure();
}

acceptClosure(function () {
    echo "Testing";
});


class A
{
    public function A()
    {
        echo "construct";
    }
}

function getA(A $obj)
{
}

getA(new A());




