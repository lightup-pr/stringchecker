<?php

namespace Lightup\PasswordChecker\CompositeRules;

use Lightup\PasswordChecker\BaseRules\RuleLength;
use Lightup\PasswordChecker\BaseRules\RuleMixedCase;
use Lightup\PasswordChecker\BaseRules\RuleNumeric;

/**
 * Class UserPasswordChecker
 * @package Lightup\PasswordChecker
 */
class UserPasswordChecker extends CompositeRuleBase
{
    /**
     * PasswordChecker constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->defineRules();
    }

    /**
     * @param array $rules
     * @return bool
     * @throws \Exception
     */
    public function defineRules(array $rules = [])
    {
        parent::defineRules($rules);

        // definindo regras padrao para esta classe
        $ruleLength = new RuleLength(['min' => 8, 'max' => 10]);
        $ruleMixedCase = new RuleMixedCase(['minLower' => 2, 'minUpper' => 2]);
        $ruleNumeric = new RuleNumeric(['min' => 1]);

        $this->rules = [
            $ruleLength,
            $ruleMixedCase,
            $ruleNumeric
        ];

        return true;
    }

}