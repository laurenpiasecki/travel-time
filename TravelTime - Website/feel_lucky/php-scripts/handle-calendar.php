<?php
// PRINT CALENDAR
function printCalendar(){
    $success = false;
    // if all 3 drop-downs are selected turn $success to true
    if( (isset($_POST["months"]) && $_POST["months"] !== "default") &&
        (isset($_POST["days"]) && $_POST["days"] !== "default") &&
        (isset($_POST["years"]) && $_POST["years"] !== "default") ){
        $success = true;  
    }
    // MONTHS
    $months = array("January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December");
    echo "<div class=\"form-box\">";
    echo "<select name=\"months\">";
    echo "<option value=\"default\">Select Month</option>";
    for($i=0; $i<sizeof($months); $i++){
        echo "<option " . ( $_POST["months"]==$months[$i] && !$success ? 'selected="true"' : "" ) . ">" . $months[$i] . "</option>";
    }
    echo "</select>";
    echo "</div>"; 
    // print days:
    echo "<div class=\"form-box\">";
    echo "<select name=\"days\">";
    echo "<option value=\"default\">Select Day</option>";
    for($i=1; $i<=31; $i++){
        echo "<option " . ( $_POST["days"]==$i && !$success ? 'selected="true"' : "" ) . ">" . $i . "</option>";
    }
    echo "</select>";
    echo "</div>";    
    // print years
    echo "<div class=\"form-box\">";
    echo "<select name=\"years\">";
    echo "<option value=\"default\">Select Year</option>";
    for($i=2018; $i<=2027; $i++){
        echo "<option " . ( $_POST["years"]==$i && !$success ? 'selected="true"' : "" ) . ">" . $i . "</option>";
    }
    echo "</select>";
    echo "</div>";  
}
// EVALUATE FUNCTION
function evaluate(){
    $err = "";
    if(isset($_POST["send"])){
        // evaluate months
        if(trim($_POST["months"]) && $_POST["months"] != "default"){
            $_POST["months"] = trim(strip_tags($_POST["months"]));
            $m = $_POST["months"];
        } else {
            // create error message
            $err = "<p class=\"error\">Please select a month</p>";
        }
        // evaluate days
        if(trim($_POST["days"]) && $_POST["days"] != "default"){
            $_POST["days"] = trim(strip_tags($_POST["days"]));
            $d = $_POST["days"];
        } else {
            $err .= "<p class=\"error\">Please select a day</p>";
        }
        // evaluate years
        if(trim($_POST["years"]) && $_POST["years"] != "default"){
            $_POST["years"] = trim(strip_tags($_POST["years"]));
            $y = $_POST["years"];
        } else {
            $err .= "<p class=\"error\">Please select a year</p>";
        }
        // feedback
        if(!empty($m) && !empty($d) && !empty($y)){	
            $feed = "<a id=\"results\" href=\"#\"></a>
                    <p class=\"selected\">You selected: $m $d, $y.</p>
                    <h6>---</h6>
                    <h5>Planning trips since 2002 &copy; TravelTime</h5>
                    <h6>---</h6>";			
			if(($y>=2018) && ($y<=2022)){
				// query that will select the data for packages available in the period of time	
                $query = "SELECT spec_content, spec_img
                          FROM spec_table
                          WHERE spec_type = 'M'";
			} elseif(($y>=2022) && ($y<=2027)) {                
				// query that will select the data for packages available in the period of time
                $query = "SELECT spec_content, spec_img
                          FROM spec_table
                          WHERE spec_type = 'B'";
            } else {
                // display message that there is no information in database for anything after the year 2027
                $err = "<i class=\"fa fa-frown-o fa-3x\"></i>
                        <p>Unfortunately, there are no trip packages at this time - Please check back soon!<p>";
            }
            if ($err === "") {
                global $connection;
                // mysqli_query to perform the query
                $result = mysqli_query($connection, $query);
                $scoop_html = "<div class=\"spec\">";
                while($row = mysqli_fetch_assoc($result)){
                    // loop through each assoc array parsing the array elements to  
                    // append the gotten expression to the variable created
                    $scoop_html .= "<div class=\"wrap\">";
                    // loop through each record-set:
                    foreach($row as $k=>$v){
                        if($k==="spec_img"){
                        $scoop_html .= "<img class=\"err\" src=\"$v\">
                         <p>&nbsp;</p>
                        <form action='/charge' method='POST'>
                        <script src='https://checkout.stripe.com/checkout.js'
                        class='stripe-button'
                        data-key='pk_test_6pRNASCoBOKtIshFeQd4XMUh'
                        data-name='Invoice Payment'
                        data-description='Invoice Amount Due ($3033.60)'
                        data-amount='303360'>
                        </script>
                        </form>";
                        } else {
                            $scoop_html .= "<div class=\"spec\">$v</div>";
                             }
                    }
                    $scoop_html .= "</div>";
                // end while loop	
                }
                $scoop_html .= "</div>";
            }
        }
    } 
    // print feedback
    if(isset($feed)){
        echo $feed;
    }
    // print error(s)
    if(isset($err)){
        echo $err;
    }
	// print the variable containing HTML
	if(isset($scoop_html)){
        echo $scoop_html;
    }
}

?>