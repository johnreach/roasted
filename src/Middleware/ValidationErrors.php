<?php

namespace Roasted\Middleware;

class ValidationErrors extends Middleware {
    
    public function __invoke ($request, $response, $next) {
        
        // Add errors as global variables that can be accessed through the views
        if (isset($_SESSION['validationErrors'])) {
            
            $this->view->getEnvironment()->addGlobal('errors', $_SESSION['validationErrors']);
            unset($_SESSION['validationErrors']);
        }
        
        $response = $next($request, $response);
        
        return $response;
    }
    
}