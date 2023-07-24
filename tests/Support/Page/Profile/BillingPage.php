<?php

declare(strict_types=1);

namespace Tests\Support\Page\Profile;

class BillingPage
{
    private static $CARD_NUMBER = '4000056655665556';
    private static $CVC = '555';
    private static $EXPIRY = '0524';

    private $payOnlineButton = '//button[span[text()="Оплатить онлайн"]]';
    private $paymentIFrame = '//iframe[@title="Защищенное окно для ввода платежных данных"]';
    private $numberField = '//input[@name="number"]';
    private $expiryField = '//input[@name="expiry"]';
    private $cvcField = '//input[@name="cvc"]';
    private $payOnlineButton2 = '(//button[span[text()="Оплатить онлайн"]])[2]';
    private $paymentDeclineMessage = '//div[contains(text(),"Карта отклонена.")]';
    private $tester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function clickPayOnlineButton() 
    {
        $this->tester->click($this->payOnlineButton);
    }

    public function switchToPaymentFrame() 
    {
        $I = $this->tester;
        $I->waitForElement($this->paymentIFrame, 10);
        $I->switchToIFrame($this->paymentIFrame);
    }

    public function fillTestCardData() 
    {
        $I = $this->tester;
        $I->fillField($this->numberField, self::$CARD_NUMBER);
        $I->fillField($this->expiryField, self::$EXPIRY);
        $I->fillField($this->cvcField, self::$CVC);
    }

    public function clickFormPayOnlineButton() 
    {
        $I = $this->tester;
        $I->switchToWindow();
        $I->click($this->payOnlineButton2);
    }

    public function seePaymentDeclineMessage()
    {
        $this->tester->seeElement($this->paymentDeclineMessage);
    }
}
