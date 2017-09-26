#PHP Version 7

##Type Hinting

####Object Type Declaration
Available in php 5.0.
```php
function getA(A $obj)
{
    //will only accept object of class A
    //else fatal error
    //Here A can also be a interface
}
interface A{};
class X implements A{

}
getA(new X());


-------------------------------

class HelloWorld{
    public function test(self $x=new HelloWorld){
        //this will only receive the object of self
        //here also setting a default value
    }
}
    
```

####Primitive Type Declaration
Boolean, String, Float, Integer



####Closure Type Declaration
Accepts a closure function as an arguments. Available in php 5.4
```php
function acceptClosure(callable $closure)
{
    $closure();
}
```



##Return Type Declaration
Completely new in PHP.
```php

function returnInt(): int
{
    return "20"; //this is valid
    return 20.22; //return 20;
    return true; // return 1;
    return false; //return 0;
}

function booleanReturn():bool{};
function booleanFloat():float{};
function booleanString():String{};
function arrayReturn():array{};
function objReturn():className{};
function objReturn():callable{};
function objReturn():self{}; //should be used inside a class.

```

##Null Coalescing
Use this inspite of using if condition 
```php

$a = ['fruit' => 'apple'];
$personName = 'Selvesan';
echo $a['not_found'] ?? $personName ?? 'Not Available';

```


##SpaceShip Operator (<=>)

```php
$x= 2<=>2;// return 0;
$x= 1<=>2;// return -1;
$x= 3<=>2;// return 1;
$x= 3<=>"3";// return 0;
$x= array(1,2)<=>array(1,2);// return 0;
$x= array(2,2)<=>array(1,2);// return 1;

```


##Define Constant with Non Primitive Types
Before php 7 you could define constant with define function
with the value of premitive types only.

```php 7
const PERSON=['ram','shyam'];

Define('OFFICE', array('2', 3, 'hello'));
json_encode(OFFICE,128);

```

##Anonymous Classes.
Php 7 allows us to create anonymous classes so Now we have the
ability to build the object and the class itself is thrown away
not stored in memory and it cannot be re-instantiated.

```php
$framework = new class{
    //you can have all the method and properties here
}; //build the object and returned to the variable.

$framework->method();
$framwork::staticMethod();

```

####Constructor

```php
$framework = new class('selvesan') extends AnotherClass implements interface
{
    private $name = 'anonymous class';

    public function __construct($name)
    {
        $this->name = $name;
    }
}

```

##Unicode Character Render with HEX code

```php
echo "\u{2200}";
```


##Function Call Context
Like Javascript 
```php
$myFunc = function () {
    return 'test';
};
echo $myFunc();
```


```php

$callMethod = function () {
    var_dump($this); //$this will be available only if a object is passsed to this function
};

class A
{
    private $x = 10;
}

return $callMethod->call(new A());

```


##Unserialize function
In php7 the unserialize function takes a second arguments which 
allows us to filter what we can and what we can't unserialize for
security reasons.

```php

class A
{
    public $prop = "hello world";
    private $priv = "This is private to the object";
    private $arr = [20, 30, 40];
}

$serializedData = serialize(new A);

//Serialize only A and X
unserialize($serializedData,["allowed_classes"=>['X','A']]);

```


##ASSERT
In php 7 the assert error generating function can also take conditions

```php
assert($a>10,'Error description');

//you can also throw an object in case of error

ini_set('assert.exception',1);
class HandleError extends AssertionError{
}

assert($a>10,new HandlerError);




```

 