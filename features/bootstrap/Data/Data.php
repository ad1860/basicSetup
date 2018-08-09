<?php
namespace Data;

class Data
{

    private static $domain = '@mailinator.com';

    /**
     * Generates random email address
     * @return string
     */
    public static function generateRandomEmail(){
        $email = "t" . time() . self::$domain;
        return $email;
    }

    /**
     * @param null $length
     * @return string
     */
    public static function generateRandomString($length = null){
        if($length === null){ $length = 6; }
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        return substr(str_shuffle($chars),0, $length);
    }


    public static function getCredentials() {

    }

    public static function generateRegisterInfo($details) {
        $data = array();
//        switch ($details) {

//            default:
                $data['firstname'] = "test";
                $data['lastname'] = self::generateRandomString();
                $data['email_address'] = self::generateRandomEmail();
                $data['password'] = "123123Aqaz-";
                $data['password-confirmation'] = "123123Aqaz-";
//        }
        return $data;
    }

    public static function generateNews() {
        return include "news.php";
    }

    public static function getSearchTerm($search_term) {
        return $search_term;
    }

    public static function getEmail() {
        return "testuser1@mailinator.com";
    }

    public static function getPassword() {
        return "123123Aqaz-";
    }
}