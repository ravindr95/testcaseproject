<?php

header("Content-Type: text/html; charset=ISO-8859-1");
//$id = $_GET['id'];
?>
<a href="home.php?page=addvendor"><span class="btn btn-primary">Add Vendor</span></a>
<hr>
<table border="1" style="border-collapse: collapse;" width="100%">
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
    require('connection.php');
    //echo $id = $_GET['id'];
    $query = "select * from vendor";

    $run = mysqli_query($con, $query) or die(mysqli_error($con));
    $a = 1;
    if ($run == true) {
        while ($data = mysqli_fetch_assoc($run)) {
    ?>
            <tr>
                <td><?= $a++; ?></td>
                <td><?= $data['cname']; ?></td>
                <td><img src="assets/images/<?= $data['logo']; ?>" width="80"></td>
                <td><?= $data['caddress']; ?></td>
                <td><?= $data['gstnmbr']; ?></td>
                <td><?= $data['listofservices']; ?></td>
                <td><?= $data['cpname']; ?></td>
                <td><?= $data['cpemail']; ?></td>
                <td><?= $data['linkedinid']; ?></td>
                <td><img src="assets/images/<?= $data['photo']; ?>" width="80"></td>


                <!--		<td><a href="editslider.php?id=<?= $data['id']; ?>"><span class="btn btn-warning">Edit</span></a></td>
			<td><a href="deleteslider.php?id=<?= $data['id']; ?>&image=<?= $data['image']; ?>"><span class="btn btn-danger">Delete</span></a></td>
    -->
            </tr>
    <?php
        }
    }
    ?>
</table>