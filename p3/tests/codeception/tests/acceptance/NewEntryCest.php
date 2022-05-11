<?php

class NewEntryCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/test/login-as/1');
        $I->amOnPage('/home');
        $I->click('[test=submit]');
        $I->amOnPage('/new');

        $I->submitForm('[test=new]', array('entry'=>array(
            'days'=>'Wednesday',
            'notes'=>'Finally made it to hump day',
            'date'=>'05/0/2022',
            'pic_url'=>'https://upload.wikimedia.org/wikipedia/commons/b/bc/Juvenile_Ragdoll.jpg',
            '[test=submit]'=>'submit',
        )));
    }
}