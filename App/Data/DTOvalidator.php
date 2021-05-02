<?php

namespace App\Data;

class DTOvalidator {

    public static function validate($minLength, $maxLength, $type, $value, $fieldName) {
        if ($type == 'text') {
            if (mb_strlen($value) < $minLength) {
                throw new \Exception("Полето  '" . $fieldName . "' е било празно!");
            } elseif ((mb_strlen($value) > $maxLength)) {
                throw new \Exception($fieldName . " трбява да е max 13 символа !");
            }
        } else if ($type == 'numeric') {
            if (is_numeric($value)) {
                if (mb_strlen($value) < $minLength || mb_strlen($value) > $maxLength) {
                    throw new \Exception($fieldName . " трябва да е между 6 и 13 символа!");
                } elseif (mb_strlen($value) < $minLength) {
                    throw new \Exception("Полето  '" . $fieldName . "' е било празно!");
                }
            }
        }
    }

}
