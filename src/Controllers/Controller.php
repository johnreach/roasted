<?php
/**
 * @file    Controllers/Controller.php
 *
 * @brief   Base controller class to be inherited by other
 *          controllers and hand down container.
 *
 * @author  John Reach
 */
namespace Roasted\Controllers;

class Controller {
    
    protected $container;
    
    public function __construct($container) {
        
        $this->container = $container;
    }
    
    public function __get($property) {
                
        if($this->container->{$property})
            return $this->container->{$property};
    }
}