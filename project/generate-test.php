<?php
// Connect to the database
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbname = 'database_name';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get a random set of problems
$num_problems = 10;  // The number of problems to show
$sql = "SELECT * FROM problems ORDER BY RAND() LIMIT $num_problems";
$result = $conn->query($sql);

// Display the problems
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Problem:</strong> " . $row["problem_text"] . "</p>";
        echo "<p><strong>Answer:</strong> " . $row["answer_text"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No problems found.";
}

// Close the database connection
$conn->close();
?>

