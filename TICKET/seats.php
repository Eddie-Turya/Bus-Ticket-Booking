<?php
include 'config.php';

$bus_name = isset($_GET['bus_name']) ? $_GET['bus_name'] : '';
if (empty($bus_name)) {
    echo '<p>No bus specified.</p>';
    exit();
}

$stmt = $conn->prepare("SELECT seat_number, status FROM seats WHERE bus_name = ?");
$stmt->bind_param("s", $bus_name);
$stmt->execute();
$result = $stmt->get_result();

$seats = [];
while ($row = $result->fetch_assoc()) {
    $seats[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Selection</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .seat-map {
            display: flex;
            flex-wrap: wrap;
            width: 300px;
            margin: 20px auto;
            text-align: center;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
        }

        .seat.available {
            background-color: #2ecc71; /* Green for available */
        }

        .seat.booked {
            background-color: #e74c3c; /* Red for booked */
            cursor: not-allowed;
        }

        .seat.selected {
            border: 2px solid #3498db; /* Blue border for selected */
        }

        .payment-form {
            margin: 20px auto;
            text-align: center;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #2980b9;
        }
    </style>
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
        <h2>Select Your Seat for <?php echo htmlspecialchars($bus_name); ?></h2>
        <div class="seat-map" id="seat-map">
            <?php foreach ($seats as $seat): ?>
                <div class="seat <?php echo $seat['status']; ?>" data-seat="<?php echo htmlspecialchars($seat['seat_number']); ?>">
                    <?php echo htmlspecialchars($seat['seat_number']); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="payment-form" id="payment-form" style="display:none;">
            <h3>Enter Your Details</h3>
            <form action="process_payment.php" method="post">
                <input type="hidden" name="bus_name" value="<?php echo htmlspecialchars($bus_name); ?>">
                <input type="hidden" name="seat_number" id="selected-seat" value="">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required><br>
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required><br>
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required><br>
                <label for="sex">Sex:</label>
                <select id="sex" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br>
                <label for="nationality">Nationality:</label>
                <select id="nationality" name="nationality" required>
                    <!-- Populate with countries -->
                    <option value="USA">United States</option>
                    <option value="CAN">Canada</option>
                    <!-- Add more countries as needed -->
                </select><br>
                <button type="submit" class="btn">Proceed to Payment</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 BookingSystem. All rights reserved.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat');
            const paymentForm = document.getElementById('payment-form');
            const selectedSeatInput = document.getElementById('selected-seat');

            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    if (this.classList.contains('booked')) {
                        alert('This seat is already booked.');
                        return;
                    }

                    seats.forEach(s => s.classList.remove('selected'));
                    this.classList.add('selected');
                    selectedSeatInput.value = this.dataset.seat;
                    paymentForm.style.display = 'block';
                });
            });
        });
    </script>
</body>
</html>
