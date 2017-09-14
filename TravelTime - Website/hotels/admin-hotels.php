<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/hotel.php';

$hotelObj = new Hotel();

if(isset($_POST['delHotel'])){
    $hotelDelete=$hotelObj->delHotel($_POST['delId']);
}
$hotelList = $hotelObj->hotelList();

?>



<div class="container">

    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once 'adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->
        <!--***HOTELS And Create a HOTEL Tab***********************-->
        <div class="col-sm-9 col-md-10 admin_body">
            <?php if(!empty($hotelInserted)){?> <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $hotel_name; ?> was added.
            </div>
                <?php
            }
            elseif(isset($errorImage)){?> <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Hotel was not inserted. All fields are required.
            </div>
                <?php
            }
            ?>
            <ul class="nav nav-pills">
                <li class="admin__listTourTab active"><a data-toggle="pill" href="#list">Hotels</a></li>
                <li class="admin__createTourTab pull-right"><a data-toggle="pill" href="#create">Add a New Hotel</a></li>

            </ul>
            <!--****Create A HOTEL**********************-->
            <div class="tab-content">
                <div id="create" class="tab-pane fade">

                    <form  method="post" action="admin-hotels-insert.php"  enctype="multipart/form-data">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="admin__hotel_name">Hotel Name:</label>
                                <input type="text" class="form-control" value="<?php if(isset($errorImage))
                                { echo $_POST['admin__hotel_name'];} ?>" name="admin__hotel_name"
                                       placeholder="Enter hotel name">
                                <?php if(isset($errorName)){ ?>
                                <span class="text-danger"><?php echo '<br/>'.$errorName;} ?></span>
                            </div>

                        </div>


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="admin__hotel_description">Hotel Description:</label>
                                <input type="text" class="form-control" value="<?php if(isset($errorImage))
                                { echo $_POST['admin__hotel_description']; }?>" name="admin__hotel_description"
                                       placeholder="Enter hotel description">
                                <?php if(isset($errorDescription)){ ?>
                                <span class="text-danger"><?php echo '<br/>'.$errorDescription;} ?></span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label  for="admin__hotel_price">Hotel Price:</label>
                                <input type="text" class="form-control" value="<?php if(isset($errorImage))
                                {echo $_POST['admin__hotel_price'];} ?>" name="admin__hotel_price"
                                       placeholder="Enter hotel price">
                                <?php if(isset($errorPrice)){ ?>
                                <span class="text-danger"><?php echo '<br/>'.$errorPrice;} ?></span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label  for="admin__hotel_link">Hotel Link:</label>
                                <input type="text" class="form-control" value="<?php if(isset($errorImage))
                                { echo $_POST['admin__hotel_link'];} ?>" name="admin__hotel_link"
                                       placeholder="Enter hotel link">
                                <?php if(isset($errorLink)){ ?>
                                <span class="text-danger"><?php echo '<br/>'.$errorLink;} ?></span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="sr-only" for="admin__hotel_image">Hotel Image:</label>
                                <input type="file" class="form-control" name="admin__hotel_image" placeholder="Image">
                                <?php if(isset($errorImage)){ ?>
                                <span class="text-danger"><?php echo '<br/>'.$errorImage;} ?></span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group element-centered">
                                <button type="submit" name="insertHotel" class="btn btn-primary">Add Hotel</button>
                            </div>
                        </div>


                    </form>
                </div>

                <!--LISTING HOTELS IN A TABLE-->
                <div id="list" class="tab-pane fade in active">
                    <div class="col-sm-12">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead class="thead-custom">
                                <tr>
                                    <th>Hotel ID</th>
                                    <th>Hotel Name</th>
                                    <th>Hotel Description</th>
                                    <th>Hotel Price</th>
                                    <th>Hotel Link</th>
                                    <th>Hotel Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Details</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i =1;
                                $j= 1;
                                foreach ($hotelList as $hotel){ ?>
                                    <tr class="<?php echo $i ?> hideRow">
                                        <td><?php echo $hotel->id;?></td>
                                        <td><?php echo $hotel->name;?></td>
                                        <td><?php echo $hotel->description;?></td>
                                        <td><?php echo $hotel->price;?></td>
                                        <td><?php echo $hotel->link;?></td>
                                        <td><?php echo $hotel->image;?></td>
                                        <td><form method='post' action='admin-hotels-edit.php'>
                                                <input type='hidden' name='editId' value='<?php echo $hotel->id; ?>'>
                                                <input type='submit' name='editHotel' class="btn btn-primary" value='Edit' />
                                            </form>
                                        </td>
                                        <td><form method='post' action='admin-hotels-details.php'>
                                                <input type='hidden' name='delConfirmId' value='<?php echo $hotel->id; ?>'>
                                                <input type='submit' class="btn btn-danger" name='delConfirmHotel' value='Delete' />
                                            </form>
                                        </td>
                                        <td><form method='post' action='admin-hotels-details.php'>
                                                <input type='hidden' name='detailId' value='<?php echo $hotel->id; ?>'>
                                                <input type='submit' class="btn btn-primary" name='detailHotel' value='Details' />
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
<?php include_once "footer.php"?>