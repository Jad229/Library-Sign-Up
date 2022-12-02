<?php include "Connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$customerID = trim($_POST["customerId"]);
$purchaseID = trim($_POST["purchaseId"]);
$updatedOrder = trim($_POST["updatedOrder"]);


$sql = "SELECT * FROM Purchases
    WHERE CustomerID = $customerID AND PurchaseID = $purchaseID";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){

    while($data = mysqli_fetch_assoc($result)){

        if($data["PaymentType"] === "Credit"){
            $sql2 = "UPDATE Purchases SET CustomerPurchase = '$updatedOrder' WHERE PurchaseID = $purchaseID";

            if ($con->query($sql2) === TRUE) {
                alert("Customer Online Purchase Updated.");

            } else {
                echo "Error: " . $sql2 . "<br>" . $con->error;
            }
        } else{
            alert("Only online orders can be updated");
        }

    }


} else  {
    alert("Purchase ID does not exist for the customer. Please Check and Re-enter Purchase ID");
}

function alert($msg) {
    echo "<script type='text/javascript'>
        alert('$msg');
        window.location.replace('update.html');
    </script>";
}

function confirmAlert($msg) {
    echo "<script type='text/javascript'>confirm('$msg');</script>";
}

mysqli_close($con);

?>