<?php
/**
 * Created by PhpStorm.
 * User: lfalmeida
 * Date: 2/9/18
 * Time: 5:14 PM
 */

namespace Lightup\PasswordChecker;


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
                    throw new \Exception('A regra precisa implementar a interface ' . RuleInterface::class);
                }
            }
            return true;
        }

        if (!is_a($rules, RuleInterface::class)) {
            throw new \Exception('A regra precisa implementar a interface ' . RuleInterface::class);
        }
        return true;
    }
}