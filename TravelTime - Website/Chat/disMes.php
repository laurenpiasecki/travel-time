<?php  include '../errorhandle.php';   if(!isset($_SESSION)) {    session_start();}

if(isset($_SESSION['username'])){
   if(!(isset($filename))){
       $filename = 'xml/'. $_SESSION['filename'] . '.xml';
   }



    if (file_exists($filename)) {
       if(!(isset($xml))){
        $xml = new DOMDocument('1.0', "utf-8");
        $xml->load($filename);
        $chatRoom = $xml->getElementsByTagName('chatRoom')[0];}






        $users=  $xml->getElementsByTagName('user');
        echo '<div class="msgBigBox">';

        foreach ($users as $user) {
            if($user->getElementsByTagName('name')[0]->nodeValue == $_SESSION['username']){

                echo '<div class="move-right">
       <div class="msgBoxMe">' . $user->getElementsByTagName('message')[0]->nodeValue . '
       <div class="msgBoxTime">' .substr($user->getElementsByTagName('date')[0]->nodeValue,11)   . '</div></div></div>';
            }
            else{
                echo '<div class="move-left">
              <div class="msgBoxOthers">
              <div class="msgBoxName">' . $user->getElementsByTagName('name')[0]->nodeValue . '</div>
             ' . $user->getElementsByTagName('message')[0]->nodeValue . '
              <div class="msgBoxTime">' .   substr($user->getElementsByTagName('date')[0]->nodeValue,11)  . '</div></div>
              </div>';
            }
        }
        echo ' </div>';

        echo '<script type="text/javascript">
     window.onload = function(){
         var body = document.getElementsByTagName("body")[0];
    var y = body.scrollHeight;
  
    
    window.scrollTo(0, y);
   
  
    
    
     }

</script>';

    }

}

else{
   /* header('Location: index.php');
    exit();*/
}?>

















