<?php include "Connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$customerFName =  trim($_POST["fname"]);
$customerLName =  trim($_POST["lname"]);
$customerPurchase =  trim($_POST["customerPurchase"]);
$customerID = trim($_POST["id"]);
$timeOfPurchase = $_POST["time"];
$paymentType = trim($_POST["payment-type"]);
$orderType = trim($_POST["order-type"]);
$shippingAddress = trim($_POST["address"]);


$sql = "SELECT * FROM Customers
    WHERE CustomerID = $customerID";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){
    while($data = mysqli_fetch_assoc($result)){
        if($customerFName == $data["FirstName"] && $customerLName == $data["LastName"]){
            $sql2 = "INSERT INTO Purchases (CustomerPurchase, PurchaseDateTime, PaymentType, CustomerID)
                               VALUES ('$customerPurchase', '$timeOfPurchase', '$paymentType', $customerID)";

            if ($con->query($sql2) === TRUE) {
                alert("Customer Purchase Placed.");
            } else {
                echo "Error: " . $sql2 . "<br>" . $con->error;
            }
//             alert("Customer Purchase Placed.");
        }
    }
} else {
    alert("CUSTOMER CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT.");
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

mysqli_close($con);

?>