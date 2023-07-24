<?php

declare(strict_types=1);

namespace Tests\Support\Page\Profile;

class SettingsPage
{
    private $changeLanguageButton = '//p[text()="Изменить язык"]';
    private $offerButton = '//a[@href="/offer"]';
    private $privacyButton = '//a[@href="/privacy"]';
    private $tester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function seeChangeLanguageButton() 
    {
        $this->tester->seeElement($this->changeLanguageButton);
    }

    public function openOffer() 
    {
        $this->tester->click($this->offerButton);
    }

    public function openPrivacy() 
    {
        $this->tester->click($this->privacyButton);
    }
}
