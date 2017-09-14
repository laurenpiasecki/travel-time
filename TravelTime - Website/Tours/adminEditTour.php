<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['filename']);
if(isset($_SESSION['adminName'])){
if(isset($_POST['editTour'])) {
    include_once "../header.php";
    require_once '../classes/DbConnect.php';
    require_once '../classes/Tours.php';
    $tourObj = new Tours();
    $tourDetail = $tourObj->tourDetail($_POST['editId']);
}
?>


<div class="container">
    <div class="row">
        <!--****SideBar Starts***********************-->
       <?php require_once '../adminSidebar.php';?>
        <!--****SideBar Ends***********************-->

        <div class="col-sm-9 col-md-10 admin_body">

<div class="element-centered"><h3>Edit <?php echo $tourDetail[0]->name; ?></h3></div>
          <?php  if(isset($errorImage)){?> <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> Tour not updated, all fields are required.
            </div>
            <?php
            }
            ?>
<form  method="post" action="updateTour.php"  enctype="multipart/form-data">

    <div class="col-sm-4">
        <div class="form-group hidden">
            <label for="admin__tour_id">Tour id</label>
            <input type="text" class="form-control" value="<?php echo $tourDetail[0]->id; ?>" name="admin__tour_id" placeholder="Enter tour id">
            </div>



    <div class="form-group">
        <label for="admin__tour_name">Tour name</label>
        <input type="text" class="form-control" value="<?php echo $tourDetail[0]->name; ?>" name="admin__tour_name" placeholder="Enter tour name">
        <?php if(isset($errorName)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorName;} ?></span>
    </div>
    </div>


    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_from">From</label>
        <input type="text" class="form-control" value="<?php echo $tourDetail[0]->from_place; ?>" name="admin__tour_from" placeholder="From">
        <?php if(isset($errorFrom)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorFrom;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_to">To</label>
        <input type="text" class="form-control" value="<?php echo $tourDetail[0]->location; ?>" name="admin__tour_to" placeholder="To">
        <?php if(isset($errorTo)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorTo;} ?></span>
    </div>
    </div>



    <div class="col-sm-4">
    <div class="form-group">
        <label  for="admin__tour_type">Tour Type</label>
        <input type="text" class="form-control" value="<?php echo $tourDetail[0]->type; ?>" name="admin__tour_type" placeholder="Enter tour type">
        <?php if(isset($errorType)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorType;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_start-date">Tour Start Date</label>
        <input type="date" class="form-control" value="<?php echo $tourDetail[0]->start_date; ?>" name="admin__tour_start-date" placeholder="Enter tour start date">
        <?php if(isset($errorStartDate)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorStartDate;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label  for="admin__tour_return-date">Tour Return Date</label>
        <input type="date" class="form-control" value="<?php echo $tourDetail[0]->return_date; ?>" name="admin__tour_return-date" placeholder="Enter tour return date">
        <?php if(isset($errorReturnDate)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorReturnDate;} ?></span>
    </div>
    </div>

    <div class="col-sm-12">
    <div class="form-group">
        <label for="admin__tour_desc">Tour Description</label>
        <textarea  name="admin__tour_desc" placeholder="Description" style="width : 100%;" rows="5"><?php echo $tourDetail[0]->description; ?></textarea>
        <?php if(isset($errorDesc)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorDesc;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_days">Number of days</label>
        <input type="number" class="form-control" value="<?php echo $tourDetail[0]->days; ?>" name="admin__tour_days" placeholder="Number of days">
        <?php if(isset($errorDays)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorDays;} ?></span>
    </div>


        <div class="form-group">
            <label for="admin__tour_price">Price</label>
            <input type="number" class="form-control" value="<?php echo $tourDetail[0]->price; ?>" name="admin__tour_price" placeholder="Price">
            <?php if(isset($errorPrice)){ ?>
            <span class="text-danger"><?php echo '<br/>'.$errorPrice;} ?></span>
        </div>
    </div>


    <div class="col-sm-3">
        <img class="editImage" src="../images/<?php echo $tourDetail[0]->image; ?> ">
    </div>

    <div class="col-sm-5">
       <div class="form-group">
            <label for="admin__tour_image">Image</label>
            <input type="file" class="form-control" value="<?php echo $tourDetail[0]->image; ?>" name="admin__tour_image" placeholder="image">
           <input type="text" class="form-control hidden" value="<?php echo $tourDetail[0]->image; ?>" name="admin__tour_oldImage">

           <?php if(isset($errorImage)){ ?>
           <span class="text-danger"><?php echo '<br/>'.$errorImage;} ?></span>
       </div>

        <div class="form-group">
            <label for="admin__tour_popular">Popular</label>
            <select class="form-control" name="admin__tour_popular">
                <option <?php
                        if ($tourDetail[0]->popular == 0) {

                        ?>
                            selected="true"
                        <?php }; ?>
                        value="0">No</option>
                <option <?php
                        if ($tourDetail[0]->popular == 1) {

                        ?>
                            selected="true"
                         <?php };
                        ?>

                        value="1">Yes</option>
            </select>

        </div>

    </div>

    <div class="col-sm-12 element-centered">
    <div class="form-group element-centered">
    <button type="submit" name="updateTour" class="btn btn-primary">Update Tour </button>
    </div>
    </div>


</form>
            <div class="col-sm-12 element-centered"><a href="adminTours.php"> <button type="button" class="btn btn-info">Back to List</button></a>
            </div>


        </div></div></div>

<?php require_once '../footer.php'; }

else{
    include_once "../header.php";
    echo "<div class='titleText alignedCenter noAccess'>Sorry! you dont have access to this page.</div>
<!--ROW SEPARATOR-->
<div>
    <img class=\"img-responsive\" src=\"../images/rowSeparator_Family.png\" alt=\"rowSeparator\" id=\"img__BlackRowSeparator\">
</div>";
    include_once "../footer.php";
}
?>