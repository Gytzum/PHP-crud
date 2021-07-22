<?php
    namespace admin;
class Admin {
    protected $adminLogin = 'admin';
    protected $adminPass = 'admin';

    private function __construct(){}

    function getLogin(){
        return $this->adminLogin;
    }
    function getPassword(){
        return $this->admiPass;
    }
}
