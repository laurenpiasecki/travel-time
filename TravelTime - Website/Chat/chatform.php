<?php session_start(); if(isset($_SESSION['adminName'])){ ?>

        <div class="msgForm">
    <div class="container">
        <form class="form-inline" method="post" action="message.php">
            <div class="form-group">
                <label class="sr-only" for="form__msg">Message</label>
                <input type="text" class="form-control form__msgBox" name="form__msg" placeholder="Enter your Messsage">
            </div>

            <button type="submit" name="sendMsg"  class="btn btn-primary">Send</button>

        </form>
    </div>

</div>
<?php }
?>