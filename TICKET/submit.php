<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $route = $_POST['route'];
    $destination = $_POST['destination'];
    $travel_date = $_POST['date'];
    $departure_time = $_POST['time'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO BOOK (route, destination, travel_date, departure_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $route, $destination, $travel_date, $departure_time);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Booking information saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
