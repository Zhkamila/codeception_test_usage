<?php

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Tests\Support\Page\HomePage;
use Tests\Support\Page\Profile\ProfilePage;
use Tests\Support\Page\Profile\EditPage;
use Tests\Support\Page\Profile\SettingsPage;
use Tests\Support\Page\Profile\BillingPage;
use Tests\Support\Step\Acceptance\Profile;

class ProfileCest
{
    protected ProfilePage $profilePage;

    public function _before(Profile $I) 
    {
        $this->profilePage = new ProfilePage($I);
        $I->loginWithDefaultEmail();
        $this->profilePage->openProfilePage();
    }

    public function testEditProfile(AcceptanceTester $I)
    {
        $this->profilePage->goToProfileEdit();
        $editPage = new EditPage($I); 
        $newLastName = $editPage->getName();
        $newName = $editPage->getLastName();

        $editPage->editLastName($newLastName);
        $editPage->editName($newName);
        $editPage->clickSaveButton();
        $I->see($newLastName . ' ' . $newName);
    }

    public function testSettings(AcceptanceTester $I)
    {
        $this->profilePage->goToSettings();
        $homePage = new HomePage($I);
        $settingsPage = new SettingsPage($I);
        $settingsPage->seeChangeLanguageButton();

        $settingsPage->openOffer();
        $I->switchToNextTab();
        $homePage->atOfferTab();
        $I->closeTab();

        $settingsPage->openPrivacy();
        $I->switchToNextTab();
        $homePage->atPrivacyTab();
        $I->closeTab();
    }

    public function testBilling(AcceptanceTester $I)
    {
        $this->profilePage->goToBilling();
        $billingPage = new BillingPage($I);
        $billingPage->clickPayOnlineButton();
        $billingPage->switchToPaymentFrame();
        $billingPage->fillTestCardData();
        $billingPage->clickFormPayOnlineButton();
        $billingPage->seePaymentDeclineMessage();
    }
}
