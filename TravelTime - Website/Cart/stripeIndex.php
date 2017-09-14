<?php require_once('./config.php'); ?>

<div class="element-centered">
    <form action="charge.php" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?php echo $stripe['publishable_key']; ?>"
            data-amount="<?php echo (getSubtotal()*100);?>" data-description="One year's subscription"></script>
    </form>

</div>