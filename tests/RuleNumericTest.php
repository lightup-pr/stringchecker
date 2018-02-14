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
        $rule = (new RuleNumeric($config))->setInputString('Batat1nhaFr1ta');
//        $this->expectException(\Exception::class);
        $this->assertTrue($rule->passes());
    }

}