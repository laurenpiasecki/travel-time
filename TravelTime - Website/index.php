<?php session_start();
 unset($_SESSION['username']);   unset($_SESSION['filename']);
 include_once "indexHeader.php";?>
<!---MAIN IMAGE-->
<div class="bg-overlay">
    <div class="container">
    <div class="row text-center">
        <h2 class="tagLine">The<span class="decorativeText"> journey </span> is the <span class="decorativeText">destination.</span></h2>
    </div>
    </div>
</div>

<!--ROW SEPARATOR-->
<div>
<img class="img-responsive" src="images/rowSeparator.png" alt="rowSeparator" id="img__RowSeparator">
</div>


<!---TRIP PLANNER FORM-->


<?php
require_once 'classes/DbConnect.php';
require_once 'classes/Tours.php';
require_once 'classes/Testimonials.php';
$tourObj = new Tours();
$testimonialsObj = new Testimonials();
$tourDestinations = $tourObj->getDestinations();
$tourStartPlaces = $tourObj->getStartPlaces();
$tourTypes = $tourObj->getTypes();
$popularTours = $tourObj->getPopularTours();
$testimonials = $testimonialsObj->getTestimonials();

?>





<div class="bg-overlay2">
    <div class="container">
        <div class="row text-center">
            <h3 class="titleText">Adventure is out there</h3>
            <p class="titleLine">Plan it with us.</p>
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="tour__name">Tour name</label>
                    <input type="text" class="form-control" id="tour__name" name="tour__name" placeholder="Enter tour name">
                </div>



                <div class="form-group">
                    <label class="sr-only" for="tour__startPlace">Start Place</label>
                    <select class="form-control" id="tour__startPlace" name="tour__startPlace">
                        <option>From</option>
                        <?php
                        foreach($tourStartPlaces as $startPlace){
                            ?>
                            <option>
                                <?php
                                echo $startPlace->from_place;
                                ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>



                <div class="form-group">
                    <label class="sr-only" for="tour__destination">Destination</label>
                    <select class="form-control" id="tour__destination" name="tour__destination">
                        <option>To</option>
                        <?php
                        foreach($tourDestinations as $destination){
                            ?>
                            <option>
                                <?php
                                echo $destination->location;
                                ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>






                <div class="form-group">

                <label class="sr-only" for="tour__type">Tour type:</label>
                <select class="form-control" id="tour__type" name="tour__type">
                    <option>Tour type</option>
                    <?php
                    foreach($tourTypes as $tourType){
                        ?>
                        <option>
                            <?php
                            echo $tourType->type;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="tour__startDate">Tour start date</label>
                    <input type="date" class="form-control" id="tour__startDate" name="tour__startDate" placeholder="Tour start date ">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="tour__returnDate">Tour return date</label>
                    <input type="date" class="form-control" id="tour__returnDate" name="tour__returnDate" placeholder="Tour return date ">
                </div>
                    <button type="submit" id="tourSearch" name="tourSearch" class="btn btn-primary">Search </button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tourSearch').click(function (e) {
            e.preventDefault();
            var tour__nameVal = $('#tour__name').val();

           var tour__startPlaceVal = $('#tour__startPlace').val();
           var tour__destinationVal = $('#tour__destination').val();
           var tour__typeVal = $('#tour__type').val();
           var tour__startDateVal = $('#tour__startDate').val();
           var tour__returnDateVal = $('#tour__returnDate').val();


            console.log(tour__nameVal);
            $.get('display_result.php', {tour__name: tour__nameVal, tour__startPlace:tour__startPlaceVal,
                tour__destination:tour__destinationVal, tour__type:tour__typeVal, tour__startDate:tour__startDateVal,
                tour__returnDate:tour__returnDateVal}, function (data) {


                $('#showTours').html(data);
            });
        });
    });
</script>


<div id="showTours"></div>


<div class="container">
    <div class="row headingRow text-center">
        <h3 class="titleText">Popular Tours</h3>
        <p class="titleLine">Check out our best promotion tours</p>
    </div>

        <div class="row text-justify">

            <?php
            foreach($popularTours as $popular) {
                ?>
                <div class="col-sm-4 popularTours">
                    <img src="images/<?php echo $popular->image; ?>" width="100%" height="auto">
                    <div class="bookNow">Book Now</div>
                    <p>
                        <?php
                        echo $popular->description;
                        ?>
                    </p>
                </div>
                <?php
            }
            ?>


    </div>
</div>



    <div class="bg-overlay4">
            <div class="container">
            <div class="row text-center">

                <p class="saying">"The world is a book, and those who do not travel read only one page."</p>
                <h4 class="sayer">- Saint Augustine</h4>


        </div>
    </div>

</div>



<div class="container">
    <div class="row headingRow text-center">
        <h3 class="titleText">Why choose us</h3>
        <p class="titleLine">We are here for you</p>
    </div>
</div>

<div class="container">
    <div class="row text-justify">
        <div class="col-sm-4">
            <div class="media">
                <div class="media-left">
                    <img src="images/best_price.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Best Price</h4>
                    <p>Travel Time offers you the most competitive prices. Check out our tour packages for amazing deals.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="media">
                <div class="media-left">
                    <img src="images/time.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Time</h4>
                    <p>We offer you excellent customer service 24 hours a day, 7 day a week. Contact us via telephone or try our online chat to speak to a representative now.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="media">
                <div class="media-left">
                    <img src="images/fast.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Fast</h4>
                    <p>We make it easy for you to book your vacation with our complete tour package options.
                        If you need assistance with booking, contact us for a quick and simple trip reservation.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <div class="row why_us text-justify">
        <div class="col-sm-4">
            <div class="media">
                <div class="media-left">
                    <img src="images/best_choice.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Best Choice</h4>
                    <p>We here at Travel Time truly believe that we are simply the best option. We strive to offer you competitive pricing and award winning customer service.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="media">
                <div class="media-left">
                    <img src="images/trust.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Trust</h4>
                    <p>Our customers will tell you how much they value and appreciate our services.
                        We are always here to ensure that you have the most enjoyable and hassle free vacation possible.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="media">
                <div class="media-left">
                    <img src="images/safety.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Safety</h4>
                    <p>With top of the line travel insurance, you will always feel comfortable booking with us. We guarantee that your safety is of the utmost importance to us.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>




        <div class="container">
            <div id="testimonals"></div>
            <div class="row text-center">
        <h3 class="titleText">Happy Customers</h3>
        <p class="titleLine">Words from our valuable customers.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">



                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">




                            <!-- Quote-->
                            <?php
                            $i = 0;
                            foreach ($testimonials as $testimonial){
                                if($i < 1){ echo "<div class='item active'>"; }
                                else{
                                    echo "<div class='item'>";
                                } ?>


                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <p> <?php echo $testimonial->description; ?></p>
                                        <small><strong><?php echo $testimonial->user_name; ?></strong></small>
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
                   </div>
               </div>



   <!--IMAGES CREDIT TO
   Symbols graphic by <a href="http://www.flaticon.com/authors/freepik">Freepik</a> from <a href="http://www.flaticon.com/">Flaticon</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a>. Made with <a href="http://logomakr.com" title="Logo Maker">Logo Maker</a>
   -->

<!--ROW SEPARATOR-->
<div>
    <img class="img-responsive" src="images/rowSeparator_Family.png" alt="rowSeparator" id="img__BlackRowSeparator">
</div>
<div class="chatBar">
    <a href="Chat/chatAssistance.php">Trip Advisor <span class="glyphicon glyphicon glyphicon-comment"></span></a>
</div>

<!--FOOTER-->
<?php include_once "indexFooter.php" ?>
</html>