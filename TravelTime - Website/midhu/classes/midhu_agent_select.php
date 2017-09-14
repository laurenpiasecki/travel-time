<?php
include_once "classes/Dbconnect.php";
class midhu_agent_select
{

    public function select_agentname_function($name)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE FirstName LIKE '%$name%' || Lastname LIKE '%$name%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_all_function($name, $cname, $lname, $sname)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE City = '$name' and Country LIKE '%$cname%' and Languages LIKE '%$lname%' and Specialty LIKE '%$sname%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_countryname_function($name)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$name%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_empty_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_cityname_function($name)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE City = '$name'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_languagename_function($lName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Languages LIKE '%$lName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_Specialtyname_function($SName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Specialty LIKE '%$SName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_LNameSName_function($CoName, $CiName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' && City = '$CiName'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_CityLocation_function($CiName, $LName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE City = '$CiName' && Languages LIKE '%$LName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_LocationSpecialty_function($LName, $SName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Languages LIKE '%$LName%' &&  Specialty LIKE '%$SName'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_CountryLanguage_function($CoName, $LName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' &&  Languages LIKE '%$LName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_CountryCity_function($CoName, $CiName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' &&  City = '$CiName'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_CountrySpecialty_function($CoName, $SName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' &&  Specialty LIKE '%$SName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_SpecialtyCity_function($SName, $CiName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Specialty LIKE '%$SName%' &&  City = '$CiName'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_CountryLanguageCity_function($CoName, $LName, $CiName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' && Languages LIKE '%$LName%' && City = '$CiName'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_CountryLanguageSpecialty_function($CoName, $LName, $SName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' && Languages LIKE '%$LName%' && Specialty LIKE '%$SName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }


    public function select_CountryCitySpecialty_function($CoName, $CiName, $SName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Country LIKE '%$CoName%' && City = '$CiName' && Specialty LIKE '%$SName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }
    public function select_LanguageCitySpecialty_function($LName,$CiName,$SName)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Languages LIKE '%$LName%' && City = '$CiName' && Specialty LIKE '%$SName%'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }

    public function select_agentdetails_function($Id)
    {

        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $query = "SELECT * FROM agent WHERE Id = '$Id'";
        $pdostmt = $db->prepare($query);
        $pdostmt->execute();
        $rows = $pdostmt->fetchAll(PDO::FETCH_OBJ);
        return $rows;
    }





}





?>






