<?php

declare(strict_types=1);

namespace Tests\Support\Page\Profile;

class ProfilePage
{
    public static $URL = 'https://doculite.com/profile/view';

    private $dotsButton = '//h4[text()="Профиль"]/following-sibling::button'; 
    private $profileEditButton = '//a[@href="/profile/edit"]';
    private $settingsButton = '//a[@href="/profile/settings"]';
    private $billingButton = '//a[@href="/profile/billing"]';
    private $tester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function openProfilePage() 
    {
        $this->tester->amOnUrl(self::$URL);
    }

    public function goToProfileEdit() 
    {
        $I = $this->tester;
        $I->click($this->dotsButton);
        $I->click($this->profileEditButton);
    } 

    public function goToSettings() 
    {
        $this->tester->click($this->settingsButton);
    }

    public function goToBilling() 
    {
        $this->tester->click($this->billingButton);
    }
}
