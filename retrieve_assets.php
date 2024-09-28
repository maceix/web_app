<?php
include 'db.php'; // Include the database connection

// Fetch assets from the database
$assetQuery = "SELECT * FROM assets";
$result = $conn->query($assetQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainTech Asset Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>BrainTech Asset Management System</h1>

    <div class="asset-management">
        <h2>Asset Inventory</h2>
        <table id="inventoryTable">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Asset Type</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Entry Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display assets from the database
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['employee_name'] . "</td>";
                        echo "<td>" . $row['asset_type'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['entry_time'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No assets found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="app.js"></script>
</body>
</html>
