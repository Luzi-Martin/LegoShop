<?php

namespace App\Validation;

class InjectionHandler {
    public static function hasInjections($fields) {
        try {
            if(is_array($fields)) {
                foreach($fields as $field) {
                    if (preg_match('/(<|>|"|\')/',strval($field))) {
                        
                        return true;
                    }
                }
                return false;
            } else {
                if (preg_match('/(<|>|"|\')/',strval($fields))) {
                    return true;
                }
                return false;
            }
        } catch (\Throwable $th) {
            return true;
        }
        
        
    }
}