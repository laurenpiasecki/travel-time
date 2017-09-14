<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/11/2017
 * Time: 3:18 PM
 */
if(isset($_POST['details'])) {
    include_once '../../header.php';
    include_once "../Model/Connect.php";
    include_once "../Model/Feedback.php";
    include_once "../controller/feedbackcrud.php";
    include_once('errorhandle.php');
//object for database
    $dba = new Connect();
    $conn = $dba->connectDb();

// model obj
//$mobj = new Feedback();

    $id = $_POST['id'];
// crud obj
    $obj1 = new feedbackcrud();
    $result = $obj1->retrieveresultid($conn, $id);


    foreach ($result as $item1 => $value1) {
    echo "<div class=\"container\" id='editlist'><br><br><br><br>
                <div class='row'>  
                     <form action='' method='post' class=\"form-inline\">
                            <div class='col-sm-12'>
                                <label class='col-sm-2'>Date:</label>
                                            <p> "  .  $value1['date'] . " </p>
                   
                            </div>";
                            echo "<input type='hidden' name='admin__edit-id' value='" . $value1['id'] . "' />";
                        echo "    
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
                        <!--<div class='col-sm-12'>    <input type='hidden' class=\"btn btn-success\" name='admin__edit-submit' id='update'  value='Update' /></div>-->
                            
                            <div class='col-sm-12'>
                                <label class='col-sm-2'>Reply:</label>
                            <p> "  .  $value1['reply'] . " </p>
                   
                            </div>
                            
                            <div class='col-sm-12'>
                                <label class='col-sm-2'>Reply Subject:</label>
                            <p> "  .  $value1['replysubject'] . " </p>
                          
                            </div>
                            
                            <div class='col-sm-12'>
                                <label class='col-sm-2'>Reply Message:</label>
                            <p> "  .  $value1['replymessage'] . " </p>
                            
                            </div>
                        
                            <a href='Admin.php' >Go Back</a>
                     </form>
                </div>
        </div>
   ";
    }
}else{
    Header('Location:Admin.php');

}