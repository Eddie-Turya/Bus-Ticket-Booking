<?php
include 'config.php';

// Get booking details from query parameters
$bus_name = isset($_GET['bus_name']) ? $_GET['bus_name'] : '';
$departure_time = isset($_GET['departure_time']) ? $_GET['departure_time'] : '';
$first_name = isset($_GET['first_name']) ? $_GET['first_name'] : '';
$last_name = isset($_GET['last_name']) ? $_GET['last_name'] : '';
$age = isset($_GET['age']) ? (int)$_GET['age'] : 0;
$sex = isset($_GET['sex']) ? $_GET['sex'] : '';
$nationality = isset($_GET['nationality']) ? $_GET['nationality'] : '';
$phone_number = isset($_GET['phone_number']) ? $_GET['phone_number'] : '';

// Validate the input
if (empty($bus_name) || empty($departure_time) || empty($first_name) || empty($last_name) || empty($sex) || empty($nationality) || empty($phone_number) || $age <= 0) {
    echo '<p>Invalid booking details.</p>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ticket</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .ticket {
            border: 2px solid #3498db;
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .ticket::before{
            content: ;
            background: url('logo.png')no-repeat center center;
            background-size: 50%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            z-index: 0;
        }

        .ticket-content{
            position: relative;
            z-index: 1;
        }

        .ticket h2 {
            color: #3498db;
        }

        .btn:hover{
            background-color: #;
        }
        @media print {
            .ticket {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">BookingSystem</div>
    </header>

    <section id="home">
        <div class="ticket">
            <h2>Booking Ticket</h2>
            <p><strong>Bus Name:</strong> <?php echo htmlspecialchars($bus_name); ?></p>
            <p><strong>Departure Time:</strong> <?php echo htmlspecialchars($departure_time); ?></p>
            <p><strong>Passenger Name:</strong> <?php echo htmlspecialchars($first_name) . ' ' . htmlspecialchars($last_name); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
            <p><strong>Sex:</strong> <?php echo htmlspecialchars($sex); ?></p>
            <p><strong>Nationality:</strong> <?php echo htmlspecialchars($nationality); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone_number); ?></p>
            <button onclick="window.print()" class="btn">Print Ticket</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 BookingSystem. All rights reserved.</p>
    </footer>
</body>
</html>
