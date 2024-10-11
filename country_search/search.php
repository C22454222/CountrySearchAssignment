<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost"; // The server where the database is hosted
$username = "root";        // The username for the database
$password = "";            // The password for the database (empty in this case)
$dbname = "country_search"; // The name of the database

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    // If connection fails, stop the script and display an error message
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term from the GET parameters
// If no search term is provided, use an empty string
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Prepare the SQL statement
// This statement will search for countries whose names are similar to the search term
$sql = "SELECT name FROM countries WHERE name LIKE ?";
$stmt = $conn->prepare($sql);

// Bind the search parameter to the prepared statement
// The '%' wildcards allow for partial matches before and after the search term
$searchParam = "%" . $searchTerm . "%";
$stmt->bind_param("s", $searchParam);

// Execute the prepared statement
$stmt->execute();

// Get the result set from the executed statement
$result = $stmt->get_result();

// Initialize an array to store the matching countries
$countries = [];

// Fetch each row from the result set
while ($row = $result->fetch_assoc()) {
    // Add the country name to the array of matches
    $countries[] = $row['name'];
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Set the response header to indicate that we're sending JSON
header('Content-Type: application/json');

// Convert the array of countries to JSON and output it
echo json_encode($countries);