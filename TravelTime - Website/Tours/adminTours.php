<?php session_start(); unset($_SESSION['username']); unset($_SESSION['filename']);
/* Header */
include_once "../header.php";
if(isset($_POST['login'])){
    $adminName= $_POST['form__name'];
    $password = $_POST['form__password'];

    if($adminName == 'TourAdMin' && $password == '789321'){

$_SESSION['adminName'] = $_POST['form__name'];}}

if(isset($_SESSION['adminName'])){

require_once '../classes/DbConnect.php';
require_once '../classes/Tours.php';





$tourObj = new Tours();

if(isset($_POST['delTour'])){
    $tourDelete=$tourObj->delTour($_POST['delId']);
}
$tourList = $tourObj->tourList();

?>



<div class="container">

<div class="row">
    <!--****SideBar Starts***********************-->
   <?php require_once '../adminSidebar.php';?>
    <!--****SideBar Ends***********************-->


    <!--****Body Start***********************-->
                 <!--***Tours And Create a Tour Tab***********************-->
    <div class="col-sm-9 col-md-10 admin_body">
      <?php if(!empty($tourInserted)){?> <div class="alert alert-success alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> <?php echo $tour_name; ?> tour inserted
        </div>
      <?php
      }
      elseif(isset($errorImage)){?> <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Failed!</strong> Tour not inserted, all fields are required.
      </div>
          <?php
      }
        ?>
        <ul class="nav nav-pills">
            <li class="admin__listTourTab active"><a data-toggle="pill" href="#list">Tours</a></li>
            <li class="admin__createTourTab pull-right"><a data-toggle="pill" href="#create">Create a new Tour</a></li>

        </ul>

            <!--****Create A Tour**********************-->
        <div class="tab-content">
            <div id="create" class="tab-pane fade">

<form  method="post" action="insertTours.php"  enctype="multipart/form-data">

    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_name">Tour name</label>
        <input type="text" class="form-control" value="<?php if(isset($errorImage)){ echo $_POST['admin__tour_name'];} ?>" name="admin__tour_name" placeholder="Enter tour name">
        <?php if(isset($errorName)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorName;} ?></span>
    </div>

    </div>


    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_from">From</label>
        <input type="text" class="form-control" value="<?php if(isset($errorImage)){ echo $_POST['admin__tour_from']; }?>" name="admin__tour_from" placeholder="From">
        <?php if(isset($errorFrom)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorFrom;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label  for="admin__tour_to">To</label>
        <input type="text" class="form-control" value="<?php if(isset($errorImage)){echo $_POST['admin__tour_to'];} ?>" name="admin__tour_to" placeholder="To">
        <?php if(isset($errorTo)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorTo;} ?></span>
    </div>
    </div>



    <div class="col-sm-4">
    <div class="form-group">
        <label  for="admin__tour_type">Tour Type</label>
        <input type="text" class="form-control" value="<?php if(isset($errorImage)){ echo $_POST['admin__tour_type'];} ?>" name="admin__tour_type" placeholder="Enter tour type">
        <?php if(isset($errorType)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorType;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label for="admin__tour_start-date">Tour Start Date</label>
        <input type="date" class="form-control" value="<?php if(isset($errorImage)){ echo $_POST['admin__tour_start-date']; }?>" name="admin__tour_start-date" placeholder="Enter tour start date">
        <?php if(isset($errorStartDate)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorStartDate;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label  for="admin__tour_return-date">Tour Return Date</label>
        <input type="date" class="form-control" value="<?php if(isset($errorImage)){ echo $_POST['admin__tour_return-date'];} ?>" name="admin__tour_return-date" placeholder="Enter tour return date">
        <?php if(isset($errorReturnDate)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorReturnDate;} ?></span>
    </div>
    </div>

    <div class="col-sm-12">
    <div class="form-group">
        <label class="sr-only" for="admin__tour_desc">Tour Description</label>
        <textarea  name="admin__tour_desc"  placeholder="Description" style="width : 100%;" rows="5"><?php if(isset($errorImage)){ echo $_POST['admin__tour_desc']; }?></textarea>
        <?php if(isset($errorDesc)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorDesc;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label class="sr-only" for="admin__tour_days">Number of days</label>
        <input type="number" class="form-control" value="<?php if(isset($errorImage)){echo $_POST['admin__tour_days'];} ?>" name="admin__tour_days" placeholder="Number of days">
        <?php if(isset($errorDays)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorDays;} ?></span>
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group">
        <label class="sr-only" for="admin__tour_price">Price</label>
        <input type="number" class="form-control" value="<?php if(isset($errorImage)){ echo $_POST['admin__tour_price']; }?>" name="admin__tour_price" placeholder="Price">
        <?php if(isset($errorPrice)){ ?>
        <span class="text-danger"><?php echo '<br/>'.$errorPrice;} ?></span>
    </div>
    </div>


    <div class="col-sm-4">
        <div class="form-group">
            <label class="sr-only" for="admin__tour_image">Image</label>
            <input type="file" class="form-control" name="admin__tour_image" placeholder="image">
            <?php if(isset($errorImage)){ ?>
            <span class="text-danger"><?php echo '<br/>'.$errorImage;} ?></span>
        </div>
    </div>

    <div class="col-sm-12">
    <div class="form-group element-centered">
    <button type="submit" name="insertTour" class="btn btn-primary">Add Tour </button>
    </div>
    </div>


</form>
            </div>

        <!--LISTING TOURS IN A TABLE-->
            <div id="list" class="tab-pane fade in active">
        <div class="col-sm-12">
        <div class="table-responsive table-hover">
            <table class="table">
                <thead class="thead-custom">
                <tr>
                    <th>Tour Id</th>
                    <th>Tour Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Start Date</th>
                    <th>Return Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i =1;
                $j= 1;
                foreach ($tourList as $tour){ ?>
                    <tr class="<?php echo $i ?> hideRow">
                        <td><?php echo $tour->id;?></td>
                        <td><?php echo $tour->name;?></td>
                        <td><?php echo $tour->from_place;?></td>
                        <td><?php echo $tour->location;?></td>
                        <td><?php echo $tour->start_date;?></td>
                        <td><?php echo $tour->return_date;?></td>
                        <td><form method='post' action='adminEditTour.php'>
                                <input type='hidden' name='editId' value='<?php echo $tour->id; ?>'>
                            <input type='submit' name='editTour' class="btn btn-primary" value='Edit' />
                            </form>
                        </td>
                        <td><form method='post' action='adminTourDetail.php'>
                                <input type='hidden' name='delConfirmId' value='<?php echo $tour->id; ?>'>
                            <input type='submit' class="btn btn-danger" name='delConfirmTour' value='Delete' />
                            </form>
                        </td>
                        <td><form method='post' action='adminTourDetail.php'>
                                <input type='hidden' name='detailId' value='<?php echo $tour->id; ?>'>
                                <input type='submit' class="btn btn-primary" name='detailTour' value='Details' />
                            </form>
                        </td>
                    </tr>
                    <?php
                    $j++;
                    if($j==($i * 10)){
                        $i++;
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
        </div>

            <ul class="pagination">
                <?php
                $pageNumber= 1;
                while($pageNumber <= $i){
                    echo '<li><a href="" class="linkPages">'. $pageNumber .'</a></li>';
                    $pageNumber++;
                }
                ?>
            </ul>

            </div>
</div>

</div>
</div><!--END Row-->

</div><!--END CONTAINER-->

<!--Javascript for Pagination-->
<script>
     $('.hideRow').hide();
        $('.1').show();
        $('.linkPages').click(function (e) {
            e.preventDefault();
            $('.hideRow').hide();
            var x = this.innerHTML;
            $("." + x).show();

        });

</script>







<!-- Footer-->
<?php


}
else{
    echo "<div class='titleText alignedCenter noAccess'>Sorry! you dont have access to this page.</div>
<!--ROW SEPARATOR-->
<div>
    <img class=\"img-responsive\" src=\"../images/rowSeparator_Family.png\" alt=\"rowSeparator\" id=\"img__BlackRowSeparator\">
</div>";
}



include_once "../footer.php"?>

