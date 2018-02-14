<?php

namespace Lightup\PasswordChecker;

use PHPUnit\Framework\TestCase;

/**
 * Class UserPasswordCheckerTest
 * @package Lightup\PasswordChecker
 */
class UserPasswordCheckerTest extends TestCase
{
    public function testShouldThrowExceptionWithWhenTotalNumericCharsIsLessThanRequired()
    {
        $input = 'abc';
        $rule = (new UserPasswordChecker())->setInputString($input);

        try {
            $this->assertTrue($rule->passes());
        } catch (StringValidationException $e) {
            $errors = $e->getErrors();
            $this->assertNotEmpty($errors);
        }

    }
}