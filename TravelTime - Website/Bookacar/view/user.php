<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/6/2017
 * Time: 1:42 PM
 */
require_once '../../header.php';
require_once ('../Model/Connect.php');
require_once'../Model/Bookacar.php';
require_once '../controller/Bookacarcrud.php';

$db = new Connect();// database obj
$conn = $db->connectDb();

$cobj = new Bookacarcrud();
$deals = $cobj->listdeals($conn);
//$count1 = $deals->rowcount();
echo "<div class='container' style='padding-top:50px; '><div class='row'>";
foreach($deals as $deal){
    echo"<div class='col-sm-4'>
    <a href='bookacar.php?id=". $deal->id . "' >
    <img src='../../cardeals/img/" . $deal->image . "' width=100% height=auto /></a>
    <a href='bookacar.php?id=". $deal->id . "' >Name:" . $deal->name . "</a>
       <p><span class='special'>Description:</span>$deal->description</p>
       <p><span class='special'>Price:</span>$  $deal->price /day </p><br>
    </div>
    ";
}

?>
</div>
</div>
<br><br>





<?php


require_once '../../footer.php';