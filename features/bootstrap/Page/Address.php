<?php
namespace Page;


class Address extends BasePage
{

    private $address;

    public function fillAddressWith($address) {
        $this->address = $address;

        $this->selectFrom($address['country'], "#country");
        unset($address['country']);

        foreach ($address as $k => $v) {
            $this->fillWith("#$k", $v);
        }
    }

    public function saveAddress() {
        $this->click("button.save");
    }

    public function hasAddress() {
        $notFound = "";

        // wait for the new address and get text
        $this->log("//address[./*[contains(text(), '".$this->address['street_1']."')]]");

        $text = $this->waitForElement("//address[./*[contains(text(), '".$this->address['street_1']."')]]")->getText();

        // check address
        foreach ($this->address as $k => $v) {
            if (stripos($text, $v) === false) {
                $notFound = $notFound . $v;
            }
        }

        if ($notFound != "") {
            throw new \Exception("The following text was not found in the address");
        }

    }

    public function openNewAddressPage() {
        $this->visit("customer/address/new/");
    }

}