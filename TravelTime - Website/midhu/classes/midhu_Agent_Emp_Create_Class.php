<?php
class midhu_Agent_Emp_Create_Class
{

    public function Agent_Emp_Create_function()
    {
        $dbc = new Dbconnect();
        $db = $dbc->getDb();

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
        $query = "INSERT INTO agent( FirstName, LastName, Email, Phone, Nationality,Address,City,Province, Country, 
                  Comment, FavouriteDestination, FavouriteAirline, Languages, Store, Picture, Specialty)
                  VALUES ( :FirstName, :LastName, :Email, :Phone, :Nationality, :Address,:City, :Province, :Country, 
                  :Comment, :FavouriteDestination, :FavouriteAirline, :Languages, :Store, :Picture, :Specialty)";
        $pdostmt = $db->prepare($query);

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
        $pdostmt->closeCursor();

    }


}