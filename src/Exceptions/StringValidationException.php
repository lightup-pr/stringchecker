<?php

namespace Lightup\PasswordChecker\Exceptions;

/**
 * Class StringValidationException
 * @package Lightup\PasswordChecker
 */
class StringValidationException extends \Exception
{
    protected $errors;

    public function getErrors()
    {
        return $this->errors;
    }

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }
}