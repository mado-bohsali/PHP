<?php

//Dependency Injection is a software design approach that allows 
//avoiding hard-coding dependencies and makes it possible to change the dependencies both at runtime and compile time.

//inject an object through the class constructor

class Script {
    private $skills = array();

    public function __construct($skills)
    {
        $this->skills = $skills;
    }

    public function totalSkills()
    {
        return count($this->skills);
    }

    //inject the object to your class through a setter function
    public function setList($skills)
    {
        $this->skills = $skills;
    }
}

$script = new Script(array('item X','item Y', 'item Z'));



