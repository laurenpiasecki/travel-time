<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_country_select.php";
include_once "classes/midhu_validation_class.php";
include_once "classes/midhuPicSelectClass.php";
include_once "classes/midhu_agent_select.php";
if(isset($_POST['search1']))
{


    session_start();
    $_SESSION['FirstName']= $_POST['FirstName'];
    $_SESSION['search1'] = $_POST['search1'];
    $_SESSION['search2']  = "";

    $FName = $_SESSION['FirstName'];
    $obj = new midhu_agent_select();
    $rows = $obj->select_agentname_function($FName);
   if (!$rows)
   {
     $msg = "No matching records found";
    }
    else
        {

    header("Location: agentlist.php");

}

}
if(isset($_POST['search2']))
{
    session_start();
    $_SESSION['CName']= $_POST['CName'];
    $_SESSION['City']= $_POST['City'];
    $_SESSION['LanguageName']= $_POST['LanguageName'];
    $_SESSION['SpecialtyName']= $_POST['SpecialtyName'];

    $_SESSION['search1']  = "";
    $_SESSION['search2'] = $_POST['search2'];

    $CoName =  $_POST['CName'];
    $CiName = $_POST['City'];
    $LName = $_POST['LanguageName'];
    $SName = $_POST['SpecialtyName'];

    $obj = new midhu_agent_select();

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


if (!$rows)
{
    $msg = "No matching records found";
}
else
{
    header("Location: agentlist.php");
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

<div class ="page-wrapper ">
       <br> 
        <p>&nbsp;</p>
    <div class="agentheading"><h1>If you have any questions feel free to call us at 1-800-123-5373 </h1></div>
   
    <div class="banner"><img alt="Gift Card Banner" src="images/Findanagent/AgentBanner.png"></div>
    <form  action="" method="post">
    <div class="box amount-selector clearfix">
        <h2>Find an Agent</h2>
        <p>Search for a consultant by their travel specialties, languages spoken or location..</p>
        <h3>Search by Name</h3>

       <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_semail" class="control-label  requiredField">
                    Search by first or last name:<span class="asteriskField"></span>
                </label>
                <div class="controls ">
                    <input class="textinput form-control" id="id_FirstName"  name="FirstName" type="text" value="<?php echo isset($_POST['SenderEmail']) ? $_POST['SenderEmail'] : '' ?>"/>
                    <div Id="errmsg" ><?php if(isset($_POST['search1']))
                        {echo $msg; } ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="id_sname" class="control-label  requiredField">
                    </label>
                    <div class="controls ">
                        <input type="submit" name="search1" class="button" value="Search">
                    </div>
                    <div Id="errmsg" ><?php  ?></div>
                </div>
        </div>
       </div>
    </div>

               <div class="box amount-selector clearfix">
                   <p>Search for a consultant by their travel specialties, languages spoken or location..</p>
                   <h3>Search by Specialties</h3>
                   <div Id="errmsg" ><?php if(isset($_POST['search2']))
                       {echo $msg; } ?></div>

                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="id_semail" class="control-label  requiredField">
                                   Countries Travelled:<span class="asteriskField"></span>
                               </label>
                               <div class="controls ">
                                   <select class="form-control" name="CName" id="CName" value="<?php echo isset($_POST['CName']) ? $_POST['CName'] : '' ?>">
                                       <option> selected </option>
                                   </select>
                                   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
                                   <script>
                                       $(document).ready(function() {

                                           $.getJSON('ajax/midhu_getCountry.php', function (data) {
                                               var result = "";
                                               $.each(data, function (index, obj) {
                                                   result += '<option value="' + obj.CName + '">' + obj.CName + '</option>';
                                               })
                                               $('#CName').html(result);
                                           });

                                       });
                                   </script>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                               <label for="id_semail" class="control-label  requiredField">

                               </label>
                               <div class="controls">
                                   <input type="submit" name="search2" class="button" value="Search">
                               </div>
                               <div Id="errmsg" ><?php  ?></div>
                           </div>
                       </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="id_semail" class="control-label  requiredField">
                                Languages Known:<span class="asteriskField"></span>
                               </label>
                               <select class="form-control" name="LanguageName" id="LanguageName" value="<?php echo isset($_POST['Language']) ? $_POST['Language'] : '' ?>">
                                   <option> selected </option>
                               </select>
                               <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
                               <script>
                                   $(document).ready(function() {

                                       $.getJSON('ajax/midhu_getLanguage.php', function (data) {
                                           var result = "";
                                           $.each(data, function (index, obj) {
                                               result += '<option value="' + obj.LanguageName + '">' + obj.LanguageName + '</option>';
                                           })
                                           $('#LanguageName').html(result);
                                       });

                                   });
                               </script>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="id_semail" class="control-label  requiredField">
                                   Office Location:<span class="asteriskField"></span>
                               </label>
                               <select class="form-control" name="City" id="City" value="<?php echo isset($_POST['City']) ? $_POST['City'] : '' ?>">
                                   <option> selected </option>
                               </select>
                                   <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
                                   <script>
                                       $(document).ready(function() {
                                           $.getJSON('ajax/midhu_getCity.php', function (data) {
                                               var result = "";
                                               $.each(data, function (index, obj) {
                                                   result += '<option value="' + obj.City + '">' + obj.City + '</option>';
                                               })
                                               $('#City').html(result);
                                           });
                                       });
                                   </script>
                               </div>
                           </div>
                       </div>
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="id_semail" class="control-label  requiredField">
                                   Specialty:  <span class="asteriskField"></span>
                               </label>
                               <select class="form-control" name="SpecialtyName" id="SpecialtyName" value="<?php echo isset($_POST['City']) ? $_POST['City'] : '' ?>">
                                   <option> selected </option>
                               </select>
                               <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
                               <script>
                                   $(document).ready(function() {
                                       $.getJSON('ajax/midhu_getSpecialty.php', function (data) {
                                           var result = "";
                                           $.each(data, function (index, obj) {
                                               result += '<option value="' + obj.SpecialtyName + '">' + obj.SpecialtyName + '</option>';
                                           })
                                           $('#SpecialtyName').html(result);
                                       });
                                   });
                               </script>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="id_semail" class="control-label  requiredField">

                               </label>
                               <div class="controls ">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
</form>

</div>

<div Id="scroll-up"><a href="#">^</a></div>
<footer id="footer">
    <?php include_once "../footer.php" ?>
</footer>

</body>


</html>
