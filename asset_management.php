<?php
include 'db.php'; // Include database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $employeeName = $_POST['employeeName'];
    $assetType = $_POST['assetType'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];

    // Insert data into database
    $sql = "INSERT INTO assets (employee_name, asset_type, description, quantity, entry_time) 
            VALUES ('$employeeName', '$assetType', '$description', $quantity, NOW())";
    
    if ($conn->query($sql) === TRUE) {
        echo "New asset added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

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
        <h2>Manage Assets</h2>
        <form method="POST" action="asset_management.php">
            <label for="employeeName">Employee Name</label>
            <input type="text" id="employeeName" name="employeeName" required>

            <label for="assetType">Asset Type</label>
            <select id="assetType" name="assetType" required>
                <option value="Laptop">Laptop</option>
                <option value="Mobile Phone">Mobile Phone</option>
                <option value="Printer">Printer</option>
            </select>

            <label for="description">Description</label>
            <input type="text" id="description" name="description" required>

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" required>

            <button type="submit">Add Asset</button>
        </form>

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
