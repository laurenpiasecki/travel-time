<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/hotel.php';

if(isset($_POST['editHotel'])) {
    $hotelObj = new Hotel();
    $hotelDetail = $hotelObj->hotelDetail($_POST['editId']);
}
?>


    <div class="container">
        <div class="row">
            <!--****SideBar Starts***********************-->
            <?php require_once 'adminSidebar.php';?>
            <!--****SideBar Ends***********************-->

            <div class="col-sm-9 col-md-10 admin_body">

                <div class="element-centered"><h3>Edit</h3></div>
                <?php  if(isset($errorImage)){?> <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Hotel was not updated. All fields are required.
                </div>
                    <?php
                }
                ?>
                <form  method="post" action="admin-hotels-update.php"  enctype="multipart/form-data">

                    <div class="col-sm-4">
                        <div class="form-group hidden">
                            <label for="admin__hotel_id">Hotel ID</label>
                            <input type="text" class="form-control" value="<?php echo $hotelDetail[0]->id; ?>"
                                   name="admin__hotel_id" placeholder="Enter hotel id">
                        </div>



                        <div class="form-group">
                            <label for="admin__hotel_name">Hotel name</label>
                            <input type="text" class="form-control" value="<?php echo $hotelDetail[0]->name; ?>"
                                   name="admin__hotel_name" placeholder="Enter hotel name">
                            <?php if(isset($errorName)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorName;} ?></span>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="admin__hotel_description">Hotel Description</label>
                            <input type="text" class="form-control" value="<?php echo $hotelDetail[0]->description; ?>"
                                   name="admin__hotel_description" placeholder="Enter hotel description">
                            <?php if(isset($errorDescription)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorDescription;} ?></span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="admin__hotel_price">Hotel Price</label>
                            <input type="text" class="form-control" value="<?php echo $hotelDetail[0]->price; ?>"
                                   name="admin__hotel_price" placeholder="Enter hotel price">
                            <?php if(isset($errorPrice)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorPrice;} ?></span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label  for="admin__hotel_link">Hotel Link</label>
                            <input type="text" class="form-control" value="<?php echo $hotelDetail[0]->link; ?>"
                                   name="admin__hotel_link" placeholder="Enter hotel link">
                            <?php if(isset($errorLink)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorLink;} ?></span>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="admin__hotel_image">Hotel Image</label>
                            <input type="file" class="form-control" value="<?php echo $hotelDetail[0]->image; ?>"
                                   name="admin__hotel_image" placeholder="image">
                            <input type="file" class="form-control hidden" value="<?php echo $hotelDetail[0]->image; ?>"
                                   name="admin__hotel_oldImage">

                            <?php if(isset($errorImage)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorImage;} ?></span>
                        </div>
                    </div>

                    <div class="col-sm-12 element-centered">
                        <div class="form-group element-centered">
                            <button type="submit" name="updateHotel" class="btn btn-primary">Update Hotel</button>
                        </div>
                    </div>


                </form>
                <div class="col-sm-12 element-centered"><a href="admin-hotels.php">
                        <button type="button" class="btn btn-info">Back to List</button></a>
                </div>


            </div></div></div>

<?php require_once 'footer.php'?>