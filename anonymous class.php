<?php

$framework = new class
{
    private $name = 'anonymous class';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function apple()
    {
        echo 'test ';
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
};

echo $framework->apple()->getName();
