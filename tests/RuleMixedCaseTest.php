<?php

namespace Lightup\PasswordChecker;

use PHPUnit\Framework\TestCase;

class RuleMixedCaseTest extends TestCase
{
    const LOWER_KEYWORD = 'minLower';
    const UPPER_KEYWORD = 'minUpper';

    public function testShouldPassesWhenStringContainsCorrectQuantityOfRequiredChars()
    {
        $config = [
            self::LOWER_KEYWORD => 2,
            self::UPPER_KEYWORD => 2,
        ];
        $rule = (new RuleMixedCase($config))->setInputString('BatatinhaFrita');
        $result = $rule->passes();
        $this->assertTrue($result);
    }

    public function testShouldFailWhenStringHaveLessThenRequiredUppercaseChars()
    {
        $config = [
            self::LOWER_KEYWORD => 2,
            self::UPPER_KEYWORD => 2,
        ];
        $rule = (new RuleMixedCase($config))->setInputString('batatinhaFrita');
        $this->expectException(\Exception::class);
        $result = $rule->passes();
        $this->assertTrue($result);
    }

    public function testShouldFailWhenStringHaveLessThenRequiredLowercaseChars()
    {
        $config = [
            self::LOWER_KEYWORD => 2,
            self::UPPER_KEYWORD => 2,
        ];
        $rule = (new RuleMixedCase($config))->setInputString('Batatinha');
        $this->expectException(\Exception::class);
        $result = $rule->passes();
        $this->assertTrue($result);
    }
}