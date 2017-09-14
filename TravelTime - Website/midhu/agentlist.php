<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_country_select.php";
include_once "classes/midhu_validation_class.php";
include_once "classes/midhuPicSelectClass.php";
include_once "classes/midhu_agent_select.php";

if(isset($_POST['row_Id']))
{

    session_start();

    $_SESSION['passedid'] = $_POST['passedid'];
    header("Location: agentdetaillist.php");

}
else
{

    session_start();
    $length = strlen($_SESSION['search1']);
    $length2 = strlen($_SESSION['search2']);

    if ($length > 0) {
        $obj = new midhu_agent_select();
        $FName = $_SESSION['FirstName'];
        $rows = $obj->select_agentname_function($FName);



    }
    if ($length2 > 0) {
        $obj = new midhu_agent_select();
        $CoName = $_SESSION['CName'];
        $CiName = $_SESSION['City'];
        $LName = $_SESSION['LanguageName'];
        $SName = $_SESSION['SpecialtyName'];


        if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['SpecialtyName']) == 0) {
            $rows = $obj->select_empty_function();

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_countryname_function($CoName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_cityname_function($CiName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_languagename_function($LName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_Specialtyname_function($SName);

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_LNameSName_function($CoName, $CiName);

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_CountryLanguage_function($CoName, $LName);

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_CountrySpecialty_function($CoName, $SName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_CityLocation_function($CiName, $LName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_LocationSpecialty_function($LName, $SName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_SpecialtyCity_function($SName, $CiName);

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['SpecialtyName']) == 0) {

            $rows = $obj->select_CountryLanguageCity_function($CoName, $LName, $CiName);

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['City']) == 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_CountryLanguageSpecialty_function($CoName, $LName, $SName);

        } else if (strlen($_SESSION['CName']) !== 0 && strlen($_SESSION['LanguageName']) == 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_CountryCitySpecialty_function($CoName, $CiName, $SName);

        } else if (strlen($_SESSION['CName']) == 0 && strlen($_SESSION['LanguageName']) !== 0 && strlen($_SESSION['City']) !== 0 && strlen($_SESSION['SpecialtyName']) !== 0) {

            $rows = $obj->select_LanguageCitySpecialty_function($LName, $CiName, $SName);

        } else {
            $rows = $obj->select_all_function($CiName, $CoName, $LName, $SName);

        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Travel Time</title>
    <?php include_once "midhu_script.php"?>
</head>
<body>

<header id="header">
    <link rel="stylesheet" href="styles/agent.css">
    <?php include_once "../header.php"?>
</header>
<div class ="page-wrapper">
    <form  action=" " method="post">
            <?php


            foreach ($rows as $row)
            {?>
               <p>&nbsp;</p>
               <p>&nbsp;</p>
               <p>&nbsp;</p>
                <div class="panel box clearfix panel-default">
                        <div class="col-md-2">
                            <div class="form-group">
                                <img src="<?php echo $row->Picture;?>" width="100px" height="100px">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls ">
                                    <div class ="row">
                                    <label for="id_name" class="control-label  requiredField">
                                        Name:
                                    </label>
                                    <div class="nm">
                                    <?php echo  $row->FirstName;?>
                                    <?php echo  $row->LastName;?>
                                    </div>
                                    </div>
                                    <div class ="row">
                                    <label for="id_city" class="control-label  requiredField">
                                        City:
                                    </label>
                                    <div class="nm">
                                        <?php echo  $row->City;?>
                                    </div>
                                    </div>
                                    <div class ="row">
                                        <label for="id_city" class="control-label  requiredField">
                                            Countries travelled:
                                        </label>
                                        <div class="nm">
                                            <?php echo  $row->Country;?>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <label for="id_city" class="control-label  requiredField">
                                            Languages Known:
                                        </label>
                                        <div class="nm">
                                            <?php echo $row->Languages;?>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="controls ">
                                    <div class ="row">
                                        <label for="id_name" class="control-label  requiredField">
                                            Phone:
                                        </label>
                                        <div class="nm">
                                            <?php echo   $row->Phone;?>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <label for="id_city" class="control-label  requiredField">
                                            Favourite Airlines:
                                        </label>
                                        <div class="nm">
                                            <?php echo  $row->FavouriteAirline;?>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <label for="id_city" class="control-label  requiredField">
                                            FavouriteDestination:
                                        </label>
                                        <div class="nm">
                                            <?php echo  $row->FavouriteDestination;?>
                                        </div>
                                    </div>
                                    <div class ="row">
                                        <label for="id_city" class="control-label  requiredField">
                                            Store:
                                        </label>
                                        <div class="nm">
                                            <?php echo  $row->Store;?>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>





                        <div class="col-md-3">
                              <div class="form-group">
                                   <div class="controls ">
                                       <form  action=" " method="post">
                                            <input type="hidden" name="passedid" value="<?php echo $row->Id;?>">
                                            <input type="submit" class="button" name="row_Id" value="Contact <?php echo  $row->FirstName;?>" />
                                       </form>
                                   </div>
                              </div>
                        </div>
                </div>


            <?php
           } ?>

    </form>
</div>
<div Id="scroll-up"><a href="#">^</a></div>
<footer id="footer">
    <?php include_once "../footer.php" ?>
</footer>

</body>


</html>

