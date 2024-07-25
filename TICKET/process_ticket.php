<?php
include 'config.php'; // Ensure this file contains your DB connection setup

// Get booking details from POST request
$bus_name = isset($_POST['bus_name']) ? $_POST['bus_name'] : '';
$departure_time = isset($_POST['departure_time']) ? $_POST['departure_time'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
$nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';
$phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : ''; // Added phone number

// Validate the input
if (empty($bus_name) || empty($departure_time) || empty($first_name) || empty($last_name) || empty($sex) || empty($nationality) || empty($phone_number) || $age <= 0) {
    echo '<p>Invalid input. Please check your details and try again.</p>';
    exit();
}

// Prepare SQL statement to insert data into the tickets table
$stmt = $conn->prepare("INSERT INTO tickets (bus_name, departure_time, first_name, last_name, age, sex, phone_number, nationality) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisss", $bus_name, $departure_time, $first_name, $last_name, $age, $sex, $phone_number, $nationality);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo '<p>Booking successful! Thank you for your reservation.</p>';
    echo '<p><a href="generate_ticket.php?bus_name=' . urlencode($bus_name) . '&departure_time=' . urlencode($departure_time) . '&first_name=' . urlencode($first_name) . '&last_name=' . urlencode($last_name) . '&age=' . urlencode($age) . '&sex=' . urlencode($sex) . '&nationality=' . urlencode($nationality) . '&phone_number=' . urlencode($phone_number) . '" class="btn">Print Ticket</a></p>';
} else {
    echo '<p>Error: ' . $stmt->error . '</p>';
}

$stmt->close();
$conn->close();
?>
