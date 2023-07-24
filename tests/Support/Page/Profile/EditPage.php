<?php

declare(strict_types=1);

namespace Tests\Support\Page\Profile;

class EditPage
{
    private $lastNameField = '//input[@name="sLastName"]';
    private $nameField = '//input[@name="sName"]';
    private $saveButton = '//button[span[text()="Сохранить"]]';
    private $tester;

    public function __construct(\Tests\Support\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function getLastName() 
    {
        $I = $this->tester;
        $I->seeElement($this->lastNameField);
        $lastName = $I->grabValueFrom($this->lastNameField);
        return $lastName;
    }

    public function getName() 
    {
        $I = $this->tester;
        $I->seeElement($this->nameField);
        $name = $I->grabValueFrom($this->nameField);
        return $name;
    }

    public function editLastName($newLastName) 
    {
        $I = $this->tester;
        $I->clearField($this->lastNameField);
        $I->fillField($this->lastNameField, $newLastName);
    }

    public function editName($newName) 
    {
        $I = $this->tester;
        $I->clearField($this->nameField);
        $I->fillField($this->nameField, $newName);
    }

    public function clickSaveButton() 
    {
        $this->tester->click($this->saveButton);
    }
}
