<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Table Columns</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";
$tableName = "students"; // Specify the table name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get column information from the table
$sql = "DESCRIBE $tableName";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<thead>"; 
    while ($row = $result->fetch_assoc()) {
        echo "<th> " . $row['Field'] . " </th>";
    }
    echo "</thead>";
} else {
    echo "Table $tableName not found or has no columns.";
}

// Close the database connection
$conn->close();
?>

</body>
</html>