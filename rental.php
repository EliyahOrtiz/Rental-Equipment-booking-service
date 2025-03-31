<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $equipment_id = $_POST['equipment_id'];
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];

    
    if(empty($equipment_id) || empty($rental_date)) {
        echo "Error! Please enter all fields.";
    } else {

       
        $equipment_information = "Equipment ID: $equipment_id\nRental Date: $rental_date\nReturn Date: $return_date\n\n";

        
        $textfile = fopen("Equipment_log.txt", "a");

        if ($textfile) {
           
            fwrite($textfile, $equipment_information);
            fclose($textfile);  
            echo "Your Booking was successful! Thank you for using our services.";
        } else {
            echo "Error, please try again.";
        }
    }
}
?>





