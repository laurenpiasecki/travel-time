<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/currency.php';

if(isset($_POST['editCurrency'])) {
    $currencyObj = new Currency();
    $currencyDetail = $currencyObj->currencyDetail($_POST['editId']);
}
?>


    <div class="container">
        <div class="row">
            <!--****SideBar Starts***********************-->
            <?php require_once 'adminSidebar.php';?>
            <!--****SideBar Ends***********************-->

            <div class="col-sm-9 col-md-10 admin_body">

                <div class="element-centered"><h3>Edit <?php echo $currencyDetail[0]->name; ?></h3></div>
                <?php  if(isset($errorImage)){?> <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Currency was not updated. All fields are required.
                </div>
                    <?php
                }
                ?>
                <form  method="post" action="admin-currency-update.php"  enctype="multipart/form-data">

                    <div class="col-sm-4">
                        <div class="form-group hidden">
                            <label for="admin__currency_id">Currency ID</label>
                            <input type="text" class="form-control" value="<?php echo $currencyDetail[0]->id; ?>"
                                   name="admin__currency_id" placeholder="Enter currency id">
                        </div>



                        <div class="form-group">
                            <label for="admin__currency_name">Currency Name</label>
                            <input type="text" class="form-control" value="<?php echo $currencyDetail[0]->name; ?>"
                                   name="admin__currency_name" placeholder="Enter currency name">
                            <?php if(isset($errorName)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorName;} ?></span>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="admin__currency_abbreviation">Currency Abbreviation</label>
                            <input type="text" class="form-control" value="<?php echo $currencyDetail[0]->abbr; ?>"
                                   name="admin__currency_abbreviation" placeholder="Enter currency abbreviation">
                            <?php if(isset($errorAbbreviation)){ ?>
                            <span class="text-danger"><?php echo '<br/>'.$errorAbbreviation;} ?></span>
                        </div>
                    </div>

                    <div class="col-sm-12 element-centered">
                        <div class="form-group element-centered">
                            <button type="submit" name="updateCurrency" class="btn btn-primary">Update Currency</button>
                        </div>
                    </div>


                </form>
                <div class="col-sm-12 element-centered"><a href="admin-currency.php">
                        <button type="button" class="btn btn-info">Back to List</button></a>
                </div>


            </div></div></div>

<?php require_once 'footer.php'?>