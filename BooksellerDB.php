<!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
     <meta charset="utf-8">
     <title>The Story Keeper Bookstore</title>
     <link rel="stylesheet" href="styles.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&family=Space+Mono&display=swap" rel="stylesheet">
     <script src="validate.js" defer></script>
     <style>
        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .table{
            margin-top: 2%;
            background-color: white;
            opacity: 0.95;
        }
        td{
           font-weight: bolder;
           width: 200px;
           font-size: 20px;
        }
        h1, button{
            background-color: beige;
            opacity: 0.95;
            padding: 10px;
            border-radius: 10px;
        }
        a{
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

     </style>

 </head>
 <body style="background-image: url('https://images.unsplash.com/photo-1627793741864-1a9ec3ef2ba0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1429&q=80'); background-repeat: no-repeat; background-size: cover;">
     <h1>The Story Keeper Bookstore</h1>
     <button><a href="directory.html">Home</a></button>
     <div class="table">
         <?php include "Connection.php";

             $sellerID = $_GET['sellerID'];

             $sql = "SELECT
                     	b.BooksellerID, b.FirstName, b.LastName, b.PhoneNumber, b.Email,
                     	o.ShippingAddress, o.CustomerID, o.PurchaseID,
                        c.FirstName, c.LastName,
                        p.CustomerPurchase, p.PurchaseDateTime, p.PaymentType
                     FROM Booksellers b
                     INNER JOIN Orders o
                     	ON o.BooksellerID = b.BooksellerID AND b.BooksellerID = $sellerID
                     INNER JOIN Customers c
                     	ON o.CustomerID = c.CustomerID
                     INNER JOIN Purchases p
                     	ON o.PurchaseID = p.PurchaseID";

             $result = mysqli_query($con,$sql);

             echo "<table border='1'>
             <tr>
                 <th>Bookseller First Name</th>
                 <th>Bookseller Last Name</th>
                 <th>Bookseller ID</th>
                 <th>Phone Number</th>
                 <th>Email</th>
                 <th>Customer First Name</th>
                 <th>Customer Last Name</th>
                 <th>Customer ID</th>
                 <th>Purchases</th>
                 <th>Purchase Date & Time</th>
                 <th>Payment Type</th>
                 <th>Shipping Address</th>
                 <th>Purchase ID</th>
             </tr>";

             while($row = mysqli_fetch_array($result))
             {
                 echo "<tr>";
                 echo "<td>" . $row[1] . "</td>";
                 echo "<td>" . $row[2] . "</td>";
                 echo "<td>" . $row['BooksellerID'] . "</td>";
                 echo "<td>" . $row['PhoneNumber'] . "</td>";
                 echo "<td>" . $row['Email'] . "</td>";
                 echo "<td>" . $row['FirstName'] . "</td>";
                 echo "<td>" . $row['LastName'] . "</td>";
                 echo "<td>" . $row['CustomerID'] . "</td>";
                 echo "<td>" . $row['CustomerPurchase'] . "</td>";
                 echo "<td>" . $row['PurchaseDateTime'] . "</td>";
                 echo "<td>" . $row['PaymentType'] . "</td>";
                 echo "<td>" . $row['ShippingAddress'] . "</td>";
                 echo "<td>" . $row['PurchaseID'] . "</td>";
                 echo "</tr>";
             }

             echo "</table>";

             mysqli_close($con);
         ?>
     <div>
  </body>

 </html>
