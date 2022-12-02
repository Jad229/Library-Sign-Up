<?php include "Connection.php";

    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $sellerFName = mysqli_real_escape_string($con, $_POST["fname"]);
    $sellerLName = mysqli_real_escape_string($con, $_POST["lname"]);
    $sellerPassword = mysqli_real_escape_string($con, $_POST["password"]);
    $sellerID = mysqli_real_escape_string($con, $_POST["id-num"]);
    $sellerPhoneNum = mysqli_real_escape_string($con, $_POST["phonenumber"]);
    $transactionType = $_POST["transactionType"];

    $_SESSION["booksellerID"] = $sellerID;

    $sql = "SELECT * FROM Booksellers
    WHERE BooksellerID = $sellerID";

   $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            if($sellerPassword == $data["Password"] && $sellerFName == $data["FirstName"]
            && $sellerLName == $data["LastName"] && $sellerPhoneNum == $data["PhoneNumber"])
            {
                if($transactionType === "1")
                {
                    header("Location: BooksellerDB.php?sellerID=$sellerID");
                    exit();
                } else if($transactionType === "2"){
                    header("Location: purchase.html");
                    exit();
                } else if($transactionType === "3") {
                    header("Location: return.html");
                    exit();
                } else if($transactionType === "4") {
                   header("Location: update.html");
                   exit();
                } else if($transactionType === "5") {
                   header("Location: cancel.html");
                   exit();
                } else if($transactionType === "6") {
                   header("Location: create.html");
                   exit();
                }
            } else {
                echo "No matching records found!";
            }
        }
    }

    mysqli_close($con);

?>