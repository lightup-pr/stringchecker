<?php

namespace Lightup\PasswordChecker;

/**
 * Class RuleMixedCase
 * @package Lightup\PasswordChecker
 */
class RuleMixedCase extends RuleBase
{
    protected $minLower;
    protected $minUpper;

    /**
     * RuleMixedCase constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->minLower = $config['lower'] ?? 1;
        $this->minUpper = $config['upper'] ?? 1;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function passes()
    {
        $lower = $this->countLower();
        if ($lower < $this->minLower) {
            $message = "Quantidade de letras minusculas invalida (%s): E necessario ao menos %s";
            throw new \Exception(sprintf($message, $lower, $this->minLower));
        }

        $upper = $this->countUpper();
        if ($upper < $this->minUpper) {
            $message = "Quantidade de letras maiusculas invalida (%s): E necessario ao menos %s";
            throw new \Exception(sprintf($message, $upper, $this->minLower));
        }

        return true;
    }

    /**
     * @return int
     */
    public function countUpper()
    {
        return strlen(preg_replace('/[a-z]+/', '', $this->inputString));
    }

    /**
     * @return int
     */
    public function countLower()
    {
        return strlen(preg_replace('/[A-Z]+/', '', $this->inputString));
    }

}