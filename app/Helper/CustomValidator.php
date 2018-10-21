<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class CustomValidator
{
    public function existFromHash($attribute, $value, $parameters)
    {
        $hasValue =  Generator::hasValue($value);
        if($hasValue){
            return (bool)DB::table($parameters[0])
                ->where($parameters[1], Generator::getRealValue($value))
                ->count('id');
        }

        return false;
    }
}
