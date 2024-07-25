<?php
include 'config.php'; // Ensure this file contains your DB connection setup

// Get bus details from POST request
$bus_name = isset($_POST['bus_name']) ? $_POST['bus_name'] : '';
$departure_time = isset($_POST['departure_time']) ? $_POST['departure_time'] : '';

// Validate the input
if (empty($bus_name) || empty($departure_time)) {
    echo '<p>Invalid request.</p>';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ticket</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            width: 90%;
            max-width: 600px; /* Reduced width */
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group select {
            height: auto; /* Adjusted height */
        }

        .btn-submit {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .btn-submit {
                padding: 8px 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .btn-submit {
                padding: 6px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Your Ticket</h1>
        <form action="process_ticket.php" method="post">
            <input type="hidden" name="bus_name" value="<?php echo htmlspecialchars($bus_name); ?>">
            <input type="hidden" name="departure_time" value="<?php echo htmlspecialchars($departure_time); ?>">
            
            <div class="form-group">
                <label for="bus_name">Bus Name</label>
                <input type="text" id="bus_name" name="bus_name" value="<?php echo htmlspecialchars($bus_name); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="departure_time">Departure Time</label>
                <input type="text" id="departure_time" name="departure_time" value="<?php echo htmlspecialchars($departure_time); ?>" readonly>
            </div>
            
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            
            <div class="form-group">
            <label for="age">Age</label>
                <select id="age" name="age" required>
                    <option value="">Select Age</option>
                    <option value="5-15">5-15</option>
                    <option value="16-35">16-35</option>
                    <option value="36-50">36-50</option>
                    <option value="50+">50+</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="sex">Sex</label>
                <select id="sex" name="sex" required>
                    <option value="">Sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number">
            </div>

            <div class="form-group">
                <label for="nationality">Nationality</label>
                <select id="nationality" name="nationality" required>
                    <?php
                    $countries = [
                        '','Tanzanian', 'East African Countries', 'Western Africa', 'Europe', 'North America', 'Asia', 'South America', 'Oceania'
        ];
            foreach ($countries as $country): ?>
                <option value="<?php echo htmlspecialchars($country); ?>"><?php echo htmlspecialchars($country); ?></option>
                <?php endforeach; ?>
        </select>
</div>
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>
</body>
</html>