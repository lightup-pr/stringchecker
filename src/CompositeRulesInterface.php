<?php
/**
 * Created by PhpStorm.
 * User: lfalmeida
 * Date: 2/14/18
 * Time: 11:37 AM
 */

namespace Lightup\PasswordChecker;


interface CompositeRulesInterface
{
    public function defineRules(array $rules);
}