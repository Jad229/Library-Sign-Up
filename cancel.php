<?php include "Connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$customerID = trim($_POST["customerId"]);
$purchaseID = trim($_POST["purchaseId"]);

confirmAlert("You are about to CANCEL this order. Are you sure you want to delete?");

$sql = "SELECT * FROM Orders
    WHERE CustomerID = $customerID AND PurchaseID = $purchaseID";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){
    $sql2 = "DELETE FROM Orders
            WHERE CustomerID = $customerID AND PurchaseID = $purchaseID";

    if ($con->query($sql2) === TRUE) {
        alert("Customer Purchase Cancelled.");

    } else {
        echo "Error: " . $sql2 . "<br>" . $con->error;
    }

} else  {
    alert("Before you cancel an order please make sure the purchase ID and customer ID are valid");
}

function alert($msg) {
    echo "<script type='text/javascript'>
        alert('$msg');
        window.location.replace('cancel.html');
    </script>";
}
function confirmAlert($msg) {
    echo "<script type='text/javascript'>
       var prompt = confirm('$msg');
       if(!prompt){
        window.relocate(update.html);
       }else {
        window.relocate(cancel.html);
       }
    </script>";
}

mysqli_close($con);

?>