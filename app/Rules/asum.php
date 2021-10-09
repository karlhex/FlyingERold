<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class asum implements Rule
{
    protected $amt;
    protected $column;
    protected $attribute;
    protected $type;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($arr,$type,$column)
    {
        $this->amt = array_sum(array_column($arr[$type]['record'],$column));
        $this->type   = $type;
        $this->column = $column;
        Log::debug('amt = '.$this->amt);
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
        Log::debug('attribute ='.$attribute." value=".$value);
        $this->attribute = $attribute;
        return $this->amt == $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->attribute . "和" . $this->type.".".$this->column."列的求和结果不一致.";
    }
}
