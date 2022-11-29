<?php include "Connection.php";

    $sellerFName = mysqli_real_escape_string($con, $_POST["fname"]);
    $sellerLName = mysqli_real_escape_string($con, $_POST["lname"]);
    $sellerPassword = mysqli_real_escape_string($con, $_POST["password"]);
    $sellerID = mysqli_real_escape_string($con, $_POST["id"]);
    $sellerPhoneNum = mysqli_real_escape_string($con, $_POST["phonenumber"]);
    $transactionType = $_POST["transactionType"];

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
                    header("Location: purchase.html");
                    exit();
                } else if($transactionType === "4") {
                   header("Location: purchase.html");
                   exit();
                } else if($transactionType === "5") {
                   header("Location: purchase.html");
                   exit();
                } else if($transactionType === "6") {
                   header("Location: purchase.html");
                   exit();
                } else if($transactionType === "7") {
                   header("Location: purchase.html");
                   exit();
                } else {
                   echo "No matching records found!";
                }
            }
        }
    }

    mysqli_close($con);

?>