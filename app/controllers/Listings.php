<?php
class Listings 
{
    public function __construct()
    {
        echo "LISTINGS CONTROLLER LAUNCHED";
    }

    public function index() {
        require_once "../views/listings.php";
    }
}
