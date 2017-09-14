<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/10/2017
 * Time: 10:26 AM
 */
include_once 'header.php';
include_once "../Model/Connect.php";
include_once "../Model/Feedback.php";
include_once "../controller/feedbackcrud.php";
include('errorhandle.php');
$mobj = new Feedback();// model obj
$db = new Connect();// database obj
$conn = $db->connectDb();
$obj1 = new feedbackcrud();// crud obj

if(isset($_POST['userfeedback__submit'])){
    $date = date("Y-m-d");
    $fname = filter_input(INPUT_POST, 'userfeedback__firstname',FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'userfeedback__lastname',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'userfeedback__email',FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'userfeedback__phone');
    $title = filter_input(INPUT_POST, 'userfeedback__title');
    $message = filter_input(INPUT_POST, 'userfeedback__message');

    if(empty($date)){
        echo"Please date";
    }else{$mobj->setDate($date);}

    if(empty($fname)){
        $ferror="Please enter firstname";
        echo "Please enter firstname";
        return false;
    }else{$mobj->setFirstname($fname);}


    if(empty($lname)){
        echo"Please enter lastname";
    }else{$mobj->setLastname($lname);}


    if(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
        echo"Please enter valid email";
    }else{$mobj->setEmail($email);}

     if($phone == null || $phone == ""  ){
        echo"Please enter Phone no";
    }else{$mobj->setPhone($phone);}

    if($title == null || $title == "" ){
        echo"Please enter title";
    }else{$mobj->setTitle($title);}

    if($message == null || $message == "" ){
        echo"Please enter message";
    }else{$mobj->setMessage($message);}

    $result = $obj1->insertform($conn,$mobj);
    if($result){
        ?>   <script> sweetAlert("Your Message submitted successfully");</script>
        <?php
    }else{ ?> <script> sweetAlert("Unexpected error happen. Please try again.");</script> <?php }


}
else{
    //  echo "Page not submitted yet";
}
?>
<br><br><br>
<h2 style='text-align:center'>Feedback Form</h2>
<div class="container">
    <div class='row'>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form action='' class="form-horizontal" method='post' id="feedback">
                <fieldset>
                    <!-- input firstname-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">First Name</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="userfeedback__firstname" placeholder="First Name" class="form-control"  type="text" autofocus required >
                            </div>
                        </div>
                    </div>

                    <!-- input Lastname-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Last Name</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input  name="userfeedback__lastname" placeholder="Last Name" class="form-control"  type="text" required>
                            </div>
                        </div>
                    </div>

                    <!-- input Email-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input required name='userfeedback__email' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" placeholder="E-Mail Address" class="form-control" value=""  type="email">
                            </div>
                        </div>
                    </div>

                    <!-- input Phone-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone #</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input required name='userfeedback__phone' pattern="^\d{4}-\d{3}-\d{4}$" placeholder="xxxx-xxx-xxxx" class="form-control" type="tel">
                            </div>
                        </div>
                    </div>

                    <!-- input Title-->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Title</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input required name='userfeedback__title' placeholder="Title" class="form-control"  type="text">
                            </div>
                        </div>
                    </div>


                    <!--input Comment -->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Comment</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                <textarea class="form-control" name='userfeedback__message' required placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>


                    <!--Submit button-->

                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4">
                            <button type="submit" name='userfeedback__submit'  class="btn btn-warning" >Send <span class="glyphicon glyphicon-send"></span></button>

                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="col-sm-2"></div>
    </div>
</div>


<?php
include_once 'footer.php';

?>
<!--Reference free template snippet from https://colorlib.com/wp/free-html5-contact-form-templates/-->
<!-- Sweet repository https://t4t5.github.io/sweetalert/-->