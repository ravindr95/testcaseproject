<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #3DE;
        }

        header {
            background-color: #3DE;
            color: #fff;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
        }

        nav {
            background-color: #3DE;
            padding: 10px;
            box-sizing: border-box;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }

        aside {
            width: 200px;
            background-color: #3DE;
            color: #fff;
            padding: 10px;
            box-sizing: border-box;
        }


        nav ul {
            list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;

        }

        .search-criteria {
            margin-bottom: 15px;
        }

        .search-criteria label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .search-criteria input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .search-criteria button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-criteria button:hover {
            background-color: #45a049;
        }

        .vendor-thumbnail {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            display: flex;
            align-items: center;
        }

        .vendor-thumbnail img {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

section {
    flex: 0;
    display: inline-flex;
    justify-content: center;
    column-fill: auto;

}



    </style>
</head>
<body>
<header>
        <h1>Welcome</h1>
        <form action="#" method="get">
            <input type="text" name="search" placeholder="Search">
            <button type="submit">Search</button>
        </form>
    </header>

    <nav class="background-color: #3DE;
            padding: 10px;
            box-sizing: border-box;">
        <ul>
            <?php
// Define top menu items
$topMenuItems = [
    'Home' => 'index.php',
    'About' => 'about.php',
    'Services' => 'services.php',
    'Contact' => 'contact.php',
];

// Generate top menu links
foreach ($topMenuItems as $label => $url) {
    echo "<li><a href=\"$url\">$label</a></li>";
}
?>
        </ul>
    </nav>
    <section>
        <aside>

        <form action="" method="post">
    <label for="cname">Vendor Name:</label>
    <input type="text" id="cname" name="cname" placeholder="Enter vendor name">

    <label for="listofservices">Services Offered:</label>
    <input type="text" id="listofservices" name="listofservices" placeholder="Enter services offered">

    <button type="submit">Search</button>
</form>

<h3>Results:</h3>
            <!-- Display search results here -->
        </aside>


        <?php
include "connection.php";
// Create connection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$cname = isset($_POST['cname']) ? $_POST['cname'] : '';
$listofservices = isset($_GET['listofservices']) ? $_GET['listofservices'] : '';

// SQL query to select vendor lists based on search criteria
$sql = "SELECT cname, logo FROM vendor WHERE
        cname LIKE '%$cname%' AND
        listofservices LIKE '%$listofservices%' limit 1 ";

$result = $con->query($sql);

// Check if the query was successful
if ($result === false) {
    die("Error executing the query: " . $con->error);
}

// Fetch and display the results
while ($row = $result->fetch_assoc()) {
    echo "<div class=\"vendor-thumbnail\">";
    //'photo' = 'assets/images'
    echo "<img src=\"assets/images/{$row['logo']}\">";
    echo "<div>";
    echo "<h4>{$row['cname']}</h4>";
    // echo "<p>{$row['listofservices']}</p>";
    //echo "<p>Phone: {$row['phone']}</p>";
    echo "</div>";
    echo "</div>";
}
}
// Close the connection
$con->close();
?>

<div class="container"> 
        <nav>
            <h1>Vendor lists</h1>

<?php

//header("Content-Type: text/html; charset=ISO-8859-1");
//$id = $_GET['id'];
?>
<table border="1" style="border-collapse: collapse;">
	<tr>

        <th>Sr no</th>
		<th>Vendor Name</th>
		<th>Company logo</th>
        <th>Address</th>
        <th>GST Number</th>
        <th>List of services offered</th>
        <th>Name</th>
        <th>Email</th>
        <th>linkedin id</th>
        <th>Photo</th>

	</tr>
<?php
require 'connection.php';
//echo $id = $_GET['id'];
$query = "select * from vendor";

$run = mysqli_query($con, $query) or die(mysqli_error($con));
$a = 1;
if ($run == true) {
    while ($data = mysqli_fetch_assoc($run)) {
        ?>
		<tr>
			<td><?=$a++;?></td>
			<td><?=$data['cname'];?></td>
            <td><img src="assets/images/<?=$data['logo'];?>" width="80"></td>
            <td><?=$data['caddress'];?></td>
            <td><?=$data['gstnmbr'];?></td>
            <td><?=$data['listofservices'];?></td>
            <td><?=$data['cpname'];?></td>
            <td><?=$data['cpemail'];?></td>
            <td><?=$data['linkedinid'];?></td>
            <td><img src="assets/images/<?=$data['photo'];?>" width="80"></td>


	<!--		<td><a href="editslider.php?id=<?=$data['id'];?>"><span class="btn btn-warning">Edit</span></a></td>
			<td><a href="deleteslider.php?id=<?=$data['id'];?>&image=<?=$data['image'];?>"><span class="btn btn-danger">Delete</span></a></td>
    --></tr>
		<?php
}
}
?>
</table>
        </nav>
        </div>
        </section>

    <script>
        function searchVendors() {
            // Implement search logic here and display results in the designated area
            alert('Searching vendors...');
        }
    </script>
<section>
        <h5>copyright@2023</h5>

</section>

</body>
</html>
