<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/9/2017
 * Time: 1:42 PM
 */
//require_once 'Connect.php';
//require_once 'Userclass.php';
//require_once 'Admincrud.php';
include_once '../../header.php';
include('errorhandle.php');
include_once '../Model/Cardeals.php';
include_once '../Model/Connect.php';
include_once '../controller/Cardealcrud.php';


//$db = Connect::dbConnect();
//$mydeals =  new Admincrud($db);
//$deals = $mydeals->listdeals();
$db = new Connect();// database obj
$conn = $db->connectDb();

$cobj = new Cardealcrud();
$deals = $cobj->listdeals($conn);

$mobj = new Cardeals();

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    $deldeal = $cobj->delete($id,$conn);
    if($deldeal){
        header('Location: admin.php');
    }
}
?>
<div class="container-fluid"><br><br><br>
    <div class="row">
        <?php include_once '../../adminSidebar.php'?>
        <div class="col-sm-10 col-md-10">

<?php
echo '<h3><a href="addcar.php">Add new Car</a></h3>';
echo "<h1 style='text-align: center;'>List of Car deals Admin Interface</h1>";
echo "<div > <div class='row'><ul>";
foreach($deals as $deal){
    echo"<div class='col-sm-4' >";
    echo "<img src='../img/" . $deal->image . "' height=200px />" ;
    echo "<li><a href='admin.php?id=". $deal->id . "' >" . $deal->name . "</a>
       <br/><p>Description:  $deal->description  </p>
       <br/><p>Price: $ $deal->price /day </p>    
    <form action=\"admin.php\" method=\"post\">
    <input type=\"hidden\" value='" . $deal->id ."' name=\"id\">
    <input type=\"submit\" value=\"Delete\" name=\"delete\">
</form>
    <form action=\"update.php\" method=\"post\">
    <input type=\"hidden\" value='" . $deal->id ."' name=\"id\">
    <input type=\"submit\" value=\"Update\" name=\"update\">
</form>
    <br/><br/>
    </div>
    </li>";
}
?>

</div>

    </div>

</div>
<?php
echo"</ul></div></div>";
include_once '../../footer.php';

