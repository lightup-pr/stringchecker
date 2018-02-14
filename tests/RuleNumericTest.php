<?php

namespace Lightup\PasswordChecker;

use PHPUnit\Framework\TestCase;

class RuleNumericTest extends TestCase
{
    public function testShouldThrowExceptionWithWhenTotalNumericCharsIsLessThanRequired()
    {
        $config = [
            'minNumChars' => 2
        ];
        $rule = (new RuleNumeric($config))->setInputString('Abcdefg1');
        $this->expectException(\Exception::class);
        $this->assertTrue($rule->passes());
    }

    public function testShouldReturnTrueWhenNumCharsFoundIsEqualToRequired()
    {
        $config = [
            'minNumChars' => 2
        ];
        $rule = (new RuleNumeric($config))->setInputString('Abcdefg12');
        $this->assertTrue($rule->passes());
    }

    public function testShouldReturnTrueWhenNumCharsFoundIsMoreThenRequired()
    {
        $config = [
            'minNumChars' => 2
        ];
        $rule = (new RuleNumeric($config))->setInputString('Abcdefg123');
        $this->assertTrue($rule->passes());
    }
}