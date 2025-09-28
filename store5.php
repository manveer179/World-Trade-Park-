<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks and Spencer - World Trade Park</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        #store-info {
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
            width: 300px;
            height: 300px;
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .feature-image img:hover {
            transform: scale(1.1);
        }

        .search-bar {
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .search-bar input[type="text"] {
            padding: 8px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .search-bar input[type="text"]:focus {
            border-color: green;
            outline: none;
        }

        .search-bar button {
            padding: 8px 16px;
            background-color: green;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #3b8c3b;
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

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Search products...">
        <button type="button" onclick="searchProducts()"><i class="fas fa-search"></i></button>
    </div>

    <!-- Store info -->
    <section id="store-info">
        <h2>Marks and Spencer</h2>
        <div class="feature-images">
            <div class="feature-image">
                <img src="Store5 a.jpg" alt="Marks and Spencer 1">
            </div>
            <div class="feature-image">
                <img src="Store5 b.jpg" alt="Marks and Spencer 2">
            </div>
            <div class="feature-image">
                <img src="Store5 c.jpg" alt="Marks and Spencer 3">
            </div>
        </div>
        <p>Marks and Spencer is a well-known British multinational retailer specializing in clothing, home products, and luxury food products. With a heritage dating back to 1884, Marks and Spencer has built a reputation for quality, value, and customer service.</p>
        <p>Explore our store at World Trade Park to discover a wide range of fashionable clothing, stylish home accessories, and delicious gourmet food items.</p>

        <table id="productTable">
            <thead>
                <tr>
                    <th>SNo</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity Left</th>
                </tr>
            </thead>
            <tbody>
        <?php

        // PHP code to connect to the database and fetch product data

        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $database = "store5"; // Change this to your MySQL database name

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
                echo "<td>" . $row["Product"] . "</td>";
                echo "<td>" . $row["Price"] . "</td>";
                echo "<td>" . $row["Quantity_Left"] . "</td>";
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

    <script>
        function searchProducts() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("productTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
