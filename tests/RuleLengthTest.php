<?php

namespace Lightup\PasswordChecker;

use Lightup\PasswordChecker\BaseRules\RuleLength;
use Lightup\PasswordChecker\Exceptions\StringValidationException;
use PHPUnit\Framework\TestCase;

class RuleLengthTest extends TestCase
{
    public function testShouldThrowExceptionWithStringTooLong()
    {
        $config = ['min' => 8, 'max' => 10];
        $rule = (new RuleLength($config))->setInputString('BatatinhaFrita');
        $this->expectException(StringValidationException::class);
        $this->assertTrue($rule->passes());
    }

    public function testShouldThrowExceptionWithStringTooShort()
    {
        $config = ['min' => 8, 'max' => 10];
        $rule = (new RuleLength($config))->setInputString('Batata');
        $this->expectException(StringValidationException::class);
        $this->assertTrue($rule->passes());
    }

    public function testShouldReturnTrueWhenStringMatchesMaxAllowedLength()
    {
        $config = ['min' => 8, 'max' => 10];
        $rule = (new RuleLength($config))->setInputString('pppppppppp');
        $this->assertTrue($rule->passes());
    }

    public function testShouldReturnTrueWhenStringMatchesMinAllowedLength()
    {
        $config = ['min' => 8, 'max' => 10];
        $rule = (new RuleLength($config))->setInputString('aaaaaaaa');
        $this->assertTrue($rule->passes());
    }
}