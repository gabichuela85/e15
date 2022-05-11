# e15
+ Course work for CSCI E-15 
+ By: Gaby Brown  

OK (3 tests, 5 assertions)
root@hes:/var/www/e15/p3/tests/codeception# codecept run acceptance --steps
Codeception PHP Testing Framework v4.1.31 https://helpukrainewin.org
Powered by PHPUnit 8.5.24 #StandWithUkraine

Acceptance Tests (3) -------------------------------------------------------------------------------
EntryPageCest: Try to test
Signature: EntryPageCest:tryToTest
Test: tests/acceptance/EntryPageCest.php:tryToTest
Scenario --
 I am on page "/test/login-as/1"
 I am on page "/home"
 I see "Hello"
 PASSED 

LoginPageCest: User can log in
Signature: LoginPageCest:userCanLogIn
Test: tests/acceptance/LoginPageCest.php:userCanLogIn
Scenario --
 I am on page "/login"
 I see "Login"
 I see element "#email"
 I fill field "[name=email]","jill@harvard.edu"
 I fill field "[name=password]","asdfasdf"
 I click "button"
 I see "Jill Harvard"
 I see "Logout","nav"
 PASSED 

NewEntryCest: Try to test
Signature: NewEntryCest:tryToTest
Test: tests/acceptance/NewEntryCest.php:tryToTest
Scenario --
 I am on page "/test/login-as/1"
 I am on page "/home"
 I click "[test=submit]"
 I am on page "/new"
 I select option "days","Wednesday"
 I fill field "notes","today is going to be a great day"
 PASSED 

----------------------------------------------------------------------------------------------------


Time: 837 ms, Memory: 18.99 MB

OK (3 tests, 5 assertions)
root@hes:/var/www/e15/p3/tests/codeception# codecept run acceptance --steps
Codeception PHP Testing Framework v4.1.31 https://helpukrainewin.org
Powered by PHPUnit 8.5.24 #StandWithUkraine

Acceptance Tests (3) -------------------------------------------
EntryPageCest: Try to test
Signature: EntryPageCest:tryToTest
Test: tests/acceptance/EntryPageCest.php:tryToTest
Scenario --
 I am on page "/test/login-as/1"
 I am on page "/home"
 I see "Hello"
 PASSED 

LoginPageCest: User can log in
Signature: LoginPageCest:userCanLogIn
Test: tests/acceptance/LoginPageCest.php:userCanLogIn
Scenario --
 I am on page "/login"
 I see "Login"
 I see element "#email"
 I fill field "[name=email]","jill@harvard.edu"
 I fill field "[name=password]","asdfasdf"
 I click "button"
 I see "Jill Harvard"
 I see "Logout","nav"
 PASSED 

NewEntryCest: Try to test
Signature: NewEntryCest:tryToTest
Test: tests/acceptance/NewEntryCest.php:tryToTest
Scenario --
 I am on page "/test/login-as/1"
 I am on page "/home"
 I click "[test=submit]"
 I am on page "/new"
 I submit form "[test=new]",{"entry":{"days":"Wednesday","no...}
 PASSED 

----------------------------------------------------------------


Time: 795 ms, Memory: 18.99 MB

OK (3 tests, 5 assertions)
root@hes:/var/www/e15/p3/tests/codeception# 