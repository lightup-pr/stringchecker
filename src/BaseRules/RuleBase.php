<?php

namespace Lightup\PasswordChecker\BaseRules;

use Lightup\PasswordChecker\Exceptions\StringValidationException;


/**
 * Class RuleBase
 * @package Lightup\PasswordChecker\BaseRules
 */
abstract class RuleBase implements RuleInterface
{
    protected $inputString;

    /**
     * @param string $inputString
     * @return $this
     */
    public function setInputString(string $inputString)
    {
        $this->inputString = $inputString;
        return $this;
    }

    /**
     * @return mixed
     */
    abstract function passes();

    /**
     * @param $rules
     * @return bool
     * @throws \Exception
     */
    public function validateRules($rules)
    {
        if (is_array($rules)) {
            foreach ($rules as $rule) {
                if (!is_a($rule, RuleInterface::class)) {
                    throw new StringValidationException('A regra precisa implementar a interface ' . RuleInterface::class);
                }
            }
            return true;
        }

        if (!is_a($rules, RuleInterface::class)) {
            throw new StringValidationException('A regra precisa implementar a interface ' . RuleInterface::class);
        }

        return true;
    }
}