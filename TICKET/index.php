<?php
include 'config.php'; // Make sure config.php contains your DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $route = $_POST['route']; // Adjusted to match form field names
    $destination = $_POST['destination'];
    $travel_date = $_POST['date'];
    $departure_time = $_POST['time'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO book (route, destination, travel_date, departure_time) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ssss", $route, $destination, $travel_date, $departure_time);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to available buses page with the selected destination
        header("Location: buses.php?route=" . urlencode($destination));
        exit();
    } else {
        echo '<div class="message-box error"><p>Error: ' . htmlspecialchars($stmt->error) . '</p></div>';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">BookingSystem</div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="home">
        <div class="hero">
            <h1>Welcome to BookingSystem</h1>
            <p>Your ultimate solution for easy and fast bookings</p>
            <a href="#book-now" class="btn">Book Now</a>
        </div>
    </section>

    <section id="book-now">
        <form action="" method="post" class="booking-form">
            <label for="route"><b>Bus Stand</b></label>
            <select id="route" name="route">
                <option value="">Select Bus Stand</option>
                <option value="arusha-bus-stand">Arusha Bus Stand</option>
                <option value="dar-es-salaam-ubungo">Dar es Salaam - Ubungo</option>
                <option value="dodoma-bus-stand">Dodoma Bus Stand</option>
                <option value="geita-bus-stand">Geita Bus Stand</option>
                <option value="iringa-bus-stand">Iringa Bus Stand</option>
                <option value="bukoba-bus-stand">Kagera - Bukoba Bus Stand</option>
                <option value="katavi-bus-stand">Katavi Bus Stand</option>
                <option value="kigoma-bus-stand">Kigoma Bus Stand</option>
                <option value="moshi-bus-stand">Kilimanjaro - Moshi Bus Stand</option>
                <option value="lindi-bus-stand">Lindi Bus Stand</option>
                <option value="babati-bus-stand">Manyara - Babati Bus Stand</option>
                <option value="musoma-bus-stand">Mara - Musoma Bus Stand</option>
                <option value="mbeya-bus-stand">Mbeya Bus Stand</option>
                <option value="mjini-magharibi-bus-stand">Mjini Magharibi Bus Stand</option>
                <option value="morogoro-bus-stand">Morogoro Bus Stand</option>
                <option value="mtwara-bus-stand">Mtwara Bus Stand</option>
                <option value="mwanza-bus-stand">Mwanza Bus Stand</option>
                <option value="njombe-bus-stand">Njombe Bus Stand</option>
                <option value="pemba-north-bus-stand">Pemba North Bus Stand</option>
                <option value="pemba-south-bus-stand">Pemba South Bus Stand</option>
                <option value="pwani-bus-stand">Pwani Bus Stand</option>
                <option value="rukwa-bus-stand">Rukwa Bus Stand</option>
                <option value="songea-bus-stand">Ruvuma - Songea Bus Stand</option>
                <option value="shinyanga-bus-stand">Shinyanga Bus Stand</option>
                <option value="simiyu-bus-stand">Simiyu Bus Stand</option>
                <option value="singida-bus-stand">Singida Bus Stand</option>
                <option value="tabora-bus-stand">Tabora Bus Stand</option>
                <option value="tanga-bus-stand">Tanga Bus Stand</option>
            </select>
            
            <label for="destination"><b>Destination</b></label>
            <select id="destination" name="destination">
            <option value="">Select Destination</option>
                <option value="arusha-bus-stand">Arusha Bus Stand</option>
                <option value="dar-es-salaam-ubungo">Dar es Salaam - Ubungo</option>
                <option value="dodoma-bus-stand">Dodoma Bus Stand</option>
                <option value="geita-bus-stand">Geita Bus Stand</option>
                <option value="iringa-bus-stand">Iringa Bus Stand</option>
                <option value="bukoba-bus-stand">Kagera - Bukoba Bus Stand</option>
                <option value="katavi-bus-stand">Katavi Bus Stand</option>
                <option value="kigoma-bus-stand">Kigoma Bus Stand</option>
                <option value="moshi-bus-stand">Kilimanjaro - Moshi Bus Stand</option>
                <option value="lindi-bus-stand">Lindi Bus Stand</option>
                <option value="babati-bus-stand">Manyara - Babati Bus Stand</option>
                <option value="musoma-bus-stand">Mara - Musoma Bus Stand</option>
                <option value="mbeya-bus-stand">Mbeya Bus Stand</option>
                <option value="morogoro-bus-stand">Morogoro Bus Stand</option>
                <option value="mtwara-bus-stand">Mtwara Bus Stand</option>
                <option value="mwanza-bus-stand">Mwanza Bus Stand</option>
                <option value="njombe-bus-stand">Njombe Bus Stand</option>
                <option value="pwani-bus-stand">Pwani Bus Stand</option>
                <option value="rukwa-bus-stand">Rukwa Bus Stand</option>
                <option value="songea-bus-stand">Ruvuma - Songea Bus Stand</option>
                <option value="shinyanga-bus-stand">Shinyanga Bus Stand</option>
                <option value="simiyu-bus-stand">Simiyu Bus Stand</option>
                <option value="singida-bus-stand">Singida Bus Stand</option>
                <option value="tabora-bus-stand">Tabora Bus Stand</option>
                <option value="tanga-bus-stand">Tanga Bus Stand</option>
            </select>
            
            <label for="date"><b>Date</b></label>
            <input type="date" id="date" name="date" required>
            
            <label for="time"><b>Departure Time</b></label>
            <input type="time" id="time" name="time" required>
            
            <button type="submit" class="btn">Check Buses</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 BookingSystem. All rights reserved.</p>
    </footer>
</body>
</html>
