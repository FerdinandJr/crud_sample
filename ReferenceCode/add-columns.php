<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get table name and column details from the form
    $tableName = $_POST['table_name'];
    $columnName = $_POST['column_name'];
    $columnType = $_POST['column_type'];

    // Define the SQL query to add a column to the table
    $sql = "ALTER TABLE $tableName ADD COLUMN $columnName $columnType";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Column added successfully";
    } else {
        echo "Error adding column: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<h2>Add Column to Table</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Table Name: <input type="text" name="table_name" required><br>
    Column Name: <input type="text" name="column_name" required><br>
    Column Type: <input type="text" name="column_type" required><br>
    <input type="submit" value="Add Column">
</form>

</body>
</html>