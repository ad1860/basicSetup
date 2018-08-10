<?php
use Data\Data;
use Page\Account,
    Page\Address;

use Behat\Behat\Context\Context;
class AccountContext implements Context
{

    private $account;
    private $address;

    public function __construct(Account $account, Address $address)
    {
        $this->account = $account;
        $this->address = $address;
    }

    /**
     * @When I login with :user user
     */
    public function iLoginWithValidUser($user)
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

    /**
     * @When I add new address in account
     */
    public function iAddNewAddressInAccount()
    {
        $address = Data::generateAddress();
        $this->address->fillAddressWith($address);
        $this->address->saveAddress();
    }

    /**
     * @Then the address should be displayed as additional address
     */
    public function theAddressShouldBeDisplayedAsDefaultAddress()
    {
        $this->address->hasAddress();
    }

    /**
     * @Then I am on address page
     */
    public function iAmOnAdressPage() {
        $this->address->openNewAddressPage();
    }

}