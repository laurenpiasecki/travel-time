<?php
include_once "header.php";
require_once 'classes/database.php';
require_once 'classes/currency.php';

$currencyObj = new Currency();

if(isset($_POST['delCurrency'])){
    $currencyDelete=$currencyObj->delCurrency($_POST['delId']);
}
$currencyList = $currencyObj->currencyList();

?>



    <div class="container">

        <div class="row">
            <!--****SideBar Starts***********************-->
            <?php require_once 'adminSidebar.php';?>
            <!--****SideBar Ends***********************-->


            <!--****Body Start***********************-->
            <!--***Tours And Create a Tour Tab***********************-->
            <div class="col-sm-9 col-md-10 admin_body">
                <?php if(!empty($currencyInserted)){?> <div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $currency_name; ?> was added.
                </div>
                    <?php
                }
                elseif(isset($errorImage)){?> <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Currency was not inserted. All fields are required.
                </div>
                    <?php
                }
                ?>
                <ul class="nav nav-pills">
                    <li class="admin__listCurrencyTab active"><a data-toggle="pill" href="#list">Currencies</a></li>
                    <li class="admin__createCurrencyTab pull-right"><a data-toggle="pill" href="#create">Add a New Currency</a></li>
                </ul>
            <br />

                <!--****Create A Tour**********************-->
                <div class="tab-content">
                    <div id="create" class="tab-pane fade">

                        <form  method="post" action="admin-currency-insert.php"  enctype="multipart/form-data">

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="admin__currency_name">Currency Name:</label>
                                    <input type="text" class="form-control" value="<?php if(isset($errorImage))
                                    { echo $_POST['admin__currency_name'];} ?>" name="admin__currency_name"
                                           placeholder="Enter currency name">
                                    <?php if(isset($errorName)){ ?>
                                    <span class="text-danger"><?php echo '<br/>'.$errorName;} ?></span>
                                </div>

                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="admin__currency_abbreviation">Currency Abbreviation:</label>
                                    <input type="text" class="form-control" value="<?php if(isset($errorImage))
                                    { echo $_POST['admin__currency_abbreviation']; }?>" name="admin__currency_abbreviation"
                                           placeholder="Enter currency abbreviation">
                                    <?php if(isset($errorDescription)){ ?>
                                    <span class="text-danger"><?php echo '<br/>'.$errorDescription;} ?></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group element-centered">
                                    <button type="submit" name="insertCurrency" class="btn btn-primary">Add Currency</button>
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
                                        <th>Currency ID</th>
                                        <th>Currency Name</th>
                                        <th>Currency Abbreviation</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i =1;
                                    $j= 1;
                                    foreach ($currencyList as $currency){ ?>
                                        <tr class="<?php echo $i ?> hideRow">
                                            <td><?php echo $currency->id;?></td>
                                            <td><?php echo $currency->name;?></td>
                                            <td><?php echo $currency->abbr;?></td>
                                            <td><form method='post' action='admin-currency-edit.php'>
                                                    <input type='hidden' name='editId' value='<?php echo $currency->id; ?>'>
                                                    <input type='submit' name='editCurrency' class="btn btn-primary" value='Edit' />
                                                </form>
                                            </td>
                                            <td><form method='post' action='admin-currency-details.php'>
                                                    <input type='hidden' name='delConfirmId' value='<?php echo $currency->id; ?>'>
                                                    <input type='submit' class="btn btn-danger" name='delConfirmCurrency' value='Delete' />
                                                </form>
                                            </td>
                                            <td><form method='post' action='admin-currency-details.php'>
                                                    <input type='hidden' name='detailId' value='<?php echo $currency->id; ?>'>
                                                    <input type='submit' class="btn btn-primary" name='detailCurrency' value='Details' />
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