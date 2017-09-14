<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/currency.php';

if(isset($_POST['updateHotel'])) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



    echo $currency_id = $_POST['admin__currency_id'];

    if (empty(test_input($_POST['admin__currency_name']))) {
        $errorName = "*Currency name is required";
    } else {
        $currency_name = test_input($_POST['admin__currency_name']);
    }

    if (empty(test_input($_POST['admin__currency_abbreviation']))) {
        $errorAbbreviation = "*Currency abbreviation is required";
    } else {
        $currency_abbr = test_input($_POST['admin__currency_abbreviation']);
    }

    if (!isset($errorName) && !isset($errorAbbreviation)) {
        require_once 'classes/database.php';
        require_once 'classes/currency.php';
        $currencyObj = new Currency();
        $currencyUpdated = $currencyObj->updateCurrency($currency_name, $currency_abbr);
        require_once 'admin-currency-details.php';
    }
    else {
        include_once "header.php";
        require_once 'classes/database.php';
        require_once 'classes/currency.php';
        $currencyObj = new Currency();
        $currencyDetail = $currencyObj->currencyDetail($currency_id);
        require_once 'admin-currency-edit.php';
    }
}
?>