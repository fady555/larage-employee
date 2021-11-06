<?php

namespace App\Rules;

use App\Employee;
use Illuminate\Contracts\Validation\Rule;

class LevelCheeck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

     public $branch;
     public $department;
     public $level;
    public function __construct($branch,$department,$level)
    {
        $this->$branch = $branch;
        $this->$department = $department;
        $this->$level = $level;
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
        $emLvel = Employee::where('company_branch_id',$this->branch)->where('comapny_departments_id',$this->department)->exists();

        if($emLvel): return false; else: return true;  endif;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('app.There is a manager for that department and branch already');
    }
}
