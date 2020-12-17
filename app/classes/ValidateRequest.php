<?php

namespace App\Classes;

use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest
{
    private $errors = [];
    private $error_message = [
        'unique' => ":attribute is already taken",
        'required' => "The :attribute field is required",
        'minLength' => ":attribute must be at least :policy",
        'maxLength' => ':attribute must not be more than :policy',
        'email' => ":attribute must be email",
        'string' => ":attribute must be string",
        'number' => ":attribute must be number",
        'mixed' => ":attribute must be a to z , A to Z , @ and $",
    ];

    public function checkValidate($posts, $policies)
    {
        foreach($posts as $column => $value){
            if(in_array($column, array_keys($policies) )) {
                $this->doValidation([
                    "column" => $column,
                    "value" => $value,
                    "policies" => $policies[$column]
                ]);
            }
        }
        
    }

    public function doValidation($data)
    {
        $column = $data['column'];
        foreach($data["policies"] as $rule => $policy) {
            $valid = call_user_func_array([self::class, $rule],[$column, $data['value'], $policy]);
            if(!$valid) {
                $this->setError(
                    str_replace(
                        [":attribute",":policy"],
                        [$column, $policy],
                        $this->error_message[$rule]
                    ),
                    $column
                );
            }
        }    
    }


    public function unique( $column, $value, $policy)
    {
        if( $value != null && !empty($value)) {
            return !Capsule::table($policy)->where($column, $value)->exists();
        }
    }

    public function required($column, $value, $policy)
    {
        return $value != null && !empty(trim($value)) ;
    }
    
    public function minLength( $column, $value, $policy)
    { 
        if( $value != null && !empty(trim($value))) {
            return strlen($value) >= $policy;
        }
    }

    public function maxLength( $column, $value, $policy)
    {
        if( $value != null && !empty(trim($value))) {
            return strlen($value) < $policy;
        }
    }

    public function email( $column, $value, $policy)
    {
        if( $value != null && !empty(trim($value))) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
        return false;
    }

    public function string( $column, $value, $policy)
    {
        if( $value != null && !empty(trim($value))) {
            return preg_match("/^[a-zA-Z\ _-]+$/", $value);
        }
        return false;
    }

    public function number( $column, $value, $policy)
    {
        if( $value != null && !empty(trim($value))) {
            return preg_match("/^[0-9\.]+$/", $value);
        }
        return false;
    }

    public function mixed( $column, $value, $policy)
    {
        if( $value != null && !empty(trim($value))) {
            return preg_match("/^[a-zA-Z0-9\ .$@]+$/", $value);
        }
        return false;
    }

    public function setError($error, $key=null)
    {
        if($key) {
            $this->errors[$key] = $error;
        } else {
            $this->errors[] = $error;
        }
    }

    public function hasError()
    {
        return count($this->errors) > 0;
    }

    public function getError()
    {
        return $this->errors;
    }

}