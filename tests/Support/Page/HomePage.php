<?php

declare(strict_types=1);

namespace Tests\Support\Page;

class HomePage
{
    public static $OFFER_TITLE = 'Пользовательское соглашение';
    public static $PRIVACY_TITLE = 'Политика конфиденциальности';
    private $logInButton = '//a[contains(@href,"login")]';
    private $tester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function openHomePage() 
    {
        $this->tester->amOnPage('/');
    }

    public function clickLogIn() 
    {
        $this->tester->click($this->logInButton);
    }

    public function atOfferTab() 
    {
        $I = $this->tester;
        $I->wait(3);
        $I->seeInTitle(self::$OFFER_TITLE);
    }

    public function atPrivacyTab() 
    {
        $I = $this->tester;
        $I->wait(3);
        $I->seeInTitle(self::$PRIVACY_TITLE);
    }
}
