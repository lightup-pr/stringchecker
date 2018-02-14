<?php

namespace Lightup\PasswordChecker;

use Lightup\PasswordChecker\BaseRules\RuleMixedCase;
use Lightup\PasswordChecker\Exceptions\StringValidationException;
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
        $this->expectException(StringValidationException::class);
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
        $this->expectException(StringValidationException::class);
        $result = $rule->passes();
        $this->assertTrue($result);
    }
}