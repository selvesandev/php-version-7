# PHP Version 7

## Type Hinting

#### Object Type Declaration
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

#### Primitive Type Declaration
Boolean, String, Float, Integer



#### Closure Type Declaration
Accepts a closure function as an arguments. Available in php 5.4
```php
function acceptClosure(callable $closure)
{
    $closure();
}
```



## Return Type Declaration
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

## Null Coalescing
Use this inspite of using if condition 
```php

$a = ['fruit' => 'apple'];
$personName = 'Selvesan';
echo $a['not_found'] ?? $personName ?? 'Not Available';

```


## SpaceShip Operator (<=>)

```php
$x= 2<=>2;// return 0;
$x= 1<=>2;// return -1;
$x= 3<=>2;// return 1;
$x= 3<=>"3";// return 0;
$x= array(1,2)<=>array(1,2);// return 0;
$x= array(2,2)<=>array(1,2);// return 1;

```


## Define Constant with Non Primitive Types
Before php 7 you could define constant with define function
with the value of premitive types only.

```php 7
const PERSON=['ram','shyam'];

Define('OFFICE', array('2', 3, 'hello'));
json_encode(OFFICE,128);

```

## Anonymous Classes.
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

#### Constructor

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

## Unicode Character Render with HEX code

```php
echo "\u{2200}";
```


## Function Call Context
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


## Unserialize function
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


## Expectation (ASSERT)
In php 7 the assert error generating function can also take conditions

```php
assert($a>10,'Error description');

//you can also throw an object in case of error

ini_set('assert.exception',1);
class HandleError extends AssertionError{
}

assert($a>10,new HandlerError);

```


## Namespace
Namespaces are there to prevent conflict between to file, class or functions.  
Importing Class
```php
use mynamespace\MyClass as x;
$obj=new x();
```
Importing Function
```php
use function  myFunction\calc as calc;
calc();

```

Import Constant.
```php
use const myConst\Language;
```

In php 7
```php
use my\namespace\{classOne,classTwo as c2};
use function my\namespace\{funcOne, funcTwo as f2};
use const my\namespace\{constOne, constTwo as c2};

```

## Integer Division (intdiv(num1,num2))
Divide the numbers and forget the remainder.

```php
echo intdiv(10,3);//3
echo intdiv(11,3);//2
```


## Session Options
In php 7 you can modify your session option. Checkout the phpinfo() go to the session section(search for session);
we get a whole bunch of options for session in php 7 and which can also be modified by passing an associative array of key and value pair.
```php
session_start([
    'cache_limiter' => 'private',
    'read_and_close' => false
]);

$_SESSION['name'] = "James";

```

## Random Functions
Php 7 provides us some random data generating function. More secure way to generate salt.
```php
random_bytes(100);//random string generation 100 characters

random_int(10000,10000000);//no float can be generated.

```


## Regular Expression.
Php 7 Introduces the preg_replace_callback_array() function which takes two arguments.

```php
$subject = "Aaaaa aa BBBbb";

preg_replace_callback_array([
    '~[a]+~i' => function ($match) {
        echo '[a]', $match[0] . '<br>';
    },
    '~[b]+~i' => function ($match) {
        echo '[b]', $match[0] . '<br>';
    }
], $subject,[-1 is default limit],[$numOfMatches]);

```

Here the 2nd argument is the string for the regular expression check i.e $subject.  
And the 1st argument is the associative array with key as the regular expression and a callback function 
associated with it. Each time the subject matches with the regular expression the callback function is called. $match arg in the callback function will have the matched value.   
3rd argument is option which is limit by default it is -1 which means unlimited.  
4th argument is number of matches found.


## Generators
When you find a `yield` keyword in a function then that means it is a generator.
When you run a generator function it will return a object which lets you control the execution of your generator execution.
You can think this object as the pedal of your generator.

```php
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

```

Generator function allows you to breaks the execution context into iterable parts. It return an object which will let you manipulate how your
generator function will get invoked and then ofcourse what we have is the ability to pause, come out of the function etc.

  
**We can also send a value to the yield**  
```php

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

```

**ITERATOR on `yield`**
```php
function values()
{
    yield from [200,400,600];
    yield 500;
    return 800;
}

$controls = values();

foreach ($controls as $control) {
    echo $control . '<br>';//when you are using the current, send or iterating in a loop like this you are going
    //to get the yield value but not the return value
}

echo "<br>" . $controls->getReturn();//this will help us to received the returned value i.e 800;


```

**Note:** you cannot get return value of generators that hasn't returned the yield first. Therefore the getreturned should be after the getting the yield value.

#### Combining Two Generator Function 

```php

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
```

## Deprecated
* Php 7 No longer support the old Type class constructor i.e method name with the same name as class name. It will still work but can stop in any time soon.

* Calling a non static member in a static way is going to be removed in coming version. we can call the non static method using the scope resolution now.

* password_hash('string',PASSWORD_DEFAULT);
//$2y$10$alsdfjlasdf.lasdjf.sadlfjaljrowioeasdf 
1st 2 digists is the algorith default BYCRYPT.  
2st 2  digits $10 is cost greater number greater random value. too huge number will slow.  
3rt 22 digits in salt
and after that is your password

```php
password_hash('password',PASSWORD_DEFAULT,array(
    'salt'=>''//removed in php7 salt will be default
    'cost'=>16//allowed in php7
))
``` 



