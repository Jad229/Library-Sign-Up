<?php include "Connection.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $sellerFName = mysqli_real_escape_string($con, $_POST["fname"]);
    $sellerLName = mysqli_real_escape_string($con, $_POST["lname"]);
    $sellerPassword = mysqli_real_escape_string($con, $_POST["password"]);
    $sellerID = mysqli_real_escape_string($con, $_POST["id"]);
    $sellerPhoneNum = mysqli_real_escape_string($con, $_POST["phonenumber"]);
    $transactionType = isset($_POST["transactionType"]);

    $sql = "SELECT * FROM Booksellers
    WHERE BooksellerID = $sellerID";

   $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            if($sellerPassword == $data["Password"] && $sellerFName["FirstName"]
            && $sellerLName == $data["LastName"] && $sellerPhoneNum == $data["PhoneNumber"]){
                echo "<p>You chose: $transactionType</p>";
                header("Location: BooksellerDB.php?sellerID=$sellerID");
                die();
            } else {
                echo "<p> No matching records found </p>";
            }
        }
    }

    mysqli_close($con);

?>