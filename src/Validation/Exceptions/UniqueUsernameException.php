<?php

namespace Roasted\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class UniqueUsernameException extends ValidationException {
    
    public static $defaultTemplates = [
        
        self::MODE_DEFAULT => [
            
            self::STANDARD => 'Username is already taken',
        ],
    ];
    
}