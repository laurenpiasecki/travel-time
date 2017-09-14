<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/6/2017
 * Time: 7:58 PM
 */
require_once ('../Model/Connect.php');
require_once ('../Model/Bookacar.php');
require_once ('../controller/Bookacarcrud.php');
require_once '../../header.php';

require_once('errorhandle.php');

$db = new Connect();// database obj
$conn = $db->connectDb();

$cobj = new Bookacarcrud();

$result = $cobj->selectall($conn);
//var_dump($result);

?>
<div class="container"><br>
    <div class="row">
    <?php include_once '../../adminSidebar.php'?>
    <div>
<div class="col-sm-10 col-md-10"><br><br><br>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Car Name</th>
<!--            <th>Car Description</th>-->
<!--            <th>PickUp Location</th>-->
<!--            <th>Dropoff Location</th>-->
            <th>Pickup Date/Time</th>
            <th>Dropoff Date/Time</th>
<!--            <th>Delete</th>-->
<!--            <th>Details</th>-->

        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Car Name</th>
<!--            <th>Car Description</th>-->
<!--            <th>PickUp Location</th>-->
<!--            <th>Dropoff Location</th>-->
            <th>Pickup Date/Time</th>
            <th>Dropoff Date/Time</th>
<!--            <th>Delete</th>-->
<!--            <th>Details</th>-->

        </tr>
        </tfoot>
        <tbody>


<?php

foreach ($result as $item) {
?>
        <tr>

            <td> <?php echo $item->Name;?> </td>
            <td><?php echo $item->Email;?></td>
            <td><?php echo $item->Phone;?></td>
            <td><?php echo $item->name;?></td>
<!--            <td>--><?php //echo $item->description;?><!--</td>-->
<!--            <td>--><?php //echo $item->pickup_loc;?><!--</td>-->
<!--            <td>--><?php //echo $item->dropoff_loc;?><!--</td>-->
            <td><?php echo $item->pickup_datetime;?></td>
            <td><?php echo $item->dropoff_datetime;?></td>


         </tr>
<?php } ?>

        </tbody>
    </table>
    </div></div>
</div>
</div>
<script>

    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>







