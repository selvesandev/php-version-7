<?php

class myClass{
    static function method(){
        echo 'static';
    }
    function nonstatic(){
        echo 'non static';
    }
}
myClass::method();
myClass::nonstatic();//