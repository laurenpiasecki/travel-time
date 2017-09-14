<?php
include_once "classes/Dbconnect.php";
Class midhu_insurance_insert
{
    public function insert_insurance_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();
        $destination = $_SESSION['destination'];
        $originalDate1 = $_SESSION['DepartureDate'];
        $DepartureDate = date("y-m-d", strtotime($originalDate1));
        $originalDate2 = $_SESSION['ReturnDate'];
        $ReturnDate = date("y-m-d", strtotime($originalDate2));
        $Number1 = $_SESSION['Number1'];
        $Province = $_SESSION['Province'];
        $departcity = $_SESSION['departcity'];
        $Name1 = $_SESSION['Name1'];
        $Age1 = $_SESSION['Age1'];
        $Name2 = $_SESSION['Name2'];
        $Age2 = $_SESSION['Age2'];
        $Relationship2 = $_SESSION['Relationship2'];
        $Name3 = $_SESSION['Name3'];
        $Age3 = $_SESSION['Age3'];
        $Relationship3 = $_SESSION['Relationship3'] ;
        $Name4 = $_SESSION['Name4'];
        $Age4 = $_SESSION['Age4'];
        $Relationship4 = $_SESSION['Relationship4'];
        $Name5 = $_SESSION['Name5'];
        $Age5 = $_SESSION['Age5'];
        $Relationship5 = $_SESSION['Relationship5'];
        $passedprice = $_SESSION['passedprice'];
        $query = "INSERT INTO insurance(destination,DepartureDate,ReturnDate,Number1,Province,departcity,Name1,
                   Age1,Name2,Age2,Relationship2,Name3,Age3,Relationship3,Name4,Age4,Relationship4,Name5,Age5,Relationship5,passedprice)
                  VALUES (:destination,:DepartureDate,:ReturnDate, :Number1,:Province,:departcity,:Name1,
                   :Age1,:Name2,:Age2,:Relationship2,:Name3,:Age3,:Relationship3,:Name4,:Age4,:Relationship4,:Name5,:Age5,:Relationship5,:passedprice)";
        $pdostmt = $db->prepare($query);
        $pdostmt->bindValue(':destination', $destination, PDO::PARAM_STR);
        $pdostmt->bindValue(':DepartureDate', $DepartureDate, PDO::PARAM_STR);
        $pdostmt->bindValue(':ReturnDate', $ReturnDate, PDO::PARAM_STR);
        $pdostmt->bindValue(':Number1', $Number1, PDO::PARAM_STR);
        $pdostmt->bindValue(':Province', $Province, PDO::PARAM_STR);
        $pdostmt->bindValue(':departcity', $departcity, PDO::PARAM_STR);
        $pdostmt->bindValue(':Name1', $Name1, PDO::PARAM_STR);
        $pdostmt->bindValue(':Age1', $Age1, PDO::PARAM_STR);
        $pdostmt->bindValue(':Name2', $Name2, PDO::PARAM_STR);
        $pdostmt->bindValue(':Age2', $Age2, PDO::PARAM_STR);
        $pdostmt->bindValue(':Relationship2', $Relationship2, PDO::PARAM_STR);
        $pdostmt->bindValue(':Name3', $Name3, PDO::PARAM_STR);
        $pdostmt->bindValue(':Age3', $Age3, PDO::PARAM_STR);
        $pdostmt->bindValue(':Relationship3', $Relationship3, PDO::PARAM_STR);
        $pdostmt->bindValue(':Name4', $Name4, PDO::PARAM_STR);
        $pdostmt->bindValue(':Age4', $Age4, PDO::PARAM_STR);
        $pdostmt->bindValue(':Relationship4', $Relationship4, PDO::PARAM_STR);
        $pdostmt->bindValue(':Name5', $Name5, PDO::PARAM_STR);
        $pdostmt->bindValue(':Age5', $Age5, PDO::PARAM_STR);
        $pdostmt->bindValue(':Relationship5', $Relationship5, PDO::PARAM_STR);
        $pdostmt->bindValue(':passedprice', $passedprice, PDO::PARAM_STR);


        $pdostmt->execute();
        $pdostmt->closeCursor();

        
    }
}

?>