<?php include "Connection.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$customerFName =  trim($_POST["fname"]);
$customerLName =  trim($_POST["lname"]);
$customerPurchase =  trim($_POST["customerPurchase"]);
$customerID = trim($_POST["id-num"]);
$timeOfPurchase = $_POST["time"];
$paymentType = trim($_POST["payment-type"]);
$orderType = trim($_POST["order-type"]);
$shippingAddress = trim($_POST["address"]);
$purchaseID = mt_rand(40,1000);
$booksPurchased = mt_rand(1,5);
$sellerID = $_SESSION['booksellerID'];

$sql = "SELECT * FROM Customers
    WHERE CustomerID = $customerID";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0){
    while($data = mysqli_fetch_assoc($result)){
        if($customerFName == $data["FirstName"] && $customerLName == $data["LastName"]){
            $purchaseSql = "INSERT INTO Purchases (CustomerPurchase, PurchaseDateTime, PaymentType, CustomerID, PurchaseID)
                               VALUES ('$customerPurchase', '$timeOfPurchase', '$paymentType', $customerID, $purchaseID)";

            if ($con->query($purchaseSql) === TRUE) {

                $orderSql = "INSERT INTO Orders (BooksPurchased, ShippingAddress, BooksellerID, CustomerID, PurchaseID)
                                           VALUES ($booksPurchased, '$shippingAddress', $_SESSION['booksellerID'], $customerID, $purchaseID)";

                if($con->query($orderSql) === TRUE){
                    alert("Customer Purchase Placed.");
                } else {
                    echo "Error: " . $orderSql . "<br>" . $con->error;
                }
            } else {
                echo "Error: " . $purchaseSql . "<br>" . $con->error;
            }
        } else {
            alert("CUSTOMER CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT.");
        }
    }

} else {
    alert("CUSTOMER CANNOT BE FOUND. RECHECK DATA ENTERED OTHERWISE YOU NEED TO CREATE AN ACCOUNT FOR CLIENT.");
}

function alert($msg) {
    echo "<script type='text/javascript'>
        alert('$msg');
        window.location.replace('purchase.html');
    </script>";
}

mysqli_close($con);

?>
