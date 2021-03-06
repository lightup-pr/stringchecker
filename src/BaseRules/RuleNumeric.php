<?php

namespace Lightup\PasswordChecker\BaseRules;

use Lightup\PasswordChecker\Exceptions\StringValidationException;


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
        $this->minNumChars = $config['min'];
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function passes()
    {
        $numCharsFound = $this->countNumeric();
        $passed = $numCharsFound >= $this->minNumChars;
        if (!$passed) {
            $message = "Quantidade de caracteres numericos inválida (%s): A quantidade minima e %s";
            throw new StringValidationException(sprintf($message, $numCharsFound, $this->minNumChars));
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