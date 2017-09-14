<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/currency.php';

$currencyObj = new Currency();
if(isset($_POST['delConfirmCurrency'])){
    $currencyDetail=$currencyObj->currencyDetail($_POST['delConfirmId']);
}
elseif(isset($_POST['detailCurrency'])){
    $currencyDetail=$currencyObj->currencyDetail($_POST['detailId']);
}
elseif(isset($_POST['updateCurrency'])){
    $currencyDetail=$currencyObj->currencyDetail($_POST['admin__currency_id']);
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
                    <?php if(isset($_POST['delConfirmCurrency'])){?> <h3>Are you sure you want to delete this currency?</h3> <?php }

                    elseif(isset($_POST['updateCurrency'])){
                        if(!empty($currencyUpdated)){?> <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $currencyUpdated; ?> was updated.
                        </div>
                            <h3>Details</h3>
                            <?php
                        }
                    }

                    else{?>
                        <h3>Details</h3>
                    <?php }
                    ?>

                    <h4> <?php echo $currencyDetail[0]->name;?> </h4></div>
                <table class="table table-bordered table-hover table-sm">
                    <tr>
                        <td class="table-inverse">
                            Id
                        </td>

                        <td>
                            <?php echo $currencyDetail[0]->id;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Name
                        </td>

                        <td>
                            <?php echo $currencyDetail[0]->name;?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Abbreviation
                        </td>

                        <td>
                            <?php echo $currencyDetail[0]->abbr;?>
                        </td>
                    </tr>

                </table>

                <div class="col-sm-4"><a href="admin-currency.php"> <button type="button" class="btn btn-primary">Back to List</button></a>
                </div>
                <?php if(isset($_POST['delConfirmCurrency'])){?>
                    <div class="col-sm-4">
                        <form method='post' action='admin-currency.php'>
                            <input type='hidden' name='delId' value='<?php echo $currencyDetail[0]->id; ?>'>
                            <input type='submit' class="btn btn-danger" name='delCurrency' value='Delete' />
                        </form>
                    </div>
                <?php }?>

            </div>
        </div>
    </div>

    <!-- Footer-->
<?php include_once "footer.php"?>