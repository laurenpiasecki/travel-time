<?php session_start(); 
  include_once "header.php";
include_once("config.php");


 if(isset($_POST["get_alerts"]))  
 {  
      if(isset($_SESSION["price_alerts"]))  
      {  
           $item_array_id = array_column($_SESSION["price_alerts"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["price_alerts"]);  
                $item_array = array(  
                     'item_id'=>$_GET["id"],  
                     'item_name'=>$_POST["hidden_name"],  
                     'item_price'=>$_POST["hidden_price"],  
                     'item_quantity'=>$_POST["quantity"]  
                );  
                $_SESSION["price_alerts"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("You Already subscribed for alerts")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'=>$_GET["id"],  
                'item_name'=>$_POST["hidden_name"],  
                'item_price'=>$_POST["hidden_price"],  
                'item_quantity'=>$_POST["quantity"]  
           );  
           $_SESSION["price_alerts"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["price_alerts"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["price_alerts"][$keys]);  
                     echo '<script>alert("You Unsubscribed from the price alerts")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
<!DOCTYPE html>
<html>

<head>
    <title>Price Alerts - TraveTime</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Dancing+Script|Roboto:100,400,600" />
    <link rel="stylesheet" href="../styles/travelTime.css">
    <link rel="stylesheet" href="featureStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
         
      <body>  
          <!---MAIN IMAGE-->
        <div class="bg-overlay">
            <div class="container">
                <div class="row text-center">
                    <h2 class="tagLine">The<span class="decorativeText"> journey </span> is the <span class="decorativeText">destination.</span></h2> </div>
            </div>
        </div>
           <p>&nbsp;</p>  
           <div class="container">
               <p>&nbsp;</p>  
                <h2 align="center">Get Price Alerts on trips of your choice, select vacation packages!</h2>
                <?php  
                $query = "SELECT * FROM price_alerts ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">  
                               <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><p>&nbsp;</p>  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                               <p>&nbsp;</p>  
                               <input type="submit" name="get_alerts" style="margin-top:5px;" class="btn btn-success" value="Get Price Alerts" /> 
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <h3>You'll Get Price Alerts for:</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                                  <th width="40%">Package Name</th>  
                               <th width="20%">Number of People</th>  
                               <th width="20%">Package Price</th>  
                               <th width="10%">Unsubscribe</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["price_alerts"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["price_alerts"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  

                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                      
                          <?php  
                          }  
                          ?>  
                     </table>
                                <p>&nbsp;</p>  
                                <p>&nbsp;</p>  
                                <p>&nbsp;</p>  
                     <h3 align='center'>You'll be the first to know if the prices went down!</h3>  
                </div>  
           </div>  
           <p>&nbsp;</p>  
           <p>&nbsp;</p>  
           <p>&nbsp;</p>  
      </body>  
              <?php include_once "footer.php" ?>
 </html>
 
<!-- References for the code used -->
<!--http://www.coderglass.com/php/demo/shop/index.php?inserted=Your%20item%20successfuly%20added.-->
<!--https://www.youtube.com/watch?v=Bw2BmYYcrCY-->
<!--https://www.youtube.com/watch?v=0wYSviHeRbs-->
<!--https://www.youtube.com/watch?v=NLJUQKOMIJg-->