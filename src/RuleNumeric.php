<?php

namespace Lightup\PasswordChecker;

/**
 * Class RuleNumeric
 * @package Lightup\PasswordChecker
 */
class RuleNumeric extends RuleBase
{
    protected $minNumChars;
    protected $inputString;

    /**
     * RuleNumeric constructor.
     * @param int $minNumChars
     */
    public function __construct(int $minNumChars)
    {
        $this->minNumChars = $minNumChars;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function passes()
    {
        $length = strlen($this->inputString);
        $passed = $this->countNumeric() >= $this->minNumChars;
        if (!$passed) {
            $message = "Quantidade de caracteres inválida (%s): A quantidade de caracteres deve ser entre %s e %s";
            throw new \Exception(sprintf($message, $length, $this->minNumChars, $this->maxLength));
        }
        return $passed;
    }

    /**
     * @return int
     */
    public function countNumeric()
    {
        return strlen(preg_replace('/[0-9]+/', '', $this->inputString));
    }
}