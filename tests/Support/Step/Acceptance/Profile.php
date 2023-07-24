<?php

declare(strict_types=1);

namespace Tests\Support\Step\Acceptance;

use Tests\Support\Page\LoginPage;
use Tests\Support\Page\HomePage;
use Tests\Support\Page\Profile\ProfilePage;

class Profile extends \Tests\Support\AcceptanceTester
{

    public function loginWithDefaultEmail()
    {
        $loginPage = new LoginPage($this);
        $homePage = new HomePage($this);
    
        $homePage->openHomePage();
        $homePage->clickLogIn();
        $this->closeTab();
        $loginPage->atPage();
        $loginPage->loginByDefaultCredentials();
        $loginPage->notAtPage();
    }
}
