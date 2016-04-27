<?php

namespace Roasted\Middleware;

class PersistInput extends Middleware {
    
    public function __invoke ($request, $response, $next) {
        
        // Add errors as global variables that can be accessed through the views
        
        if(isset($_SESSION['oldInput']))
            $this->view->getEnvironment()->addGlobal('oldInput', $_SESSION['oldInput']);

        $_SESSION['oldInput'] = $request->getParams();
        
        $response = $next($request, $response);
        
        return $response;
    }
    
}