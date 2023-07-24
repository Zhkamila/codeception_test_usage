<?php

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Page\LoginPage;
use Tests\Support\Page\HomePage;

class LoginCest
{
    public function testLoginByEmail(AcceptanceTester $I, HomePage $homePage, LoginPage $loginPage)
    {
        $homePage->openHomePage();
        $homePage->clickLogIn();
        $I->switchToNextTab();
        $loginPage->atPage();
        $loginPage->loginByDefaultCredentials();
        $loginPage->notAtPage();
    }
}
