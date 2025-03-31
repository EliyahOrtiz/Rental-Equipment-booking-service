<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $Password_ = $_POST['Password_'];

    
    $hashed_password = password_hash($Password_, PASSWORD_DEFAULT);

    
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "Spiderman:nowayhome1"; 
    $dbname = "rental_equipment_booking_system";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM customer WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email already exists. Please choose a different one.";
    } else {
        
        $sql = "INSERT INTO customer (username, email, Password_) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "Signup successful! You can now <a href='login.html'>login</a>.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>