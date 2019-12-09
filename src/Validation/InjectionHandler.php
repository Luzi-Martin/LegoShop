<?php

namespace App\Validation;

class InjectionHandler {
    public static function hasInjections($fields) {
        foreach($fields as $field) {
            if (preg_match('/(<|>|"|\')/',strval($field))) {
                return true;
            }
            return false;
        }
    }
}