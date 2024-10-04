<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;

     /**
     * Perform a calculation based on operator and numbers
     *
     * @param float $number1
     * @param float $number2
     * @param string $operator
     * @return float|string
     */
    public function calculate($number1, $number2, $operator)
    {
        return match ($operator) {
            '+' => $this->add($number1, $number2),
            '-' => $this->subtract($number1, $number2),
            '*' => $this->multiply($number1, $number2),
            '/' => $this->divide($number1, $number2),
            default => 'Invalid operation',
        };
    }

    protected function add($number1, $number2)
    {
        return $number1 + $number2;
    }

    protected function subtract($number1, $number2)
    {
        return $number1 - $number2;
    }

    protected function multiply($number1, $number2)
    {
        return $number1 * $number2;
    }

    protected function divide($number1, $number2)
    {
        if ($number2 == 0) {
            return 'Cannot divide by zero';
        }
        return $number1 / $number2;
    }

}
