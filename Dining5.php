<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Chocolate Room - World Trade Park</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: green;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            text-transform: uppercase;
        }

        nav {
            background-color: #817c7c;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: black;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: yellowgreen;
        }

        footer {
            background-color: green;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        #restaurant-info {
            padding: 20px;
            text-align: center;
            flex: 1;
        }

        h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .restaurant-image {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .restaurant-image img {
            width: 300px;
            height: 300px;
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .restaurant-image img:hover {
            transform: scale(1.1);
        }

        .feature-images {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .feature-image {
            max-width: 300px;
            margin: 0 10px;
        }

        .feature-image img {
            height: 250px;
            width: 250px;
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature-image img:hover {
            transform: scale(1.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <header>
        Welcome to World Trade Park
    </header>

    <nav id="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="store.html">Store</a></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="dining.html">Dining</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>

    <!-- Restaurant info -->
    <section id="restaurant-info">
        <h2>The Chocolate Room</h2>
        <div class="restaurant-image">
            <img src="The Chocolate Room.jpg" alt="The Chocolate Room">
        </div>
        <p>The Chocolate Room is a paradise for chocolate lovers, offering a delectable range of chocolate-based desserts,
            beverages, and snacks. From rich and creamy hot chocolates to indulgent chocolate fondues, The Chocolate Room
            promises an unforgettable chocolate experience.</p>

        <h3>Feature Images</h3>
        <div class="feature-images">
            <div class="feature-image">
                <img src="Dining5 a.jpg" alt="TCR 1">
            </div>
            <div class="feature-image">
                <img src="Dining5 b.jpg" alt="TCR 2">
            </div>
            <div class="feature-image">
                <img src="Dining5 c.jpg" alt="TCR 3">
            </div>
        </div>

        <h3>Product Catalogue</h3>
        <table id="productTable">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>Food</th>
                    <th>Price</th>
                   
                </tr>
            </thead>
            <tbody>
        <?php
        // PHP code to connect to the database and fetch product data
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $database = "dining5"; // Change this to your MySQL database name

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["SNo"] . "</td>";
                echo "<td>" . $row["Food"] . "</td>";
                echo "<td>" . $row["Price"] . "</td>";
              
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No products available</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
        </table>
    </section>

    <footer>
        &copy; 2024 World Trade Park. All rights reserved.
    </footer>
</body>

</html>
