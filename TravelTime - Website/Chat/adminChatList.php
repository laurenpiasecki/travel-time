<?php
if(!isset($_SESSION)){session_start();} if(isset($_SESSION['adminName'])){
require_once '../classes/DbConnect.php';
require_once '../classes/TourChat.php';
$chatObj = new TourChat();
$chatDetail = $chatObj->chatDetail();

?>
<?php


foreach ($chatDetail as $chat){

/* to count unread messages*/


$filenames = 'xml/' . $chat->msg . '.xml';
if (file_exists($filenames)) {
    $i = 0;
    $doc = new DOMDocument('1.0', "utf-8");
    $doc->load($filenames);
    $users = $doc->getElementsByTagName('user');
    foreach ($users as $user) {
        if ($user->getElementsByTagName('name')[0]->nodeValue == 'admin') {
            $i = 0;
        } else {
            $i += 1;
        }
    }
}

/* $i holds the value of unread user msgs*/
?>

    <tr>
        <td><?php echo $chat->user_name; if($i==0){
            echo '<span class="badge">' . $i .'</span>';
        }
        else{
            echo '<span class="badge badge-custom">' . $i .'</span>';
        }

        ?> </td>
        <td><?php echo $chat->chat_time; ?></td>
        <td><?php echo $chat->msg; ?></td>
        <td><form method='post' action='message.php'>
                <input type='hidden' name='filename' value='<?php echo $chat->msg; ?>'>
                <input type='submit' class="btn btn-primary" name='filenameBtn' value='View Chat' />
            </form></td>
        <td><form method='post' action='adminDeleteChat.php'>
                <input type='hidden' name='chatDeleteId' value='<?php echo $chat->id; ?>'>
                <input type='submit' class="btn btn-danger" name='filenameBtn' value='Delete Chat' />
            </form></td>
    </tr>
    <?php
} }//foreach loop closing
?>

