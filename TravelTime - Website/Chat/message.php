<?php

require_once '../header.php';
session_start();
if(isset($_POST['login'])) {
    if(!empty(trim($_POST['form__name']))) {
        $_SESSION['username'] = $_POST['form__name'];
        $_SESSION['filename'] =  $_SESSION['username'] .  uniqid();

require_once '../classes/DbConnect.php';
require_once '../classes/TourChat.php';
$chatObj = new TourChat();

    date_default_timezone_set("America/Toronto");
    $dateNow = date('Y-m-d H:i:s');
    $chatUser = ($_SESSION['username']);
    $msg = $_SESSION['filename'];
    $chatInsert = $chatObj->insertChat($chatUser, $dateNow, $msg);



    }
    else{
        $errorMsg = "Username is required";
        include_once 'chatAssistance.php';
        exit();
    }

}
elseif (isset($_POST['filenameBtn'])){
    $_SESSION['filename'] = $_POST['filename'] ;
    $_SESSION['username'] = 'admin';
}

date_default_timezone_set("America/Toronto");
    $dateNow = date('Y-m-d H:i:s');
    $filename = 'xml/' . $_SESSION['filename'] . '.xml';

    $xml = new DOMDocument('1.0', "utf-8");
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;

    if (file_exists($filename)) {


        $xml->load($filename);
        $chatRoom = $xml->getElementsByTagName('chatRoom')[0];



    } else {

        $chatRoom = $xml->createElement("chatRoom");


    }

    if(isset($_POST['sendMsg'])){
        $user = $xml->createElement("user");
        $name = $xml->createElement("name", $_SESSION['username']);
        $message = $xml->createElement("message", $_POST['form__msg']);
        $date = $xml->createElement("date", $dateNow);



        $user->appendChild($name);
        $user->appendChild($message);
        $user->appendChild($date);

        $chatRoom->appendChild($user);
        $xml->appendChild($chatRoom);
        $xml->save($filename);}





    require_once 'chatform.php';


    ?>

    <script type="text/javascript">



        setInterval(function(){

            var showData = document.getElementById("disMsg");

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

            xhr.open("GET", "disMes.php", true);
            xhr.send(null);



        }, 1000);
    </script>
<div class="msgBigBoxDiv">
<div class="container">
<?php if ($_SESSION['username']== 'admin'){ ?>
    <div class="row">
        <!--****SideBar Starts***********************-->
        <?php require_once '../adminSidebar.php';?>
        <!--****SideBar Ends***********************-->


        <!--****Body Start***********************-->
        <!--***Tours And Create a Tour Tab***********************-->
        <div class="col-sm-9 col-md-10 admin_body">
<?php }?>
        <div id='disMsg'><?php require_once 'disMes.php'; ?></div>
            <?php if ($_SESSION['username']== 'admin'){ ?>

        </div>
    </div>
</div>
<?php }
?>
</div>
</body>



