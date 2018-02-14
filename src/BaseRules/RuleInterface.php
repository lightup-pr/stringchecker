<?php

namespace Lightup\PasswordChecker\BaseRules;

interface RuleInterface
{
    public function setInputString(string $inputString);
    public function passes();
}