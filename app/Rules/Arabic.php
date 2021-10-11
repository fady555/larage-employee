<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Arabic implements Rule
{


    private  $message_wont ;

    public function __construct($message)
    {
        $this->message_wont = $message;
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

        $result = preg_match("/\p{Arabic}/u", $value);

        if($result){ return true;}else{return false;}


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return $this->message_wont;

    }
}
