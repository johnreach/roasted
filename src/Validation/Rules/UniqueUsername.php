<?php
namespace Roasted\Validation\Rules;

use Roasted\Models\User;
use Respect\Validation\Rules\AbstractRule;

class UniqueUsername extends AbstractRule {
    
    public function validate($input) {
        
        return User::where('username', $input)->count() === 0;
    }
}