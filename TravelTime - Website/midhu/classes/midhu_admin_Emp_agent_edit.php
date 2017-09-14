<?php
include_once "classes/Dbconnect.php";
class midhu_admin_Emp_agent_edit
{

    public function select_agent_Emp_edit_function($Id)
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();

        if (isset($_POST['editsubmit'])) {
            $Id = $_POST['Id'];
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Email = $_POST['Email'];
            $Phone = $_POST['Phone'];
            $Nationality = $_POST['Nationality'];
            $Address = $_POST['Address'];
            $City = $_POST['City'];
            $Province = $_POST['Province'];
            $Country = $_POST['Country'];
            $Comment = $_POST['Comment'];
            $FavouriteDestination = $_POST['FavouriteDestination'];
            $FavouriteAirline = $_POST['FavouriteAirline'];
            $Languages = $_POST['Languages'];
            $Store = $_POST['Store'];
            $Picture = $_POST['Picture'];
            $Specialty = $_POST['Specialty'];
            $query = "UPDATE agent 
                        SET 
                            FirstName = '$FirstName',
                            LastName = '$LastName',
                            Email = '$Email',
                            Phone = '$Phone',
                            Nationality = '$Nationality',
                            Address = '$Address',
                            City = '$City',
                            Province = '$Province',
                            Country = '$Country',
                            Comment = '$Comment',
                            FavouriteDestination = '$FavouriteDestination',
                            FavouriteAirline = '$FavouriteAirline',
                            Languages = '$Languages',
                            Store = '$Store',
                            Picture = '$Picture',                                                       
                            Specialty = '$Specialty'                                                    
                                                        
                  WHERE Id=$Id";
            $pdostmt = $db->prepare($query);
            $pdostmt->bindValue(':Id', $Id);
            $pdostmt->bindValue(':FirstName', $FirstName);
            $pdostmt->bindValue(':LastName', $LastName);
            $pdostmt->bindValue(':Email', $Email);
            $pdostmt->bindValue(':Phone', $Phone);
            $pdostmt->bindValue(':Nationality', $Nationality);
            $pdostmt->bindValue(':Address', $Address);
            $pdostmt->bindValue(':City', $City);
            $pdostmt->bindValue(':Province', $Province);
            $pdostmt->bindValue(':Country', $Country);
            $pdostmt->bindValue(':Comment', $Comment);
            $pdostmt->bindValue(':FavouriteDestination', $FavouriteDestination);
            $pdostmt->bindValue(':FavouriteAirline', $FavouriteAirline);
            $pdostmt->bindValue(':Languages', $Languages);
            $pdostmt->bindValue(':Store', $Store);
            $pdostmt->bindValue(':Picture', $Picture);
            $pdostmt->bindValue(':Specialty', $Specialty);


            $pdostmt->execute();

        }

    }

}





?>






