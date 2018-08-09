<?php
namespace Page;


class Account extends BasePage
{

    public function openLoginPage() {
        $this->visit("customer/account/login/");
    }

    /**
     * @param $email
     * @param $password
     */
    public function fillLoginWith($email, $password) {

        $this->fillWith("#email", $email);
        $this->fillWith("#pass", $password);
    }

    public function submitLogin() {
        $this->click("#send2");
    }

    public function dashboardIsDisplayed() {
        $this->assertIsVisible(".block-dashboard-info");
    }

    public function submitRegisterWith($data) {
        $this->visit("customer/account/create/");
        // fill form
        foreach ($data as $k => $v) {
            $this->fillWith("#$k", $v);
        }

        // submit form
        $this->click(".create button");
    }
}