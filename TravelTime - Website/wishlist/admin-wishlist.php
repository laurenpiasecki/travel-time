<?php
include('config.php');
include('header.php'); ?>

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
<?php
$per_page = 10;
if ($result = $db->query("SELECT * FROM wishlist ORDER BY id"))
{
    if ($result->num_rows != 0)
    {
        $total_results = $result->num_rows;
        $total_pages = ceil($total_results / $per_page);
        if (isset($_GET['page']) && is_numeric($_GET['page']))
        {
            $show_page = $_GET['page'];
            if ($show_page > 0 && $show_page <= $total_pages)
            {
                $start = ($show_page -1) * $per_page;
                $end = $start + $per_page;
            }
            else
            {
                $start = 0;
                $end = $per_page;
            }
        }
        else
        {
            $start = 0;
            $end = $per_page;
        } ?>
        <div id="list" class="tab-pane fade in active">
                    <div class="col-sm-12">
                        <div class="table-responsive table-hover">
                            <table class="table">
                                <thead class="thead-custom">
<tr> <th>ID</th> <th>Destination Name</th> <th>Destination Image</th> <th>Edit</th> <th>Delete</th></tr></thead>
                                <tbody>
<?php
        for ($i = $start; $i < $end; $i++)
        {
            if ($i == $total_results) { break; }
            $result->data_seek($i);
            $row = $result->fetch_row();
            echo "<tr>";
            echo '<td>' . $row[0] . '</td>';
            echo '<td>' . $row[1] . '</td>';
            echo '<td>' . $row[2] . '</td>';
            echo '<td><a href="admin-wishlist-update.php?id=' . $row[0] . '"><input type="submit" class="btn btn-primary" value="Edit" /></a></td>';
            echo '<td><a href="admin-wishlist-delete.php?id=' . $row[0] . '"><input type="submit" class="btn btn-danger" value="Delete" /></a></td>';
            echo "</tr>";
        }
        ?>
                                </tbody>
</table>
</div>
</div>
<ul class="pagination">
<?php
echo "<p><a href='admin-wishlist.php'>View All</a> | <b>View Page:</b> ";
for ($i = 1; $i <= $total_pages; $i++)
{
    if (isset($_GET['page']) && $_GET['page'] == $i)
    {
        echo $i . " ";
    }
    else
    {
        echo "<a href='admin-wishlist.php?page=$i'>$i</a> ";
    }
}?>
</ul>
<?php
    }
    else
    {
        echo "No results to display!";
    }
}
else
{
    echo "Error: " . $db->error;
}

$db->close();
?>
</div>
</div>
    </div>
</div>
<?php include('footer.php') ?>
