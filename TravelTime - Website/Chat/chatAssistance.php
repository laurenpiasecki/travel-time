<?php require_once '../header.php';
session_start();
unset($_SESSION['username']);
unset($_SESSION['filename']);
?>
<div class="container">

        <div class="row alignedCenter">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="loginBox">
                    <h3 class="titleText">Trip Advisor</h3>
                    <p class="titleLine">Happy to help.</p>
                    <form class="form-inline" method="post" action="message.php">
                        <div class="form-group">
                            <label class="sr-only" for="form__name">Your Name</label>
                            <input type="text" class="form-control" name="form__name" placeholder="Enter your Name">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Start chat</button>
                        <?php if(isset($errorMsg)){ ?>
                        <span class="text-danger"><?php echo '<br/>'.$errorMsg;} ?></span>
                    </form>
                </div>
            </div>
        </div>
    </div>

<div >
    <img class="img-responsive" src="../images/rowSeparator_Family.png" alt="rowSeparator" id="img__BlackRowSeparator">
</div>
<?php require_once '../footer.php';?>
