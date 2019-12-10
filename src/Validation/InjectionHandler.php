<?php

namespace App\Validation;

class InjectionHandler {
    public static function hasInjections($fields) {
        if(is_array($fields)) {
            foreach($fields as $field) {
                if (preg_match('/(<|>|"|\')/',strval($field))) {
                    return true;
                }
                return false;
            }
        } else {
            if (preg_match('/(<|>|"|\')/',strval($fields))) {
                return true;
            }
            return false;
        }
        
    }
}