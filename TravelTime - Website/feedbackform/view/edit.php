<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/10/2017
 * Time: 5:55 PM
 */
include_once '../../header.php';
include_once "../Model/Connect.php";
include_once "../Model/Feedback.php";
include_once "../controller/feedbackcrud.php";
include_once('errorhandle.php');

$dba = new Connect();
$conn = $dba->connectDb();

// model obj
//$mobj = new Feedback();

// crud obj
$obj1 = new feedbackcrud();
if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $resid = $obj1->retrieveresultid($conn,$id);


    foreach($resid as $item1 => $value1){
        echo"<div class=\"container\" id='editlist'><br><br><br><br>
                    <div class='row'>  
                            <div class='col-md-6'>
                                    <form action='' method='post' class=\"form-inline\">
                                         <div class='col-sm-12'>
                                               <label class='col-sm-2'>Date:</label>
                                                <p> "  .  $value1['date'] . " </p>
                                         </div>

                                         <input type='hidden' name='admin__edit-id' value='" . $value1['id'] . "' />
                                             
                                          <div class='col-sm-12 form-group'>
                                                 <label class='col-sm-2'>Firstname:</label>
                                                <p> "  .  $value1['firstname'] . " </p>
                   
                                          </div>
    
                                          <div class='col-sm-12 form-group'>
                                                  <label class='col-sm-2'>Lastname:</label>
                                              <p> "  .  $value1['lastname'] . " </p>
                   
                                          </div>
                                          
                                          <div class='col-sm-12 form-group'>
                                              <label class='col-sm-2'>Email:</label>
                                              <p> "  .  $value1['email'] . " </p>
                                           </div>
        
                                          <div class='col-sm-12'>
                                              <label class='col-sm-2'>Phone:</label>
                                            <p> "  .  $value1['phone'] . " </p>
                                          
                                          </div>
                                          
                                          <div class='col-sm-12'>
                                              <label class='col-sm-2'>Title:</label>
                                            <p> "  .  $value1['title'] . " </p>
                                    
                                           </div>
                                           
                                           <div class='col-sm-12'>
                                               <label class='col-sm-2'>Message:</label>
                                            <p> "  .  $value1['message'] . " </p>
                                 
                                           </div>
                                    </form>
                            </div>
                       
                           <div class='col-md-6'>
                                <form action='PHPMailer/examples/gmail.php' method='post' class='form-inline'>
                                     <div class='col-sm-12 form-group'>
                                        <label class='col-sm-2'>Subject</label>
                                            <input type='text' class=\"form-control\" required name='reply-subject' value=''  />
                                      </div>
                                      
                                     <div class='col-sm-12 form-group'>
                                        <label class='col-sm-2'>Message</label>
                                            <input type='text' class=\"form-control\" required name='reply-message' value=''  />
                                     </div>
                                
                                                <input type='hidden'  class=\"form-control\"  name='admin__edit-email' value='" . $value1['email'] . "'/>
                                                <input type='hidden' class=\"form-control\"   name='admin__edit-firstname' value='" . $value1['firstname'] . "'  />
                                                <input type='hidden'  required class=\"form-control\"  name='admin__edit-lastname' value='" . $value1['lastname'] . "'/>
                                                <input type='hidden'  required class=\"form-control\"  name='id' value='" . $value1['id'] . "'/>
                                                  
                                                <input type='hidden'  class=\"form-control\"  name='reply-status' value='done'  />
                                        <div class='col-sm-2'><input type='submit' class=\"btn btn-success\" name='email-submit' id='send-email'  value='Send Email' /></div>        
                                
                                </form>
                          
                           
                           </div>                    
                    </div>
              <a href='Admin.php' >Go Back</a>
         </div><br/><br/><br><br><br><br> ";
    }
    //echo " updated " . $row;
    //
}else{header("Location: Admin.php");}

//isset to update edit
if(isset($_POST['admin__edit-submit'])){
    $date = $_POST['admin__edit-date'];
    $fname = $_POST['admin__edit-firstname'];
//    echo $_POST['userfeedback__firstname'];;
    $lname = $_POST['admin__edit-lastname'];
    $email = $_POST['admin__edit-email'];
    $phone = $_POST['admin__edit-phone'];
    $title = $_POST['admin__edit-title'];
    $message = $_POST['admin__edit-message'];
    $id=$_POST['admin__edit-id'];
    $mobj=new Feedback();
    $mobj->setDate($date);
    $mobj->setFirstname($fname);
    $mobj->setLastname($lname);
    $mobj->setTitle($title);
    $mobj->setEmail($email);
    $mobj->setPhone($phone);
    $mobj->setMessage($message);
    $obj1->edit($conn,$mobj,$id);
    echo"Update Successful";
    header("Location: Admin.php");

}

include_once 'footer.php';