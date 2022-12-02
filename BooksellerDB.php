<!DOCTYPE html>
 <html lang="en" dir="ltr">

 <head>
     <meta charset="utf-8">
     <title>The Story Keeper Bookstore</title>
     <link rel="stylesheet" href="css/styles.css">
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
 <body>
      <h1>The Story Keeper Bookstore</h1>
      <nav>
          <a href="login.html"><button>Search Bookseller Records</button></a>
          <a href="purchase.html"><button>Customer Purchase/Order</button></a>
          <a href="return.html"><button>Customer Returns</button></a>
          <a href="update.html"><button>Update Customer Order</button></a>
          <a href="cancel.html"><button>Cancel Customer Order</button></a>
          <a href="create.html"><button>Create Customer Account</button></a>
      </nav>
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
                           ON o.BooksellerID = b.BooksellerID
                       INNER JOIN Customers c
                           ON o.CustomerID = c.CustomerID
                       INNER JOIN Purchases p
                           ON o.CustomerID = p.CustomerID
                       Where b.BooksellerID = $sellerID";



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
