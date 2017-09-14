<?php

$db = new mysqli("localhost", "gursewak_admin", "phpTeam", "gursewak_traveltime");

if ($db->connect_error) {
    die('Error : ('. $db->connect_errno .') '. $db->connect_error);
}
