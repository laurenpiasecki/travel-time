<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/hotel.php';

$hotelObj = new Hotel();
if(isset($_POST['delConfirmHotel'])){
    $hotelDetail=$hotelObj->hotelDetail($_POST['delConfirmId']);
}
elseif(isset($_POST['detailHotel'])){
    $hotelDetail=$hotelObj->hotelDetail($_POST['detailId']);
}
elseif(isset($_POST['updateHotel'])){
    $hotelDetail=$hotelObj->hotelDetail($_POST['admin__hotel_id']);
}

?>
<div class="container">

    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once 'adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->
        <!--***Tours And Create a Tour Tab***********************-->
        <div class="col-sm-9 col-md-10 admin_body">
            <div class="col-sm-6">
                <?php if(isset($_POST['delConfirmHotel'])){?> <h3>Are you sure you want to delete this hotel?</h3> <?php }

                elseif(isset($_POST['updateHotel'])){
                    if(!empty($hotelUpdated)){?> <div class="alert alert-success alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $hotelUpdated; ?> was updated.
                    </div>
                        <h3>Details</h3>
                        <?php
                    }
                }

                else{?>
                    <h3>Details</h3>
                <?php }
                ?>

          <h4> <?php echo $hotelDetail[0]->name;?> </h4></div>
            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <td class="table-inverse">
                        Id
                    </td>

                    <td>
                        <?php echo $hotelDetail[0]->id;?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Name
                    </td>

                    <td>
                        <?php echo $hotelDetail[0]->name;?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Description
                    </td>

                    <td>
                        <?php echo $hotelDetail[0]->description;?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Price
                    </td>

                    <td>
                        <?php echo $hotelDetail[0]->price;?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Link
                    </td>

                    <td>
                        <?php echo $hotelDetail[0]->link;?>
                    </td>
                </tr>

                <tr>
                    <td>
                        Image
                    </td>

                    <td>
                        <?php echo $hotelDetail[0]->image;?>
                    </td>
                </tr>

            </table>

            <div class="col-sm-4"><a href="admin-hotels.php"> <button type="button" class="btn btn-primary">Back to List</button></a>
            </div>
            <?php if(isset($_POST['delConfirmHotel'])){?>
                <div class="col-sm-4">
                    <form method='post' action='admin-hotels.php'>
                        <input type='hidden' name='delId' value='<?php echo $hotelDetail[0]->id; ?>'>
                        <input type='submit' class="btn btn-danger" name='delHotel' value='Delete' />
                    </form>
                </div>
            <?php }?>

        </div>
    </div>
</div>

<!-- Footer-->
<?php include_once "footer.php"?>