<html>

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

session_start();

require "db.php";

$pnr=$_POST["cancpnr"];
$uid=$_SESSION["id"];
//echo "$uid";

$sql = "UPDATE resv SET status = 'CANCELLED' WHERE pnr = ? AND id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind parameters to prevent SQL injection (assuming pnr is a string and id is an integer)
    $stmt->bind_param("si", $pnr, $uid);

    // Execute the query
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Cancellation Successful!!!";
        } else {
            echo "Cancellation Not Possible: No matching record found or already cancelled.";
        }
    } else {
        echo "<br><br>Error executing query: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Display connection error
    echo "Error preparing statement: " . $conn->error;
}

// Link to Home Page
echo " <br><br><a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";

// Close connection
$conn->close(); 
?>

</body>
</html>
