<?php require_once 'indexHeader.php';
?>
<div class="container">

    <div class="verticallyCentered">
        <div class="row alignedCenter">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="loginBox">
                    <h3 class="titleText">Admin</h3>
                    <p class="titleLine">Travel Time</p>
                    <form  method="post" action="Tours/adminTours.php">

                        <div class="form-group">
                            <label class="sr-only" for="form__name">Username</label>
                            <input type="text" class="form-control" name="form__name" placeholder="Enter your Username">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="form__password">Password</label>
                            <input type="password" class="form-control" name="form__password" placeholder="Enter your Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Log in</button>
                        <?php if(isset($errorMsg)){ ?>
                        <span class="text-danger"><?php echo '<br/>'.$errorMsg;} ?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--ROW SEPARATOR-->
<div>
    <img class="img-responsive" src="images/rowSeparator_Family.png" alt="rowSeparator" id="img__BlackRowSeparator">
</div>

<?php require_once 'indexFooter.php';?>
</body>
</html>