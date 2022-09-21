<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class AutotCest
{ 
    public function testForSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/autolomake.php');
        $I->fillField('rekisteri', 'ABC-237'); // this is the id of field
        $I->fillField('vari', 'sininen');
	$I->fillField('vuosimalli', '2010');
	$I->selectOption('omistaja', '200292-195H'); // this is the id of field
        $I->click('Lisää auto');
	$I->see('Tuote lisätty.');
	$I->dontsee('Rekisterinumero on käytössä!');
 
    }
	public function testForAlreadyRegistered(AcceptanceTester $I)
    {
        $I->amOnPage('/autolomake.php');
        $I->fillField('rekisteri', 'ABC-236'); // this is the id of field
        $I->fillField('vari', 'sininen');
	$I->fillField('vuosimalli', '2010');
	$I->selectOption('omistaja', '200292-195H'); // this is the id of field
        $I->click('Lisää auto');
	$I->see('Rekisterinumero on käytössä!');
	
 
    }
}
?>
