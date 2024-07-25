<?php
include 'config.php'; // Ensure this file contains your DB connection setup

// Get the route from query parameters
$route = isset($_GET['route']) ? $_GET['route'] : '';

if (empty($route)) {
    echo '<p>No route specified.</p>';
    exit();
}

// Prepare SQL statement to fetch buses based on route
$stmt = $conn->prepare("SELECT bus_name, departure_time FROM buses WHERE route = ?");
$stmt->bind_param("s", $route);
$stmt->execute();
$result = $stmt->get_result();

$buses = [];
while ($row = $result->fetch_assoc()) {
    $buses[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Buses</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .hidden {
            display: none;
        }

        .bus-list {
            display: none; /* Hidden by default, shown after loader */
            text-align: center;
            margin: 20px auto;
            padding: 10px;
            max-width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .bus-list h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .bus-list table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .bus-list th, .bus-list td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .bus-list th {
            background-color: #3498db;
            color: #fff;
        }

        .bus-list tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .bus-list tr:hover {
            background-color: #f1f1f1;
        }

        .btn-select {
            background-color: #3498db;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-select:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .bus-list {
                padding: 5px;
                margin: 10px auto;
            }

            .bus-list table {
                font-size: 14px;
            }

            .btn-select {
                padding: 6px 10px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .bus-list {
                padding: 2px;
                margin: 5px auto;
            }

            .bus-list table {
                font-size: 12px;
            }

            .btn-select {
                padding: 4px 8px;
                font-size: 10px;
            }
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
        <div class="loader-overlay" id="loader">
            <div class="loader"></div>
        </div>
        <div class="bus-list" id="bus-list">
            <h2>Available Buses for Route: <?php echo htmlspecialchars($route); ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>Bus Name</th>
                        <th>Departure Time</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buses as $bus): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bus['bus_name']); ?></td>
                            <td><?php echo htmlspecialchars($bus['departure_time']); ?></td>
                            <td>
                                <form action="booking.php" method="post">
                                    <input type="hidden" name="bus_name" value="<?php echo htmlspecialchars($bus['bus_name']); ?>">
                                    <input type="hidden" name="departure_time" value="<?php echo htmlspecialchars($bus['departure_time']); ?>">
                                    <button type="submit" class="btn-select">Select</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 BookingSystem. All rights reserved.</p>
    </footer>

    <script>
        // Show loader for 3 seconds then hide and display the bus list
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('loader').style.display = 'none'; // Hide the loader
                document.getElementById('bus-list').style.display = 'block'; // Show the bus list
            }, 3000); // 3-second delay
        });
    </script>
</body>
</html>
