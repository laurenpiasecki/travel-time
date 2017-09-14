<?php
include_once "classes/Dbconnect.php";
include_once "classes/midhu_country_select.php";
include_once "classes/midhu_gift_insert.php";
include_once "classes/midhu_gifttype_select.php";
include_once "classes/midhu_validation_class.php";
include_once "classes/midhuPicSelectClass.php";
include_once "classes/midhu_giftcardpic_select.php";
$obj = new midhu_country_select();
$rows = $obj->select_country_function();
$obj3 = new midhu_gifttype_select();
$rows3 = $obj3->select_gifttype_function();
$obj4 = new midhu_validation_class();
$senderemailval = $obj4->midhu_sender_email_validation_function();
$receiveremailval = $obj4->midhu_receiver_email_validation_function();
$cardselectionval = $obj4->midhu_card_selection_function();
$currencyval = $obj4->midhu_currency_check_function();
$sendernameval = $obj4->midhu_sender_name_check_function();
$receivernameval = $obj4->midhu_receiver_name_check_function();
$confirmationemailval = $obj4->midhu_confirmation_email_validation_function();
$postalcodeval = $obj4->midhu_postalcode_check_function();
$address1val = $obj4->midhu_address1_check_function();
$address2val = $obj4->midhu_address2_check_function();
$provinceval = $obj4->midhu_province_check_function();
$cityval = $obj4->midhu_city_check_function();
$countryval = $obj4->midhu_country_check_function();
$confirmemailval = $obj4->midhu_email_match_validation_function();
$dateval = $obj4->midhu_date_validation_function();
$picselectobj = new midhuPicSelectClass();
$smallpiclink = $picselectobj -> select_piclink_function();

?>





<?php

if(isset($_POST['cart']))
{



    if ((isset($_POST['self_deliver']))=="") {
        $Deliverytype = "";
    }
    else
    { $Deliverytype = $_POST['self_deliver'];}
    $valueerrorlength = strlen($currencyval);
    $designerrorlength = strlen($cardselectionval);
    $sendernameerrorlength = strlen($sendernameval);
    $senderemailerrorlength = strlen($senderemailval);
    $receivernameerrorlength = strlen($receivernameval);
    $dateerrorlength = strlen($dateval);
    $reveiveremailerrorlength = strlen($confirmemailval);
    $confirmationerrorlength = strlen($confirmationemailval);
    $address1errorlength = strlen($address1val);
    $address2errorlength = strlen($address2val);
    $countryerrorlength = strlen($countryval);
    $citynameerrorlength = strlen($cityval);
    $provinceerrorlength = strlen($provinceval);
    $postalerrorlength = strlen($postalcodeval);
    if ($valueerrorlength == 0 && $designerrorlength ==0 && $sendernameerrorlength ==0 && $senderemailerrorlength ==0 &&
        $receivernameerrorlength ==0 && $dateerrorlength ==0 && $reveiveremailerrorlength ==0 && $confirmationerrorlength ==0 &&
        $address1errorlength ==0 && $address2errorlength ==0 && $countryerrorlength ==0 && $citynameerrorlength ==0 &&
        $provinceerrorlength ==0 && $postalerrorlength ==0)
    {
        $obj2 = new midhu_gift_insert();
        $rows2 = $obj2->insert_gift_function();
        ?>
        <script>
            alert ("Thanking for your purchase");
        </script> <?php
    }
    else
    {?>
        <script>
        alert ("Please fill the required fields");
        </script> <?php
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

<body  onload="myFunction()">

<header id="header">
    <?php include_once "../header.php"?></header>

<div class ="page-wrapper ">
    <div class="giftcard"><h1>Nothing feels quite as good as giving a gift</h1></div>
    <div class="banner"><img alt="Gift Card Banner" src="images/GiftCards/Giftcard-Banner.jpg"></div>
    <form  action="" method="post">
        <div class="box amount-selector clearfix">
            <h3>Choose a Value</h3>
            <p>Add a value to your card.</p>
            <div class="amount-wrap">
                <div class="row">
                    <input  type="button" name="button" class="button" id="button1" onclick="myfunction1()" value="$100" />
                    <input  type="button" name="button" class="button" id="button2" onclick="myfunction2()" value="$500" />
                    <input  type="button" name="button" class="button" id="button3" onclick="myfunction3()" value="$1000" />
                    <input  type="button" name="button" class="button" id="button4" onclick="myfunction4()" value="$2000" />
                    <input  type="button" name="button" class="button" id="button5" onclick="myfunction5()" value="$5000" />
                </div>
                <div class="value-box">
                    <div id="div_id_value" class="form-group">
                        <label for="id_value" class="control-label  requiredField">
                            Pick Your Own Amount<span class="asteriskField">*</span>
                        </label>
                        <div class="textinput">


                            <span class="textinput">$<input id="id_value" name="value1" type="text" placeholder="" value="<?php echo isset($_POST['value1']) ? $_POST['value1'] : '' ?>"></span>
                        </div>
                        <div Id="errmsg"><?php echo $currencyval;?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box amount-selector clearfix">
            <h3>Pick a Design</h3>
            <div class="box2">
            <div class= "col-md-6">
                <?php
                $objmainpic = new midhu_giftcardpic_select();
                $rowmainpics = $objmainpic->midhu_giftcardpic_large_select_function();
                foreach ($rowmainpics as $rowmainpic)
                {?>
                    <div class="display largePic"  id="<?php echo $rowmainpic->CardName;?>">
                        <p class="displayImage banner"><img src="<?php echo $rowmainpic->Link;?>"/></p>
                    </div>
                <?php } ?>
                </div>

                <div class="row">
                    <div class="controls col-sm-5 ">
                        <div class="col-md-9 ">
                            <div class="textcenter">
                            </div>
                            <div class="cardchoice" id="card_msg">
                                <p><span id="cardselectiondisplay"></span></p>
                            </div>
                            <div class="cardchoice" id="card_msg2">
                                <p><span id="cardselectiondisplay2"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class= "col-md-6">
                <div id="hiddentext"  >
                    <input  type = "hidden" class="textinput textInput form-control"  name="cardname" Id="cardname" placeholder=" " style="width:120px;"/ value="<?php echo isset($_POST['cardname']) ? $_POST['cardname'] : '' ?>">
                    <div Id="errmsg" ><?php echo $cardselectionval;?></div>
                </div>
                </div>
            </div>

            <div class="row">
                <div class="controls col-sm-1">
                    <div class="col-md-6 selection">
                        <label for="id_card" class="control-label  requiredField ">
                            Category<span class="asteriskField"></span>
                        </label>
                    </div>

                </div>
            </div>


            <div class="smallbox row">
                <div class="textinput textInput form-group ">
                    <div class="controls col-sm-5">
                        <div class="col-md-6">
                            <select class="form-control " name="CRName" id="CRName" value="<?php echo isset($_POST['CRName']) ? $_POST['CRName'] : '' ?>">
                                <option> selected </option>
                            </select>

                            <script>
                                $(document).ready(function() {

                                    $.getJSON('ajax/midhu_getCard.php', function (data) {
                                        var result = "";
                                        $.each(data, function (index, obj) {
                                            result += '<option value="' + obj.CName + '">' + obj.CName + '</option>';
                                        })
                                        $('#CRName').html(result);
                                    });

                                });
                            </script>
                        </div>


                        <script>
                            $(document).ready(function() {
                                $(".smpic1").show();
                                $(".smpic2").hide();
                                $(".smpic3").hide();
                                $(".smpic4").hide();
                                $('#CRName').change(function(){
                                    var test = ($('#CRName option:selected').val());
                                    if (test == "General")
                                    {
                                        $(".smpic1").show();
                                        $(".smpic2").hide();
                                        $(".smpic3").hide();
                                        $(".smpic4").hide();
                                    }
                                    else if (test == "Wedding") {
                                        $(".smpic1").hide();
                                        $(".smpic2").show();
                                        $(".smpic3").hide();
                                        $(".smpic4").hide();
                                    }
                                    else if (test == "Valentine's Day"){
                                        $(".smpic1").hide();
                                        $(".smpic2").hide();
                                        $(".smpic3").show();
                                        $(".smpic4").hide();
                                    }
                                    else if (test == "Miscellaneous"){
                                        $(".smpic1").hide();
                                        $(".smpic2").hide();
                                        $(".smpic3").hide();
                                        $(".smpic4").show();
                                    }
                                    else
                                    {
                                        $(".smpic1").show();
                                        $(".smpic2").show();
                                        $(".smpic3").show();
                                        $(".smpic4").show();
                                    }

                                })
                            });
                        </script>
                    </div>
                </div>
            </div>









            <div class="row smpic1">
                    <?php
                    $objp1 = new midhu_giftcardpic_select();
                    $rowsmallpic1s = $objp1->midhu_giftcardpic_general_select_function();
                    foreach ($rowsmallpic1s as $rowsmallpic1)
                    {?>
                        <div class="smpic  col-sm-2" id="smallPic"><img src="<?php echo $rowsmallpic1->Link;?>"id="<?php echo $rowsmallpic1->CardName;?>"/></div>
                    <?php } ?>
                </div>
                <div class="row smpic2">
                    <?php
                    $objp2 = new midhu_giftcardpic_select();
                    $rowsmallpic2s = $objp2->midhu_giftcardpic_wedding_select_function();
                    foreach ($rowsmallpic2s as $rowsmallpic2)
                    {?>
                        <div class="smpic col-sm-2" id="smallPic"><img src="<?php echo $rowsmallpic2->Link;?>"id="<?php echo $rowsmallpic2->CardName;?>"/></div>
                    <?php } ?>
                </div>
                <div class="row smpic3">
                    <?php
                    $objp3 = new midhu_giftcardpic_select();
                    $rowsmallpic3s = $objp3->midhu_giftcardpic_valentines_select_function();
                    foreach ($rowsmallpic3s as $rowsmallpic3)
                    {?>
                        <div class="smpic col-sm-2" id="smallPic"><img src="<?php echo $rowsmallpic3->Link;?>"id="<?php echo $rowsmallpic3->CardName;?>"/></div>
                    <?php } ?>
                </div>
                <div class="row smpic4">
                    <?php
                    $objp4 = new midhu_giftcardpic_select();
                    $rowsmallpic4s = $objp4->midhu_giftcardpic_miscellaneous_select_function();
                    foreach ($rowsmallpic4s as $rowsmallpic4)
                    {?>
                        <div class="smpic col-sm-2" id="smallPic"><img src="<?php echo $rowsmallpic4->Link;?>"id="<?php echo $rowsmallpic4->CardName;?>"/></div>
                    <?php } ?>
                </div>

        </div>








            <div class="box amount-selector  clearfix">
                <h3>Add a Message</h3>
                <p>Make your gift more personal by adding your own message.</p>
                <div id="div_id_message" class="form-group">
                    <div class="controls ">
                        <textarea class="textarea form-control msgbox" onkeyup="countChar(this)" cols="40" id="id_message" maxlength="1000" name="message" rows="10" value="<?php echo isset($_POST['message']) ? $_POST['message'] : '' ?>"></textarea>
                    </div>
                    <script>
                    function myFunction()
                    {
                    $('#charNum').text(1000);
                    }
                    </script>
                    <div id="charactersremaining">
                        <p>Character Limit: 1000    Characters remaining: <span Id="charNum"></span></p>
                    </div>
                </div>
            </div>




    <div class="box amount-selector clearfix">
        <h3>Arrange Delivery</h3>
        <p>Enter your name and email as you would like it to appear on the Gift Card.</p>

        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_sname" class="control-label  requiredField">
                    Your Name<span class="asteriskField">*</span>
                </label>
                <div class="controls ">
                    <input class="textinput textInput form-control" id="id_name"  name="sname" type="text" value="<?php echo isset($_POST['sname']) ? $_POST['sname'] : '' ?>">
                </div>
                <div Id="errmsg" ><?php echo $sendernameval?></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_semail" class="control-label  requiredField">
                    Your Email Address<span class="asteriskField">*</span>
                </label>
                <div class="controls ">
                    <input class="emailinput form-control" id="id_email"  name="SenderEmail" type="text" value="<?php echo isset($_POST['SenderEmail']) ? $_POST['SenderEmail'] : '' ?>"/>
                    <div Id="errmsg" ><?php echo $senderemailval;?></div>
                </div>
            </div>
        </div>

       </div>
        <div class="row">


        <div class="col-md-6">
            <div class="form-group">
                <label for="id_rname" class="control-label  requiredField">
                    Recepient Name<span class="asteriskField">*</span>
                </label>
                <div class="controls ">
                    <input class="textinput textInput form-control" id="id_name"  name="rname" type="text" value="<?php echo isset($_POST['rname']) ? $_POST['rname'] : '' ?>">

                </div>
                <div Id="errmsg" ><?php echo $receivernameval?></div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_Ddate" class="control-label  requiredField">
                    Delivery Date<span class="asteriskField">*</span>
                </label>
                <div class="controls ">
                    <input class="textinput textInput form-control" type="text" name="DeliveryDate" id="calendar" style="width:320px; placeholder="Select Date" value="<?php echo isset($_POST['DeliveryDate']) ? $_POST['DeliveryDate'] : '' ?>" readonly=""/ >
                    <div Id="errmsg" ><?php echo $dateval?></div>
                    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                    <link rel="stylesheet" href="/resources/demos/style.css">
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                    <script>
                        $( function() {
                            $( "#calendar" ).datepicker();
                        } );
                    </script>





                </div>
            </div>
        </div>
        </div>

        <div class="checkbox">
            <label for="id_self_deliver" class="">
                <input class="checkboxinput checkbox" id="id_self_deliver" name="self_deliver" type="checkbox">
                Send my cards to my email address. I'll print them out and deliver them myself.
            </label>
        </div>


    </div>


    <div class="box amount-selector clearfix">

        <ul class="nav nav-pills">
            <h3>Delivery options</h3>
            <li class="active"><a data-toggle="pill" href="#home">E mail</a></li>
            <li><a data-toggle="pill" href="#menu1">By Post</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <table>
                    <tr>
                        <div Id="errmsg" ><?php echo $confirmemailval?></div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_remail" class="control-label  requiredField">
                                Recepient Email<span class="asteriskField">*</span>
                            </label>
                        <div class="controls ">

                            <input class="emailinput form-control" type="text" name="ReceiverEmail" value="<?php echo isset($_POST['ReceiverEmail']) ? $_POST['ReceiverEmail'] : '' ?>">
                        <div Id="errmsg" ><?php echo $receiveremailval?></div>
                        </div>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_cemail" class="control-label  requiredField">
                                Confirm Email<span class="asteriskField">*</span>
                            </label>
                        <div class="controls ">
                        <input class="emailinput form-control" type="text" name="CEmail" value="<?php echo isset($_POST['CEmail']) ? $_POST['CEmail'] : '' ?>">
                        <div Id="errmsg" ><?php echo $confirmationemailval?></div>
                        </div>
                        </div>
                        </div>

                    </tr>


                </table>
            </div>
            <div id="menu1" class="tab-pane fade">
                   <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_add1" class="control-label  requiredField">
                                    Address1<span class="asteriskField">*</span>
                                </label>
                                <div class="controls ">
                                    <input class="textinput textInput form-control" type="text" name="address1" value="<?php echo isset($_POST['address1']) ? $_POST['address1'] : '' ?>">
                                    <div Id="errmsg" ><?php echo $address1val?></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_add2" class="control-label  requiredField">
                                    Address2<span class="asteriskField">*</span>
                                </label>
                                <div class="controls ">
                                    <input class="textinput textInput form-control" type="text" name="address2" value="<?php echo isset($_POST['address2']) ? $_POST['address2'] : '' ?>">
                                    <div Id="errmsg" ><?php echo $address2val?></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="textinput textInput form-group">
                                <label for="id_country" class="control-label  requiredField">
                                    Country <span class="asteriskField">*</span>
                                </label>
                                <div class="controls ">
                                    <select class="form-control" name="CName" id="CName" value="<?php echo isset($_POST['CName']) ? $_POST['CName'] : '' ?>">
                                        <option> selected </option>
                                    </select>

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


                            <div Id="errmsg" ><?php echo $countryval?></div>
                                </div>
                        </div>
                   </div>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_prov" class="control-label  requiredField">
                                        Province<span class="asteriskField">*</span>
                                    </label>
                                    <div class="controls ">
                                        <select class="form-control" name="Province" id="Province" value=" ">
                                            <option>  </option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {


                                                 $('#CName').change(function(){
                                                    var country = $('#CName').val();
                                                    $.getJSON('ajax/midhu_getProvinceinCountry.php',{con : country}, function (data) {
                                                        var result1 = "";
                                                        $.each(data, function(index,Province){
                                                            result1 +=  '<option value="' + Province.Province +'">' + Province.Province + '</option>';
                                                        })
                                                        $('#Province').html(result1);
                                                    });
                                                })
                                            });
                                        </script>
                                        <div Id="errmsg" ><?php echo $provinceval?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_city" class="control-label  requiredField">
                                        City<span class="asteriskField">*</span>
                                    </label>
                                    <div class="controls ">
                                        <select class="form-control" name="City" id="City" value= " ">
                                            <option>  </option>
                                        </select>
                                        <script>
                                            $(document).ready(function() {

                                                    $('#Province').change(function () {
                                                        var province = $('#Province').val();
                                                        $.getJSON('ajax/midhu_getcityinprovince.php', {pro: province}, function (data) {
                                                            var result2 = "";
                                                            $.each(data, function (index, City) {
                                                                result2 += '<option value="' + City.City + '">' + City.City + '</option>';
                                                            })
                                                            $('#City').html(result2);
                                                        });
                                                    })
                                            });
                                        </script>
                                        <div Id="errmsg" ><?php echo $cityval?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_pcode" class="control-label  requiredField">
                                        Postal Code<span class="asteriskField">*</span>
                                    </label>
                                    <div class="controls ">
                                        <input class="textinput textInput form-control" type="text" name="postalcode" value="<?php echo isset($_POST['postalcode']) ? $_POST['postalcode'] : '' ?>">
                                        <div Id="errmsg" ><?php echo $postalcodeval?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
            </div>

        <input type="submit" name="cart" class="button" value="Add to Cart">


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

