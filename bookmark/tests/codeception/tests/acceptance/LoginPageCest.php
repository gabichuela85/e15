<?php

class LoginPageCest
{
    public function _before(AcceptanceTester $I)
    {
        #executes before each of tests in the file are executed
    }

    // tests
    public function pageLoads(AcceptanceTester $I)
    {
        # Action...
        $I->amOnPage('/login');
        # Assertion...
        $I->see('Login');
        $I->seeElement('[test=email-input]');
    }
    
    public function userCanLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
         
        # Interact with form elements
        $I->fillField('[test=email-input]', 'jill@harvard.edu');
        $I->fillField('[test=password-input]', 'asdfasdf');
        $I->click('[test=login-button]');

        # Assert expected results
        $I->see('Jill Harvard');

        # Assert the existence of test within a specific element on the page
        $I->see('Logout', 'nav');
    }
    
    public function userDoesNotExist(AcceptanceTester $I)
    {
        $I->amOnPage('/login');

        $I->fillField('[test=email-input]', 'china@harvard.edu');
        $I->fillField('[test=password-input]', 'asdfasdf');
        $I->click('[test=login-button]');

        $I->see('These credentials do not match');
        $I->see('[test=alert]');
    }
}