<?php
include('header.php');
require_once 'classes/database.php';
require_once 'classes/currency.php';
$db = Database::getDB();
$currency = new Currency($db);
$row = $currency->getCurrency();
?>
<img width="100%" class="img" src="images/currency/money.jpg" />
<title>Currency Converter</title>
<script type="text/javascript" src="script/validation.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
<h3 style="font-size:36px;background:rgba(185,164,123,0.68);margin-top:29px;padding:0.35em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Currency Converter</h3>
<br />
<br />
<br />
<div class="main" style="margin-left:100px;margin-top: 30px;margin-bottom: 30px;">
    <form method="post" id="currency-form">
        <div class="form-group">
        <label for="currency" style="font-size: 22px;">&nbsp;From:&nbsp;</label>
        <select name="from_currency" style="min-width: 160px;font-size: 16px;
                    background-color: #f1f1f1;padding:0.25em;margin-top: 5px;">
            <?php
            foreach ($row as $cur) :
                ?>
                <option value="<?php echo $cur["abbr"]; ?>">
                    <?php echo $cur["name"]; ?>
                </option>
                <?php
            endforeach;
            ?>
        </select>
        &nbsp;<label for="amount" style="font-size: 22px;">&nbsp;Amount:&nbsp;</label>
        <input type="text" placeholder="Enter Amount" name="amount" id="amount" />
        <label for="currency" style="font-size: 22px;">&nbsp;To:&nbsp;</label>
        <select name="to_currency" style="min-width: 160px;font-size: 16px;
                    background-color: #f1f1f1;padding:0.25em;margin-top: 5px;">
            <?php
            foreach ($row as $cur) :
                ?>
                <option value="<?php echo $cur["abbr"]; ?>">
                    <?php echo $cur["name"]; ?>
                </option>
                <?php
            endforeach;
            ?>
        </select>&nbsp;
        &nbsp;&nbsp;<button type="submit" value="1" name="convert" id="convert" class="btn btn-default"
                            style="padding: 5px 25px;cursor: pointer;
             text-align: center;color: #fff;background-color: #337ab7; border-radius: 5px;">Convert</button>
    </div>
</form>
    <br />
    <br />

<div class="form-group" id="converted_rate" style="font-size: 20px;margin-left:150px;"></div>
<div id="converted_amount" style="font-size: 20px;margin-left:150px;">

</div>
</div>
<br />
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php include('footer.php');?>
</body>