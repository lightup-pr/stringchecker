<?php

namespace Lightup\PasswordChecker;

use PHPUnit\Framework\TestCase;

class RuleLengthTest extends TestCase
{
    public function testShouldThrowExceptionWithStringTooLong()
    {
        $min = 8;
        $max = 10;
        $rule = (new RuleLength($min, $max))->setInputString('BatatinhaFrita');
        $this->expectException(\Exception::class);
        $this->assertTrue($rule->passes());
    }

    public function testShouldThrowExceptionWithStringTooShort()
    {
        $min = 8;
        $max = 10;
        $rule = (new RuleLength($min, $max))->setInputString('Batata');
        $this->expectException(\Exception::class);
        $this->assertTrue($rule->passes());
    }

    public function testShouldReturnTrueWhenStringMatchesMaxAllowedLength()
    {
        $min = 8;
        $max = 10;
        $rule = (new RuleLength($min, $max))->setInputString('pppppppppp');
        $this->assertTrue($rule->passes());
    }

    public function testShouldReturnTrueWhenStringMatchesMinAllowedLength()
    {
        $min = 8;
        $max = 10;
        $rule = (new RuleLength($min, $max))->setInputString('aaaaaaaa');
        $this->assertTrue($rule->passes());
    }
}