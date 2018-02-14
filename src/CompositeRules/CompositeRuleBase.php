<?php

namespace Lightup\PasswordChecker\CompositeRules;

use Lightup\PasswordChecker\BaseRules\RuleBase;
use Lightup\PasswordChecker\BaseRules\RuleInterface;
use Lightup\PasswordChecker\Exceptions\StringValidationException;


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
     * @throws StringValidationException
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

        if (count($this->errors)) {
            $exception = new StringValidationException('Dados invalidos');
            $exception->setErrors($this->errors);
            throw $exception;
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