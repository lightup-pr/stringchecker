<?php

namespace Lightup\PasswordChecker;


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