<?php

class A
{
    public $prop = "hello world";
    private $priv = "This is private to the object";
    private $arr = [20, 30, 40];
}

$serializedData = serialize(new A);

$unSerializedData = unserialize($serializedData,["allowed_classes"=>['X','A']]);
echo $unSerializedData->prop;