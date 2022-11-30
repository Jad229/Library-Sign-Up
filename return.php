<?php include "Connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$customerID = trim($_POST["customerId"]);
$purchaseID = trim($_POST["purchaseId"]);

$sql = "SELECT * FROM Orders
    WHERE CustomerID = $customerID AND PurchaseID = $purchaseID";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){
    $sql2 = "DELETE FROM Purchases
            WHERE CustomerID = $customerID AND PurchaseID = $purchaseID";
    if ($con->query($sql2) === TRUE) {
        alert("Customer Purchase Returned.");
    } else {
        echo "Error: " . $sql2 . "<br>" . $con->error;
    }

} else  {
    confirmAlert("Before you return an item please make sure the item was purchased from the store. Was it purchased from The Story Keeper Book Store? If not we cannot accept the return");
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function confirmAlert($msg) {
    echo "<script type='text/javascript'>confirm('$msg');</script>";
}

mysqli_close($con);

?>