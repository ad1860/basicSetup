<?php
use Data\Data;
use Page\Account;

use Behat\Behat\Context\Context;
class AccountContext implements Context
{

    private $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * @When I login with valid user
     */
    public function iLoginWithValidUser()
    {
        // open login page
        $this->account->openLoginPage();

        // enter credentials and submit
        $email = Data::getEmail();
        $this->account->fillLoginWith($email, Data::getPassword());
        $this->account->submitLogin();
    }


    /**
     * @Then then the dashboard should be visible
     */
    public function thenTheDashboardShouldBeVisible()
    {
        $this->account->dashboardIsDisplayed();
    }

    /**
     * @Then /^I submit register form with (.*) data$/
     * @param $description
     */
    public function iSubmitRegisterFormWith($description)
    {
        $data = Data::generateRegisterInfo($description);
        $this->account->submitRegisterWith($data);
    }
}