<?php

namespace Lightup\PasswordChecker;


class PasswordChecker
{
    protected $rules;

    /**
     * PasswordChecker constructor.
     */
    public function __construct()
    {
        $ruleLength = new RuleLength(8, 10);
        $ruleMixedCase = new RuleMixedCase(['minLower' => 2, 'minUpper' => 2]);
        $this->rules = [
            $ruleLength,
            $ruleMixedCase
        ];
    }

    /**
     *
     */
    public function passes()
    {
    }
}