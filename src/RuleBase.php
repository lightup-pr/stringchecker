<?php
/**
 * Created by PhpStorm.
 * User: lfalmeida
 * Date: 2/9/18
 * Time: 5:14 PM
 */

namespace Lightup\PasswordChecker;


class RuleBase implements RuleInterface
{
    protected $inputString;

    public function setInputString(string $inputString)
    {
        $this->inputString = $inputString;
        return $this;
    }
}