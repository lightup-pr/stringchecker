<?php

namespace Lightup\PasswordChecker;

use Lightup\PasswordChecker\CompositeRules\UserPasswordChecker;
use Lightup\PasswordChecker\Exceptions\StringValidationException;
use PHPUnit\Framework\TestCase;

/**
 * Class UserPasswordCheckerTest
 * @package Lightup\PasswordChecker
 */
class UserPasswordCheckerTest extends TestCase
{
    public function testShouldReturnTrueWithAValidString()
    {
        $input = 'abcdefGH1'; //string valida
        $rule = (new UserPasswordChecker())->setInputString($input);

        try {
            $this->assertTrue($rule->passes());
        } catch (StringValidationException $e) {
            $errors = $e->getErrors();
            $this->assertNotEmpty($errors);
        }
    }

    public function testShouldThrowExceptionWithInputStringInvalid()
    {
        $input = 'a';
        $rule = (new UserPasswordChecker())->setInputString($input);

        try {
            $this->assertTrue($rule->passes());
        } catch (StringValidationException $e) {
            $errors = $e->getErrors();
            $this->assertNotEmpty($errors);
            // esta string infringe 3 as regras, precisa retornar 3 erros
            $this->assertEquals(3, count($errors));
        }
    }
}