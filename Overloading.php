<?php

class Overloading {
    //Overloading allows you to have multiple methods with the same name but different signatures
    //Magic methods are special proxy methods to access private/protected dynamic attributes
    //Works in object context and not in static context

    private $list = array();

    //Magic functions: must be public and NOT static and NO passing by reference
    public function __set($name, $value)
    {
        $this->list[$name] = $value;
    }

    //invoked when the inaccessible method has been called in the object context
    public function __call($name, $arguments)
    {
        var_dump($arguments);
    }

    //invoked when the inaccessible method has been called in the static context
    public function __callStatic($name, $arguments)
    {
        var_dump($arguments);
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->list))
        {
            return $this->list[$name];
        } 
        else 
        {
            echo 'Error: undefined dynamic attribute'.PHP_EOL;
        }
    }
    function add(): int
    {
        $sum = 0;
        $args = func_get_arg(3);

        foreach($args as $arg){
            $sum += $arg;
        }

        return $sum;
    }
}

$instance = new Overloading();
$instance->dynamicAttribute = '@Runtime'.PHP_EOL; //not previously declared __set('dybamicAttribute','@Runtime'.PHP.EOL);
echo $instance->dynamicAttribute; //__get('dybamicAttribute');

$instance->inAccessibleMethod(1,'param2');
$instance::inAccessibleStaticMethod();