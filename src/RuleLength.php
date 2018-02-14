<?php

namespace Lightup\PasswordChecker;


class RuleLength extends RuleBase
{
    protected $minLength;
    protected $maxLength;
    protected $inputString;

    public function __construct(int $minLength, int $maxLength)
    {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function passes()
    {
        $length = strlen($this->inputString);
        $passed = $length >= $this->minLength && $length <= $this->maxLength;
        if (!$passed) {
            $message = "Quantidade de caracteres inválida (%s): A quantidade de caracteres deve ser entre %s e %s";
            throw new \Exception(sprintf($message, $length, $this->minLength, $this->maxLength));
        }
        return $passed;
    }
}