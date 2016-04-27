<?php
namespace Roasted\Validation\Rules;

use Roasted\Models\User;
use Respect\Validation\Rules\AbstractRule;

class UniqueEmail extends AbstractRule {
    
    public function validate($input) {
        
        return User::where('email', $input)->count() === 0;
    }
}