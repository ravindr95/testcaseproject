<?php
require_once 'connection.php';
//$id = $_GET['id'];
//require('dbconn.php');
if (isset($_POST['add_btn'])) {
  $file_upload1 = $file_upload2 = '0';
  //$path_array  = "images";
  //$path = str_replace('\\', '/', $path_array['path']);
  $path = 'C:/xampp/htdocs/testcase/admin/assets/images';
  $cname = $_POST['cname'];
  //$tmp_name1 = $_FILES['logo']['tmp_name'];
  $caddress = $_POST['caddress'];
  $gstnmbr = $_POST['gstnmbr'];
  $listofservices = $_POST['listofservices'];
  $cpname = $_POST['cpname'];
  $cpemail = $_POST['cpemail'];
  $linkedinid = $_POST['linkedinid'];
  $logo = time() . $_FILES["logo"]["name"];
  // $entry_date = $_POST['entry_date'];
  // logo
  $photo = time() . $_FILES["photo"]["name"];

  if (move_uploaded_file($_FILES["logo"]["tmp_name"], $path . "/" . $logo)) {
    $target_file = $path . $_FILES["logo"]['name'];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $imagename=basename( $_FILES['edu_certificate']['name']);

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "PNG") { ?>
      <script>
        alert("Please upload photo having extensions .jpg/.jpeg/.png");
      </script>
    <?php

    } else if ($_FILES["logo"]["size"] > 50000) { ?>
      <script>
        alert("Your photo exceed the maximum size.");
      </script>
    <?php } else {
      $file_upload1 = '1';
    }
  }

  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $path . "/" . $photo)) {
    $target_file = $path . $_FILES["photo"]['name'];
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // $imagename=basename( $_FILES['edu_certificate']['name']);

    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "PNG") { ?>
      <script>
        alert("Please upload photo having extensions .jpg/.jpeg/.png");
      </script>
    <?php

    } else if ($_FILES["photo"]["size"] > 50000) { ?>
      <script>
        alert("Your photo exceed the maximum size.");
      </script>
<?php } else {
      $file_upload2 = '1';
    }
  }


  if ($file_upload1 == '1' && $file_upload2 == '1') {
    //echo "INSERT INTO `vp_sch_vacancy20` VALUES(null,'$postname','$candidatename','$father_name','$dob','$gender','$phone','$email','$nationality','$category','$permanent_address','$percity','$perstate','$cors_address','$corscity','$corsstate','$country','$board_institue_university','$subject','$year','$percent','$remark','$Iboard_institue_university','$Isubject','$Iyear','$Ipercent','$Iremark','$gboard_institue_university','$gsubject','$gyear','$gpercent','$gremark','$oboard_institue_university','$osubject','$oyear','$opercent','$oremark','$desirable_degree','$desirable_board1','$desirable_year','$desirable_remark','$organization1'  ,'$post1','$from1','$to1','$duration1','$natureduty1','$organization2','$post2','$from2','$to2','$duration2','$natureduty2','$organization3','$post3','$from3','$to3','$duration3','$natureduty3','$organization4','$post4','$from4','$to4','$duration4','$natureduty4','$relevant_exp','$last_salary','$detail_comproject','$doc_project','$other_info','$edu_certificate','$photo','$signature','$entry_date')"; die;

    $query = "INSERT INTO `vendor`(`cname` , `logo`, `caddress`, `gstnmbr`, `listofservices`, `cpname`, `cpemail`, `linkedinid`, `photo`) VALUES ('$cname','$logo','$caddress','$gstnmbr','$listofservices','$cpname','$cpemail','$linkedinid','$photo')";
    //$query="insert into slider(name,image) values('$name','$new_img')";
    $run = mysqli_query($con, $query) or die(mysqli_error($con));
    if ($run == true) {
      echo "Your data has been submittedd";
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Add Vendor</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:powderblue;">

  <h3 class="text-center">Add Vendor</h3>

  <div class="container">

    <div class="card-body">
      <form name="add_btn" method="post" action="" enctype="multipart/form-data">
        <div class="form-group">

          <label for="cname">Company Name</label>
          <input type="text" id="cname" class="form-control" name="cname" placeholder="Name" required="required" autofocus="autofocus">


        </div>
        <div class="form-group col-sm-5">

          <label for="logo">logo</label>
          <input type="file" id="logo" class="form-control" name="logo" accept="image/jpeg, image/png, image/svg+xml" required autofocus="autofocus">


        </div>
        <div class="form-group">

          <label for="caddress">Address</label>
          <input type="text" id="caddress" class="form-control" name="caddress" placeholder="Company Adress" required="required" autofocus="autofocus">

        </div>
        <div class="form-group">

          <label for="gstnmbr">GST Number</label>
          <input type="text" id="gstnmbr" class="form-control" name="gstnmbr" placeholder="GST Number" required="required" autofocus="autofocus">

        </div>
    </div>
    <div class="form-group col-sm-6">


      <label for="listofservices">list of services offered:</label>
      <select name="listofservices" id="listofservices">
        <option value="Computer Repair">Computer Repair</option>
        <option value="laptop Repair">laptop Repair </option>

      </select>
    </div>
    Contact Person Detalis
    <div class="form-group ">

      <label for="cpname">Name</label>
      <input type="text" id="cpname" class="form-control" name="cpname" placeholder="Name" required="required" autofocus="autofocus">

      <label for="cpemail">Email</label>
      <input type="email" id="cpemail" class="form-control" name="cpemail" placeholder="Email" required="required" autofocus="autofocus">

      <label for="linkedinid">linkedin id</label>
      <input type="text" id="linkedinid" class="form-control" name="linkedinid" placeholder="linkedin id" required="required" autofocus="autofocus">
      <label for="photo">Photo</label>
      <input type="file" id="photo" class="form-control" name="photo" placeholder="" accept="image/jpeg, image/png, image/svg+xml" required="required" autofocus="autofocus">
    </div>
  </div>
  </div>
  <input type="submit" class="btn btn-primary btn-block" name="add_btn" value="Add">
  </form>

  </div>
  </div>
  </div>
  </div>
</body>

</html>