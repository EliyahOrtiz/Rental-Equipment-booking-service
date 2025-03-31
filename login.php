<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!isset($_POST['password'])) {
        die("Password field is missing in the form submission.");
    }

    $username = $_POST['username'];
    $password = $_POST['password']; 

    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "Spiderman:nowayhome1"; 
    $dbname = "rental_equipment_booking_system";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM customer WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password_'])) {
            echo "Login successful!";
            header("Location: equipment.html");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
    $conn->close();
}
?>