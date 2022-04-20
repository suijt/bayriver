<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchPasswords implements Rule
{
   protected $actual_password;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($actual_password=null)
    {
        $this->actual_password = $actual_password;                      //Actual Password of the user
       
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
        //dd($this->actual_password,$value,Hash::check( $value, $this->actual_password));
        //dd("IMAGE RATION VALIDATION: VALUE:",$this->uploaded_val," MIN:",$this->min_val, " MAX: ", $this->max_val);
        return Hash::check( $value, $this->actual_password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Incorrect Old Password!";
    }
}
