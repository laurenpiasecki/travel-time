<?php
include_once "classes/Dbconnect.php";
class midhu_admin_insurance_edit
{

    public function select_insurance_edit_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();

        if (isset($_POST['editsubmit'])) {


            $Id = $_POST['Id'];
            $destination = $_POST['destination'];
            $DepartureDate = $_POST['DepartureDate'];
            $ReturnDate = $_POST['ReturnDate'];
            $Number1 = $_POST['Number1'];
            $Province = $_POST['Province'];
            $departcity = $_POST['departcity'];
            $Name1 = $_POST['Name1'];
            $Age1 = $_POST['Age1'];
            $Name2 = $_POST['Name2'];
            $Age2 = $_POST['Age2'];
            $Relationship2 = $_POST['Relationship2'];
            $Name3 = $_POST['Name3'];
            $Age3 = $_POST['Age3'];
            $Relationship3 = $_POST['Relationship3'];
            $Name4 = $_POST['Name4'];
            $Age4 = $_POST['Age4'];
            $Relationship4 = $_POST['Relationship4'];
            $Name5 = $_POST['Name5'];
            $Age5 = $_POST['Age5'];
            $Relationship5 = $_POST['Relationship5'];
            $passedprice = $_POST['passedprice'];






            $query = "UPDATE insurance 
                        SET 
                            destination = '$destination',
                            
                            DepartureDate = '$DepartureDate',
                            ReturnDate = '$ReturnDate',
                            Number1 = '$Number1',
                            Province = '$Province',
                            departcity =  '$departcity',
                            Name1 = '$Name1',
                            Age1 = '$Age1',
                            Name2 = '$Name2',
                            Age2 = '$Age2',
                            Relationship2 = '$Relationship2',
                            Name3 = '$Name3',
                            Age3 = '$Age3',
                            Relationship3 = '$Relationship3',
                            Name4 = '$Name4',
                            Age4 = '$Age4',
                            Relationship4 = '$Relationship4',                          
                            Name5 = '$Name5',
                            Age5 = '$Age5',
                            Relationship5 = '$Relationship5',              
                            passedprice =  '$passedprice'                                              
                  WHERE Id=$Id";
            $pdostmt = $db->prepare($query);
            $pdostmt->bindValue(':Id', $Id);
            $pdostmt->bindValue(':destination', $destination);
            $pdostmt->bindValue(':DepartureDate', $DepartureDate);
            $pdostmt->bindValue(':ReturnDate', $ReturnDate);
            $pdostmt->bindValue(':Number1', $Number1);
            $pdostmt->bindValue(':Province', $Province);
            $pdostmt->bindValue(':departcity', $departcity);
            $pdostmt->bindValue(':Name1', $Name1);
            $pdostmt->bindValue(':Age1', $Age1);
            $pdostmt->bindValue(':Name2', $Name2);
            $pdostmt->bindValue(':Age2', $Age2);
            $pdostmt->bindValue(':Relationship2', $Relationship2);
            $pdostmt->bindValue(':Name3', $Name3);
            $pdostmt->bindValue(':Age3', $Age3);
            $pdostmt->bindValue(':Relationship3', $Relationship3);
            $pdostmt->bindValue(':Name4', $Name4);
            $pdostmt->bindValue(':Age4', $Age4);
            $pdostmt->bindValue(':Relationship4', $Relationship4);
            $pdostmt->bindValue(':Name5', $Name5);
            $pdostmt->bindValue(':Age5', $Age5);
            $pdostmt->bindValue(':Relationship5', $Relationship5);
            $pdostmt->bindValue(':passedprice', $passedprice);






            $pdostmt->execute();

        }

    }

}





?>






