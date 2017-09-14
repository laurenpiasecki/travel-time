<?php session_start(); unset($_SESSION['username']); unset($_SESSION['filename']);
if(isset($_SESSION['adminName'])){
require_once '../header.php';
require_once '../classes/DbConnect.php';
require_once '../classes/TourChat.php';
$chatObj = new TourChat();
$chatDetail = $chatObj->chatDetail();
    ?>
    <div class="container">

    <div class="row">
    <!--****SideBar Starts***********************-->
    <?php require_once '../adminSidebar.php';?>
    <!--****SideBar Ends***********************-->


        <script type="text/javascript">



            setInterval(function(){

                var showData = document.getElementById("chatList");

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                    if(xhr.readyState === 4){
                        if(xhr.status === 200){
                            showData.innerHTML = xhr.responseText;
                        }
                        else{
                            //alert("Connection was unsuccessful");
                        }
                    }//end if ready state
                }//end readyState listener function

                xhr.open("GET", "adminChatList.php", true);
                xhr.send(null);



            }, 1000);
        </script>
    <!--****Body Start***********************-->
    <!--***Tours And Create a Tour Tab***********************-->
        <div class="col-sm-9 col-md-10 admin_body">
            <tbody class="table-responsive table-hover">
                <table class="table">
                    <thead class="thead-custom">
                    <tr>
                        <th>User Name</th>
                        <th>Date Time</th>
                        <th>Chat File</th>
                        <th>View</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody id='chatList'><?php require_once 'adminChatList.php'; ?></tbody>
            </table>
        </div><!--table-->
    </div><!--adminBody-->
    </div><!--row-->
    </div><!--container-->

<?php require_once '../footer.php'; }
else{
    include_once "../header.php";
    echo "<div class='titleText alignedCenter noAccess'>Sorry! you dont have access to this page.</div>
<!--ROW SEPARATOR-->
<div>
    <img class=\"img-responsive\" src=\"../images/rowSeparator_Family.png\" alt=\"rowSeparator\" id=\"img__BlackRowSeparator\">
</div>";
    include_once "../footer.php";
}
?>