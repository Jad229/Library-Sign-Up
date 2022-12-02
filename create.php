<?php include "Connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$firstName = trim($_POST["first-name"]);
$lastName = trim($_POST["last-name"]);
$customerID = trim($_POST["id-num"]);

$sql = "SELECT * FROM Customers
    WHERE CustomerID = $customerID
    AND FirstName = $firstName
    AND LastName = $lastName";

$result = mysqli_query($con, $sql);

if(!mysqli_num_rows($result) > 0){
    $sql2 = "INSERT INTO Customers (CustomerID, FirstName, LastName)
                VALUES ($customerID, '$firstName', '$lastName')";

    if ($con->query($sql2) === TRUE) {
        alert("Customer Account Created.");

    } else {
        echo "Error: " . $sql2 . "<br>" . $con->error;
    }

} else  {
    alert("Customer Account already exist please review the information.");
}

function alert($msg) {
    echo "<script type='text/javascript'>
        alert('$msg');
        window.location.replace('create.html');
    </script>";
}
function confirmAlert($msg) {
    echo "<script type='text/javascript'>
       var prompt = confirm('$msg');
       if(!prompt){
        window.relocate(create.html);
       }else {
        window.relocate(create.html);
       }
    </script>";
}

mysqli_close($con);

?>