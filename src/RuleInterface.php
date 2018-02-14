<?php

namespace Lightup\PasswordChecker;

interface RuleInterface
{
    public function setInputString(string $inputString);
    public function passes();
}