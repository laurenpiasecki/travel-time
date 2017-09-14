<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_country_select.php";
include_once "classes/midhu_insurance_validation_class.php";

if(isset($_POST['quote']))
{
    session_start();
    $_SESSION['destination']= $_POST['destination'];
    $_SESSION['departcity'] = $_POST['departcity'];
    $_SESSION['DepartureDate'] = $_POST['DepartureDate'];
    $_SESSION['ReturnDate'] = $_POST['ReturnDate'];
    $_SESSION['Number1'] = $_POST['Number1'];
    $_SESSION['Province'] = $_POST['Province'];
    $_SESSION['Name1'] = $_POST['Name1'];
    $_SESSION['Age1'] = $_POST['Age1'];
    $_SESSION['Name2'] = $_POST['Name2'];
    $_SESSION['Age2'] = $_POST['Age2'];
    $_SESSION['Relationship2'] = $_POST['Relationship2'];
    $_SESSION['Name3'] = $_POST['Name3'];
    $_SESSION['Age3'] = $_POST['Age3'];
    $_SESSION['Relationship3'] = $_POST['Relationship3'];
    $_SESSION['Name4'] = $_POST['Name4'];
    $_SESSION['Age4'] = $_POST['Age4'];
    $_SESSION['Relationship4'] = $_POST['Relationship4'];
    $_SESSION['Name5'] = $_POST['Name5'];
    $_SESSION['Age5'] = $_POST['Age5'];
    $_SESSION['Relationship5'] = $_POST['Relationship5'];
    $_SESSION['Number1']  = $_POST['Number1'];
    $obj = new midhu_insurance_validation_class();
    $departurecityval = $obj->midhu_insurance_DepartureCity_validation_function();
    $departurecityerrorlength = strlen($departurecityval);

    $destinationval = $obj->midhu_insurance_destination_validation_function();
    $destinationerrorlength = strlen($destinationval);


    $numberoftravellersval = $obj->midhu_insurance_numberoftravellers_validation_function();
    $numberoftravellerslength = strlen($numberoftravellersval);

    $numberoftravellersval = $obj->midhu_insurance_numberoftravellers_validation_function();
    $numberoftravellerslength = strlen($numberoftravellersval);

    $provinceval = $obj->midhu_insurance_province_validation_function();
    $provincevallength = strlen($provinceval);

    $nameval = $obj->midhu_insurance_name_validation_function();
    $namevallength = strlen($nameval);

    $ageval = $obj->midhu_insurance_age_validation_function();
    $agevallength = strlen($ageval);


    $agentdate1validation = $obj->midhu_insurance_date1_validation_function();
    $agentdate1length = strlen($agentdate1validation);


    $agentdate2validation = $obj->midhu_insurance_date2_validation_function();
    $agentdate2length = strlen($agentdate2validation);


    if ( $departurecityerrorlength ==0 && $destinationerrorlength ==0 && $numberoftravellerslength ==0 && $provincevallength ==0 &&

    $agentdate1length ==0 && $agentdate2length ==0)

     {
        header("Location: GetQuote.php");
    }

}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Travel Time</title>
    <link rel="stylesheet" href="styles/giftcard.css">
    <?php include_once "midhu_script.php"?>
</head>

<body>

<header id="header">
    <?php include_once "../header.php"?>
</header>

<div class ="page-wrapper ">
    <div class="banner"><img alt="Gift Card Banner" src="images/Insurance/banner_travel1.jpg"></div>
    <div class="giftcard"><h1></h1></div>

    <form  action="" method="post">
        <div class="box amount-selector clearfix">
            <h3>Enter your trip details</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Departure City <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_departcity"  name="departcity" style="width:320px; placeholder=" type="text" value="<?php echo isset($_POST['departcity']) ? $_POST['departcity'] : '' ?>">
                        </div>
                      <?php
                        if(isset($_POST['quote']))
                        { ?>                <div Id="errmsg" ><?php echo $departurecityval; ?></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Destination <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_destination"  name="destination" style="width:320px; placeholder=" type="text" value="<?php echo isset($_POST['destination']) ? $_POST['destination'] : '' ?>"/>
                            <?php  if(isset($_POST['quote']))
                            { ?>
                            <div Id="errmsg" ><?php  echo $destinationval;?></div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_Ddate" class="control-label  requiredField">
                            Departure Date<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                            <link rel="stylesheet" href="/resources/demos/style.css">
                            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                            <input class="textinput textInput form-control" type="text" name="DepartureDate" id="calendar" style="width:320px; placeholder="Select Date" value="<?php  ?>" readonly=""/ >
                            <script>
                                $( function() {
                                    $( "#calendar" ).datepicker();
                                } );
                            </script>

                            <?php  if(isset($_POST['quote']))
                            { ?>
                                <div Id="errmsg" ><?php  echo $agentdate1validation;?></div>

                            <?php } ?>





                        </div>
                    </div>
                </div>






                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_Ddate" class="control-label  requiredField">
                            Return Date<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" type="text" name="ReturnDate" id="calendar2" style="width:320px; placeholder="Select Date" value="<?php  ?>" readonly=""/ >
                            <script>
                                $( function() {
                                    $( "#calendar2" ).datepicker();
                                } );
                            </script>


                            <?php  if(isset($_POST['quote']))
                            { ?>
                                <div Id="errmsg" ><?php  echo  $agentdate2validation;?></div>

                            <?php } ?>


                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_Ddate" class="control-label  requiredField">
                            Number of Travellers<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <select class="form-control " name="Number1" id="Number1" style="width:320px; placeholder="value="<?php echo isset($_POST['Number1']) ? $_POST['Number1'] : '' ?>">
                                <option> selected </option>
                            </select>

                            <script>
                                $(document).ready(function() {

                                    $(".test1").hide();
                                    $(".test2").hide();
                                    $(".test3").hide();
                                    $(".test4").hide();
                                    $(".test5").hide();

                                    $.getJSON('ajax/midhu_getNumber.php', function (data) {
                                        var result = "";
                                        $.each(data, function (index, obj) {
                                            result += '<option value="' + obj.Number + '">' + obj.Number + '</option>';
                                        })
                                        $('#Number1').html(result);
                                    });

                                });
                            </script>

                            <script>
                                $(document).ready(function() {
                                    $('#Number1').change(function() {
                                        var test = ($('#Number1 option:selected').val());
                                        if (test == 1)
                                        {
                                            $(".test1").show();
                                            $(".test2").hide();
                                            $(".test3").hide();
                                            $(".test4").hide();
                                            $(".test5").hide();
                                        }
                                        if (test == 2)
                                        {
                                            $(".test1").show();
                                            $(".test2").show();
                                            $(".test3").hide();
                                            $(".test4").hide();
                                            $(".test5").hide();
                                        }
                                        if (test == 3)
                                        {
                                            $(".test1").show();
                                            $(".test2").show();
                                            $(".test3").show();
                                            $(".test4").hide();
                                            $(".test5").hide();
                                        }
                                        if (test == 4)
                                        {

                                            $(".test1").show();
                                            $(".test2").show();
                                            $(".test3").show();
                                            $(".test4").show();
                                            $(".test5").hide();
                                        }
                                        if (test == 5)
                                        {
                                            $(".test1").show();
                                            $(".test2").show();
                                            $(".test3").show();
                                            $(".test4").show();
                                            $(".test5").show();
                                        }
                                    })
                                });
                            </script>
                            <?php  if(isset($_POST['quote']))
                            { ?>
                                <div Id="errmsg" ><?php  echo  $numberoftravellersval;?></div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_Ddate" class="control-label  requiredField">
                            Province<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" type="text" name="Province" id="Province" style="width:320px; placeholder="Select Date" value="<?php  ?>" >
                            <?php  if(isset($_POST['quote']))
                            { ?>
                                <div Id="errmsg" ><?php  echo  $provinceval;?></div>

                            <?php } ?>
                        </div>
                    </div>
                </div>



            </div>


            <div class="test1 row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Name(Primary insured)<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Name1"  name="Name1" type="text" value="<?php echo isset($_POST['Name1']) ? $_POST['Name1'] : '' ?>">
                        </div>

                        <?php  if(isset($_POST['quote']))
                        { ?>
                            <div Id="errmsg" ><?php echo $nameval?></div>

                        <?php } ?>







                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Age<span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Age1"  name="Age1" type="text" value="<?php echo isset($_POST['Age1']) ? $_POST['Age1'] : '' ?>">
                        </div>

                        <?php  if(isset($_POST['quote']))
                        { ?>
                            <div Id="errmsg" ><?php echo $ageval;?></div>

                        <?php } ?>





                    </div>
                </div>



            </div>

            <div class="test2 row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Name <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Name2"  name="Name2" type="text" value="<?php echo isset($_POST['Name2']) ? $_POST['Name2'] : '' ?>">
                        </div>
                        <div Id="errmsg" ><?php ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Age <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Age2"  name="Age2" type="text" value="<?php echo isset($_POST['Age2']) ? $_POST['Age2'] : '' ?>">
                        </div>
                        <div Id="errmsg" ><?php ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Relationship <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Relationship2"  name="Relationship2" type="text" value="<?php echo isset($_POST['Relationship2']) ? $_POST['Relationship2'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="test3 row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Name  <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Name3"  name="Name3" type="text" value="<?php echo isset($_POST['Name3']) ? $_POST['Name3'] : '' ?>">
                        </div>
                        <div Id="errmsg" ><?php ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Age <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Age3"  name="Age3" type="text" value="<?php echo isset($_POST['Age3']) ? $_POST['Age3'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Relationship <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Relationship3"  name="Relationship3" type="text" value="<?php echo isset($_POST['Relationship3']) ? $_POST['Relationship3'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="test4 row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Name <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Name4"  name="Name4" type="text" value="<?php echo isset($_POST['Name4']) ? $_POST['Name4'] : '' ?>">
                        </div>
                        <div Id="errmsg" ><?php ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Age <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Age4"  name="Age4" type="text" value="<?php echo isset($_POST['Age4']) ? $_POST['Age4'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Relationship <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Relationship4"  name="Relationship4" type="text" value="<?php echo isset($_POST['Relationship4']) ? $_POST['Relationship4'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="test5 row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_sname" class="control-label  requiredField">
                            Departure City <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="textinput textInput form-control" id="id_Name5"  name="Name5" type="text" value="<?php echo isset($_POST['Name5']) ? $_POST['Name5'] : '' ?>">
                        </div>
                        <div Id="errmsg" ><?php ?></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Destination <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Age5"  name="Age5" type="text" value="<?php echo isset($_POST['Age5']) ? $_POST['Age5'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_semail" class="control-label  requiredField">
                            Destination <span class="asteriskField">*</span>
                        </label>
                        <div class="controls ">
                            <input class="emailinput form-control" id="id_Relationship5"  name="Relationship5" type="text" value="<?php echo isset($_POST['Relationship5']) ? $_POST['Relationship5'] : '' ?>"/>
                            <div Id="errmsg" ><?php ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <input type="submit" name="quote" class="button" value="Get Quote">
</div>
  </form>

</div>

<div Id="scroll-up"><a href="#">^</a></div>
<footer id="footer">
    <?php include_once "../footer.php" ?>
</footer>

</body>


</html>

