<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/16/2017
 * Time: 8:39 PM
 */
include_once '../../header.php';
include_once "../Model/Connect.php";
include_once "../Model/Feedback.php";
include_once "../controller/feedbackcrud.php";
include_once('errorhandle.php');
//object for database
$dba = new Connect();
$conn = $dba->connectDb();

// crud obj
$obj1 = new feedbackcrud();
$result = $obj1->retrieveresult($conn);
//echo $result;
echo"
    <div class=\" text-center\">
    <h4>Admin Interface for Feedback</h4>
    </div>";

if(isset($_POST['delete'])){

    $id=$_POST['id'];
    $resdel = $obj1->delete($conn,$id);
    if($resdel){
        echo "record deleted succesfully";
//        sleep(5);
       header("Location: Admin.php");
    }else{echo"operation failed";}

}

?>


<div class="container"><br><br>
    <div class="row">

            <?php include_once '../../adminSidebar.php'?>
            <div class="col-sm-10 col-md-10">

                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <!--        <th>Phone</th>-->
                        <th>Title</th>
                        <!--      <th>Message</th> -->
                        <th>Reply</th>
                        <th>Delete</th>
                        <th>Reply</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <!--        <th>Phone</th>-->
                        <th>Title</th>
                        <!--   <th>Message</th> -->
                        <th>Reply</th>
                        <th>Delete</th>
                        <th>Reply</th>
                        <th>Details</th>

                    </tr>
                    </tfoot>
                    <tbody>


                    <?php

                    foreach($result as $item => $value)
                    {
                        ?>
                        <tr>

                            <td> <?php echo $value['date']?> </td>
                            <td><?php echo $value['firstname']?></td>
                            <td><?php echo $value['lastname']?></td>
                            <td><?php echo $value['email']?></td>
                            <!--            <td>--><?php //echo $value['phone']?><!--</td>-->
                            <td><?php echo $value['title']?></td>
                            <!--            <td>--><?php //echo $value['message']?><!--</td>-->
                            <td><?php echo $value['reply']?></td>


                            <td>
                                <form action='' method='post'>
                                    <input type="hidden" value="<?php echo $value['id']; ?>"  name="id">
                                    <input type="submit" class="btn btn-danger" value="Delete" name="delete">
                                </form>

                            </td>
                            <td>
                                <form action='edit.php' method='post'>
                                    <input type="hidden" value="<?php echo $value['id']; ?>" name="id">
                                    <input type="submit" class="btn btn-info" value="Reply" id='edit' name="edit">
                                </form>


                            </td>

                            <td>
                                <form action='details.php' method='post'>
                                    <input type="hidden" value="<?php echo $value['id']; ?>" name="id">
                                    <input type="submit" class="btn btn-success" value="Details"  name="details">
                                </form>


                            </td>

                        </tr>
                    <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>

    </div>





<script>

    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>