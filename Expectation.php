<?php
$a = 'apple';
assert(is_numeric($a), 'This is not a numeric');

//In php 7
ini_set('assert.exception', 1);

class HandleError extends AssertionError
{

}

$x = 10;
try {
    assert($x > 10, new HandleError("Some error text"));
} catch (Exception $e) {
    var_dump($e->getMessage());
}
