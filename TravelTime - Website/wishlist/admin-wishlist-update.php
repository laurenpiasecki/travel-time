<?php
include("config.php");
include('header.php');
function renderForm($name = '', $fileName ='', $error = '', $id = '')
{ ?>
    <?php if ($error != '') {
        echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
            . "</div>";
    } ?>
    <div class="container">

        <div class="row">
            <!--****SideBar Starts***********************-->
            <?php require_once 'adminSidebar.php';?>
            <!--****SideBar Ends***********************-->

            <!--****Body Start***********************-->
            <!--***DESTINATIONS***********************-->
            <div class="col-sm-9 col-md-10 admin_body">
            <ul class="nav nav-pills">
                <li class="admin__listDestinationTab active"><a href="admin-wishlist.php">Destinations</a></li>
                <li class="admin__createDestinationTab pull-right"><a href="admin-wishlist-update.php">Add a New Destination</a></li>
            </ul>
            <br />
            <div class="tab-content">
    <label action="" method="post">
        <div class="form-group">
            <?php if ($id != '') { ?>
                <input type="hidden" name="id" class="form-control"  value="<?php echo $id; ?>" />
                <p>ID: <?php echo $id; ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
            <strong>Destination Name: *</strong> <input type="text" name="name" class="form-control"
                                                        value="<?php echo $name; ?>"/><br/>
        </div>
        <div class="form-group">
        <label class="sr-only"></label><strong>Destination Image: *</strong> <input type="file" name="image" class="form-control"
                                                                                    value="<?php echo $fileName; ?>"/></label>
                    </div>
            <p>* required</p>
        <div class="col-sm-12">
            <div class="form-group element-centered">
                <button type="submit" name="submit" class="btn btn-primary">Add Destination</button>
            </div>
        </div>
    </form>
        </div>
<?php }
if (isset($_GET['id']))
{
    if (isset($_POST['submit']))
    {
        if (is_numeric($_POST['id']))
        {
            $id = $_POST['id'];
            $name = htmlentities($_POST['name'], ENT_QUOTES);
            $fileName = htmlentities($_POST['image'], ENT_QUOTES);
            if ($name == '' || $fileName == '')
            {
                $error = 'ERROR: Please fill in all required fields!';
                renderForm($name, $fileName, $error, $id);
            }
            else
            {
                if ($stmt = $db->prepare("UPDATE wishlist SET name = ?, fileName = ?
WHERE id=?"))
                {
                    $stmt->bind_param("ssi", $name, $fileName, $id);
                    $stmt->execute();
                    $stmt->close();
                }
                else
                {
                    echo "ERROR: could not prepare SQL statement.";
                }
                header("Location: admin-wishlist.php");
            }
        }
        else
        {
            echo "Error!";
        }
    }
    else
    {
        if (is_numeric($_GET['id']) && $_GET['id'] > 0)
        {
            $id = $_GET['id'];
            if($stmt = $db->prepare("SELECT * FROM wishlist WHERE id=?"))
            {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($id, $name, $fileName);
                $stmt->fetch();
                renderForm($name, $fileName, NULL, $id);
                $stmt->close();
            }
            else
            {
                echo "Error: could not prepare SQL statement";
            }
        }
        else
        {
            header("Location: admin-wishlist.php");
        }
    }
}
else
{
    if (isset($_POST['submit']))
    {
        $name = htmlentities($_POST['name'], ENT_QUOTES);
        $fileName = htmlentities($_POST['image'], ENT_QUOTES);
        if ($name == '' || $fileName == '')
        {
            $error = 'ERROR: Please fill in all required fields!';
            renderForm($name, $fileName, $error);
        }
        else
        {
            if ($stmt = $db->prepare("INSERT wishlist (name, image) VALUES (?, ?)"))
            {
                $stmt->bind_param("ss", $name, $fileName);
                $stmt->execute();
                $stmt->close();
            }
            else
            {
                echo "ERROR: Could not add destination.";
            }
            header("Location: admin-wishlist.php");
        }

    }
    else
    {
        renderForm();
    }
}
$db->close();
?>
<br />
</div>
</div>
</div>
</div>
<?php include('footer.php') ?>
