<?php

namespace Lightup\PasswordChecker;

/**
 *
 */
class RuleLength extends RuleBase
{
    protected $minLength;
    protected $maxLength;
    protected $inputString;

    public function __construct(array $config)
    {
        $this->minLength = $config['min'];
        $this->maxLength = $config['max'];
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
            throw new StringValidationException(sprintf($message, $length, $this->minLength, $this->maxLength));
        }
        return $passed;
    }
}