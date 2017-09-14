<?php
/**
 * Created by PhpStorm.
 * User: sandhu's
 * Date: 3/9/2017
 * Time: 3:29 PM
 */
include_once '../../header.php';
include_once '../Model/Cardeals.php';
include_once '../Model/Connect.php';
include_once '../controller/Cardealcrud.php';
//include('errorhandle.php');
$db = new Connect();// database obj
$conn = $db->connectDb();

$cobj = new Cardealcrud();
$deals = $cobj->listdeals($conn);

$mobj = new Cardeals();

//get the variable values in superglobles $_FILES array
if(isset($_POST['update'])){
    $id = $_POST['id'];

    $results = $cobj->cardealsbyid($conn,$id);

}
if(isset($_POST['upd'])){
    $file_temp = $_FILES['upfile']['tmp_name'];
//original path and file name of the uploaded file
    $file_name = $_FILES['upfile']['name'];
//size of the uploaded file in bytes
    $file_size = $_FILES['upfile']['size'];
//type of the file(if browser provides)
    $file_type = $_FILES['upfile']['type'];
//error number
    $file_error = $_FILES['upfile']['error'];

    echo $file_temp . "<br />";
    echo $file_name . "<br />";
    echo $file_size . "<br />";
    echo $file_type . "<br />";
    echo $file_error . "<br />";
    if ($file_error > 0)
    {
        echo "Problem";
        switch ($file_error)
        {
            case 1:
                echo "File exceeded upload_max_filesize.";
                break;
            case 2:
                echo "File exceeded max_file_size";
                break;
            case 3:
                echo "File only partially uploaded.";
                break;
            case 4:
                echo "No file uploaded.";
                break;
        }
        exit;
    }



    $max_file_size = 200000;
    if($file_size > $max_file_size)
    {
        echo "file size too big";

    }

//folder to move the uploaded file
    $target_path = "uploads/";
    $target_path = $target_path .  $_FILES['upfile']['name'];
//
////move the uploaded file from tempe path to taget path
    if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
        echo "The file ".  $_FILES['upfile']['name'] . " has been uploaded ";
    } else{
        echo "There was an error uploading the file, please try again!";
    }




    $name = $_POST['cname'];//getting value of name from add.php form
    $description = $_POST['cdescription'];
    $price = $_POST['cprice'];
    $image = $_FILES['upfile']['name'];
    $id = $_POST['id'];;
    $mobj->setId($id);
    $mobj->setName($name);
    $mobj->setDescription($description);
    $mobj->setPrice($price);
    $mobj->setImage($image);
    $cobj->update($conn,$mobj);
//    echo "update successfully";
    header("Location: admin.php");
}
?>



    <div class="container"> <br><br><br><div class="row">
            <div class="col-md-6 col-md-offset-3">


                <div class="well text-center">
                    <p>Update Car deal</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input class="form-control" id="cname" maxlength="100" name="cname" value=" <?php echo $results['name']; ?>"  type="text" required />

                        </div>

                        <div class="form-group">
                            <input class="form-control" id="cdescription" name="cdescription" value="<?php echo $results['description']; ?>"  type="text" required />

                        </div>

                        <div class="form-group">
                            <input class="form-control" id="cprice" name="cprice"  value="<?php echo $results['price']; ?>" type="text" required />

                        </div>

                        <div class="form-group">
                            <input  type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <input class="form-control" type="file" name="upfile" placeholder="Select file:" id="upfile" >

                        </div>

                        <input type="hidden" value="<?php echo $results['id']; ?>" name="id"></div>


                        <button type="submit" name="upd" class="btn btn-default">Update Car Deal</button>




                    </form></div></div></div></div>


<?php //include_once 'footer.php'?>