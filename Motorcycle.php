<?php

//Namespaces assemble your project under a unique and relevant name 
//so that none of your code components conflict when you integrate third-party code components

namespace Vehicle; //to help resolve current namespace
spl_autoload_register(); //supports class loading from a namespaced directory

class Motorcycle extends AbstractVehicle implements DriveInterface {
    
    public $stroke = 4;
    public $passengerCapacity = 2;
    public $steeringWheel = true;
    private $hasKey = true;
    private $hasKicked = true;

    function applyBreak(){
        echo "All the 2 breaks in the wheels applied. ". PHP_EOL;
    }

    function changeSpeed($speed){
        echo "The motorbike has been accelerated by $speed kph".PHP_EOL;
    }

    function changeGear($gear){
        echo "The motorbike gear has changed to $gear".PHP_EOL;
    }

    function start()
    {
        if($this->hasKey && $this->hasKicked)
        {
            $this->engineStatus = true;
        }
    }

    function getPrice():float
    {
        return $this->price - $this->price*0.05;
    }

}

$motorcycle = new Motorcycle('Kawasaki','Cruise', 'Black', $wheels=2, $engineNo='BYAIQ1');
echo "Motorcycle: ".$motorcycle->getNoOfWheels().PHP_EOL;
echo $motorcycle->stroke.PHP_EOL;
echo $motorcycle->getEngineNumber().PHP_EOL;
echo $motorcycle->steeringWheel.PHP_EOL;
$motorcycle->start();
echo "The motorcycle ". ($motorcycle->getEngineStatus()? 'is running':'has stopped') . PHP_EOL;
$motorcycle->stop();
echo "The motorcycle ". ($motorcycle->getEngineStatus()? 'is running':'has stopped') . PHP_EOL;
$motorcycle->changeSpeed(43);
$motorcycle->setPrice(4550);
echo 'Price = in USD '.$motorcycle->getPrice().PHP_EOL;
echo "Available motorcycles: ".Motorcycle::$counter . PHP_EOL;
