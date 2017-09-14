<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 4/6/2017
 * Time: 4:34 PM
 */
require_once ('../Model/Connect.php');
require_once ('../Model/Bookacar.php');
require_once ('../controller/Bookacarcrud.php');
require_once '../../cardeals/view/header.php';

$db = new Connect();// database obj
$conn = $db->connectDb();

$cobj = new Bookacarcrud();
$mobj = new Bookacar();
$name_error="";
$email_error="";
$phone_error="";
$dropoff_datetime_error="";
$pickup_datetime_error = "";
if(isset($_POST['reservesubmit'])){
//    echo"reserved button pressed";
    $bookacar_id = $_POST['bookacar_id'];
    $dropoff_loc = $_POST['dropoff_loc'];
    $pickup_loc = $_POST['pickup_loc'];
    $pickup_datetime = $_POST['pickup_datetime'];
    if(empty($pickup_datetime)){$pickup_datetime_error = "Please enter the pickup date and time";}
    $dropoff_datetime = $_POST['dropoff_datetime'];
    if(empty($dropoff_datetime)){$dropoff_datetime_error = "Please enter the dropoff date and time";}
    $name = $_POST['name'];
    if(empty($name)){$name_error = "Please enter the name";}
    $email = $_POST['email'];
    if(empty($email)){$email_error = "Please enter the email";}
    $phone = $_POST['phone'];
    if(empty($phone)){$phone_error = "Please enter the phone";}

//           echo $bookacar_id . $dropoff_loc . $pickup_loc . $pickup_datetime . $dropoff_datetime;

    $mobj->setName($name);
    $mobj->setEmail($email);
    $mobj->setPhone($phone);
    $mobj->setBookacarId($bookacar_id);
    $mobj->setPickupLoc($pickup_loc);
    $mobj->setDropoffLoc($dropoff_loc);
    $mobj->setPickupDatetime($pickup_datetime);
    $mobj->setDropoffDatetime($dropoff_datetime);
    $result = $cobj->create($conn,$mobj);
    if($result)
    {
        echo"<script> sweetAlert('Registeration Succesful');</script>";
      //  echo"Registeration Succesful";
//    header('Location:user.php');
    }else{
        echo"<script> sweetAlert('Something went wrong');</script>";

    }
}




if(isset($_GET['id'])){
$id= $_GET['id'];
//echo $id;
    $deals = $cobj->cardealsbyid($conn,$id);
    //var_dump($deals);?>
<div class='container' style='padding-top:50px; '>
    <div class='row'><div class="col-sm-2"></div>
        <div class="col-sm-4">
            <a href='bookacar.php?id=<?php echo $deals['id'];?>' >
                <img src='../img/<?php echo $deals['image'];?>' width=100% height=auto /></a>
            <a href='bookacar.php?id=<?php echo $deals['id'];?>' >Name: <?php echo$deals['name'];?></a>
            <p><span class='special'>Description:</span><?php echo$deals['description'];?></p>
            <p><span class='special'>Price:</span>  <?php echo$deals['price'];?>  </p><br>

        </div>
        <div class='col-sm-4'>
                 <div class="well text-center">
                    <p>Reserve a Car</p>
                    <form class="form-inline" action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class=" control-label">Name</label>
                            <div class=" inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input  name="name" placeholder="Name" class="form-control"  type="text" autofocus required >
                                </div>
                            </div>
                            <span style="color:red;"><?php if(isset($name_error)) echo $name_error; ?>  </span><br>

                        </div>


                        <!-- input Email-->
                        <div class="form-group">
                            <label class="col-md-12 control-label">E-Mail</label>
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input required name='email' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"  placeholder="E-Mail Address" class="form-control"  type="email">
                                </div>
                            </div>
                            <span style="color:red;"><?php if(isset($email)) echo $email_error; ?>  </span><br>
                        </div>

                        <!-- input Phone-->
                        <div class="form-group">
                            <label class="col-md-12 control-label">Phone #</label>
                            <div class="col-md-12 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                    <input required name='phone' placeholder="(416)555-1065" class="form-control"  type="tel">
                                </div>
                            </div>
                            <span style="color:red;"><?php if(isset($phone)) echo $phone_error; ?>  </span><br>
                        </div>



                        <div class="form-group">
                                <label>Pick Up Location:</label>
                                <select class="form-control " name="pickup_loc"  id="pickup_loc">
                                    <option value="Pearson Airport">Pearson Airport</option>
                                    <option value="Billy Bishop Airport">Billy Bishop Airport</option>
                                    <option value="Union Station" >Union Station</option>
                                </select> </div>
                            <div class="form-group">
                                <label>Drop Off Location</label>
                                <select class="form-control " name="dropoff_loc"  id="dropoff_loc">
                                    <option value="Pearson Airport">Pearson Airport</option>
                                    <option value="Billy Bishop Airport">Billy Bishop Airport</option>
                                    <option value="Union Station" >Union Station</option>
                                </select>
                            </div>

                        <div class="form-group">
<!--                            <input class="form-control" id="id"  name="id" placeholder="" value="--><?php //echo $deals['id']; ?><!--" type="hidden"  />-->
                            <input class="form-control" id="bookacar_id"  name="bookacar_id" placeholder="" value="<?php echo $deals['id']; ?>" type="hidden"/>
                        </div>

                        <div class="form-group">
                            <label>Pick up Date/Time</label>
                            <input class="form-control" id="pickup_datetime" name="pickup_datetime"  type="datetime-local" min="<?php echo date("Y/m/d");?>" required />
                            <span style="color:red;"><?php if(isset($pickup_datetime_error)) echo $pickup_datetime_error; ?>  </span><br>

                        </div>
                        <div class="form-group">
                            <label>Drop Off Date/Time</label>
                            <input class="form-control" id="dropoff_datetime" name="dropoff_datetime"  type="datetime-local" min="<?php echo date("Y/m/d");?>" required />
                            <span style="color:red;"><?php if(isset($dropoff_datetime_error)) echo $dropoff_datetime_error; ?>  </span><br>

                        </div>
                        <button type="submit" name="reservesubmit" class="btn btn-default">Reserve a Car</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <br><br><br>
</div>


<?php
}
else{
    header('Location:error.php');
}

//include_once 'footer.php';



