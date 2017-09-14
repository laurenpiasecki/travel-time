<?php

/*if(isset($_POST['tourSearch'])) {*/

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ;



    echo '<div class="container">';
if(!empty(test_input($_GET['tour__name']))){
    $tourName = test_input($_GET['tour__name']);
    $tourName = '%' . $tourName . '%';}

   $startPlace = $_GET['tour__startPlace'];
    $destination =  $_GET['tour__destination'];
            $type = $_GET['tour__type'];
       $startDate = $_GET['tour__startDate'];
      $returnDate = $_GET['tour__returnDate'];


    require_once 'classes/DbConnect.php';
    require_once 'classes/Tours.php';


    $search = new Tours();
    if(!isset($tourName)){

        $results = $search->getToursWithoutName($startPlace, $destination, $type, $startDate, $returnDate);
    }
    else {
        $results = $search->getTours($tourName, $startPlace, $destination, $type, $startDate, $returnDate);
    }


   /* foreach ($results as $result) {
        echo "<div><img src='images/" . $result->image . "' width='50%' height='auto'> </div>
                    <p> Name: " . $result->name . "<br/> 
From: " . $result->from_place . "<br/>
To: " . $result->location . "<br/>
Tour Type: " . $result->type . "<br/>
Start date: " . $result->start_date . "<br/>
 Return date: " . $result->return_date . "  <br/> 
 Number of Days: " . $result->days . "<br/>
Price: " . $result->price . "<br/>
 Tour description: " . $result->description . $result->id . "</p>
        <form method='post' action='tourCart.php'>
                                <input type='hidden' name='tourId' value='" .$result->id ."'>
                                <input type='submit' class='btn btn-primary' name='addToCart' value='Add to cart' />
                            </form>";

    }
    echo '</div>';
    ?>


    <?php
/*
}*/
?>

<div class="row">
    <div class="col-md-12">
        <h2 class=" alignedCenter titleText">Search results</h2>
        <p class="titleLine alignedCenter">We found <?php echo count($results);?> tours for you.</p>

        <button type="button" id="myBtn" class="btn btn-primary" id="myBtn"> <span class="glyphicon glyphicon glyphicon-chevron-left"></span> Previous Tour</button>
        <button type="button" id="myBtn2" class="btn btn-primary pull-right " id="myBtn">Next Tour <span class="glyphicon glyphicon glyphicon-chevron-right"></span></button>

        <div class="carousel slide" data-ride="carousel" id="quote-carousel">


            <script>

                  //for buttons to slide search results

                    // Go to the previous item
                    $("#myBtn").click(function(){
                        $("#quote-carousel").carousel("prev");
                    });

                    // Go to the next item
                    $("#myBtn2").click(function(){
                        $("#quote-carousel").carousel("next");
                    });
            </script>

                    <!-- Carousel Slides / Quotes -->
            <div class="carousel-inner">




                <!-- Quote-->
                <?php
                $i = 0;
                foreach ($results as $result) {
                if($i < 1){ echo "<div class='item active'>"; }
                else{
                    echo "<div class='item'>";
                } ?>


                <div class="row">
                    <div class="col-sm-6">

 <?php
             echo "<ul class='list-group' style='text-align: left;'>  <li class='list-group-item list-group-item-info'> <h3 class='titleText'>" . $result->name . "</h3></li> 
              <li class='list-group-item'>From: " . $result->from_place . "</li>
             <li class='list-group-item'> To: " . $result->location . "</li>
             <li class='list-group-item'> Tour Type: " . $result->type . "</li>
             <li class='list-group-item'> Start date: " . $result->start_date . "</li>
             <li class='list-group-item'>  Return date: " . $result->return_date . "  </li>
              <li class='list-group-item'> Number of Days: " . $result->days . "</li>
              <li class='list-group-item'>Price: " . $result->price . "</li></ul>"
 ?>
                    </div>

                    <div class="col-sm-6">
<div><img src='images/<?php echo $result->image;?>' width='75%' height='auto'> </div>
                        <?php echo  $result->description  ?>
                    </div>
                    <div class="col-sm-12">

                        <form method='post' action='./Cart/tourCart.php'>
                            <input type='hidden' id='tourId' name='tourId' value='<?php echo $result->id ?>'>
                           <input type='submit' class='btn btn-success' id='addToCart' name='addToCart' value='Add to cart' />
                        </form>
                    </div>



                </div>
            </div>
            <?php
            $i++;
            }
            ?>
        </div>


        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
            <?php for($j=0; $j<$i; $j++){ ?>
                <li data-target="#quote-carousel" data-slide-to="<?php echo $j; ?>" <?php if($j < 1){ echo "class = 'active'"; }  ?>  ></li> <?php } ?>

        </ol>

    </div>
</div>
<script>

    $('#addToCart').click(function(e){
        e.preventDefault();
        $tourId = $('#tourId').val();
        $.post('Cart/addingToCartWithoutLoading.php',{addToCart: '', tourId : $tourId}, function (data) {

            $('#prodlist').html(data);

        });
    })

</script>

<div id="prodlist"></div>