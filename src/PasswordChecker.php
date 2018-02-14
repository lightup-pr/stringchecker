<?php

namespace Lightup\PasswordChecker;


class PasswordChecker
{
    /**
     *
     */
    public function passes()
    {
        $rules = [
            new RuleLength(8, 10),
            new RuleMixedCase()
        ];

    }
}