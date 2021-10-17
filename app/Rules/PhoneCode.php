<?php

namespace App\Rules;

use App\Country_code_phone;
use Illuminate\Contracts\Validation\Rule;

class PhoneCode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

     public $message_error;
    public function __construct($message_error)
    {
        $this->$message_error = $message_error;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $x = substr($value,1,3);

        $result =  Country_code_phone::where('phonecode',$x)->count();

        if($result > 0):
            return true;

            else:

            return false;

            endif;



    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message_error;;
    }
}
