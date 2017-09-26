<?php

//In php 7
ini_set('assert.exception', 1);//enabling

class HandleError extends AssertionError
{

}

$x = 11;
try {
    assert($x > 10, new HandleError("Some error text"));
} catch (Exception $e) {
    var_dump($e->getMessage());
}
