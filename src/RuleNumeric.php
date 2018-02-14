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
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->minNumChars = $config['minNumChars'];
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
            $message = "Quantidade de caracteres numericos inválida (%s): A quantidade ser minima e %s";
            throw new \Exception(sprintf($message, $length, $this->minNumChars, $this->maxLength));
        }
        return !!$passed;
    }

    /**
     * @return int
     */
    public function countNumeric()
    {
        return preg_match_all('/[0-9]/', $this->inputString);
    }
}