<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/9/2017
 * Time: 2:22 PM
 */


require_once 'header.php';
require_once('errorhandle.php');
require_once ('../Model/Connect.php');
require_once'../Model/Cardeals.php';
require_once '../controller/Cardealcrud.php';

$db = new Connect();// database obj
$conn = $db->connectDb();

$cobj = new Cardealcrud();
$deals = $cobj->listdeals($conn);
//$count1 = $deals->rowcount();
echo "<div class='container' style='padding-top:50px; '><div class='row'>";
foreach($deals as $deal){
    echo"<div class='col-sm-4'><a href='../../Bookacar/view/bookacar.php?id=". $deal->id . "' ><img src='../img/" . $deal->image . "' width=100% height=auto /></a>" ;
    echo "<li><a href='../../Bookacar/view/bookacar.php?id=". $deal->id . "' >Name:" . $deal->name . "</a>
       <br/><p><span class='special'>Description:</span>  $deal->description  </p>
       <br/><p><span class='special'>Price: </span>$  $deal->price /day </p><br>
    </div>
    ";
}
?>
    </div>
    </div>
    <br><br>


<?php
include_once '../../footer.php';
?>