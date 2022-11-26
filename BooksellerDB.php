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
         <?php
             //Makes DB connection
             $servername = "sql1.njit.edu";
             $username = "jad229";
             $password = "password123";
             $dbname = "jad229";
             $con = mysqli_connect($servername,$username,$password,$dbname);
             if (mysqli_connect_errno())
             {
               echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }

             $result = mysqli_query($con,"SELECT * FROM `Bookseller Info` ");

             echo "<table border='1'>
             <tr>
                 <th>BooksellerID</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Password</th>
                 <th>Phone Number</th>
                 <th>Email</th>
             </tr>";

             while($row = mysqli_fetch_array($result))
             {
                 echo "<tr>";
                 echo "<td>" . $row['BooksellerID'] . "</td>";
                 echo "<td>" . $row['FirstName'] . "</td>";
                 echo "<td>" . $row['LastName'] . "</td>";
                 echo "<td>" . $row['Password'] . "</td>";
                 echo "<td>" . $row['PhoneNumber'] . "</td>";
                 echo "<td>" . $row['Email'] . "</td>";
                 echo "</tr>";
             }

             echo "</table>";

             mysqli_close($con);
         ?>
     <div>
  </body>

 </html>
