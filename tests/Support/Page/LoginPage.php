<?php

declare(strict_types=1);

namespace Tests\Support\Page;

use \Codeception\Step\Argument\PasswordArgument;

class LoginPage
{
    private static $EMAIL = "";
    private static $PASSWORD = "";

    private $emailField = '//input[@name="email"]';
    private $passwordField = '//input[@name="password"]';
    private $loginButton = '//button[@type="submit"]';
    private $tester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function atPage() 
    {
        $this->tester->seeElement($this->emailField);
    }

    public function notAtPage()
    {
        $this->tester->waitForElementNotVisible($this->emailField, 5);
    }

    public function loginByDefaultCredentials()
    {
        $I = $this->tester;
        $I->fillField($this->emailField, self::$EMAIL);
        $I->fillField($this->passwordField, new PasswordArgument(self::$PASSWORD));
        $I->click($this->loginButton);
    }
}
