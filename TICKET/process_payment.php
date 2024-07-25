<?php
include 'config.php';

$bus_name = isset($_POST['bus_name']) ? $_POST['bus_name'] : '';
$seat_number = isset($_POST['seat_number']) ? $_POST['seat_number'] : '';
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
$nationality = isset($_POST['nationality']) ? $_POST['nationality'] : '';

// Validate input
if (empty($bus_name) || empty($seat_number) || empty($first_name) || empty($last_name) || empty($sex) || empty($nationality) || $age <= 0) {
    echo '<p>Invalid input.</p>';
    exit();
}

// Mark seat as booked
$stmt = $conn->prepare("UPDATE seats SET status = 'booked' WHERE bus_name = ? AND seat_number = ?");
$stmt->bind_param("ss", $bus_name, $seat_number);
$stmt->execute();

$stmt = $conn->prepare("INSERT INTO tickets (bus_name, seat_number, first_name, last_name, age, sex, nationality) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssiss", $bus_name, $seat_number, $first_name, $last_name, $age, $sex, $nationality);

if ($stmt->execute()) {
    echo '<p>Payment successful! Print your ticket below:</p>';
    // Display ticket
    echo '<div class="ticket">';
    echo '<h2>Booking Ticket</h2>';
    echo '<p><strong>Bus Name:</strong> ' . htmlspecialchars($bus_name) . '</p>';
    echo '<p><strong>Seat Number:</strong> ' . htmlspecialchars($seat_number) . '</p>';
    echo '<p><strong>Passenger Name:</strong> ' . htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name) . '</p>';
    echo '<p><strong>Age:</strong> ' . htmlspecialchars($age) . '</p>';
    echo '<p><strong>Sex:</strong> ' . htmlspecialchars($sex) . '</p>';
    echo '<p><strong>Nationality:</strong> ' . htmlspecialchars($nationality) . '</p>';
    echo '</div>';
    echo '<button onclick="window.print()" class="btn">Print Ticket</button>';
} else {
    echo '<p>Error: ' . $stmt->error . '</p>';
}

$stmt->close();
$conn->close();
?>
