<?php

namespace Lightup\PasswordChecker;

/**
 * Class CompositeRuleBase
 * @package Lightup\PasswordChecker
 */
abstract class CompositeRuleBase extends RuleBase implements CompositeRulesInterface
{
    protected $errors;
    protected $rules;

    /**
     *
     */
    public function passes()
    {
        foreach ($this->rules as $rule) {
            try {
                /** @var $rule RuleInterface */
                $rule->setInputString($this->inputString);
                $rule->passes();
            } catch (\Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }
        return true;
    }

    /**
     * @param array $rules
     * @return bool
     * @throws \Exception
     */
    public function defineRules(array $rules = [])
    {
        // caso seja fornecido um array de regras
        if ($rules) {
            $this->validateRules($rules);
            $this->rules = $rules;
        }
        return true;
    }
}