<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include('reusable/nav.php'); ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 mt-5 mb-5">Update</h1>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
      include('reusable/connect.php');
      if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $query = "SELECT * FROM schools WHERE id=$id";
        $result = mysqli_query($connect, $query);
        $school = $result->fetch_assoc();
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $schoolName = mysqli_real_escape_string($connect, $_POST['schoolName'] ?? '');
        $schoolLevel = mysqli_real_escape_string($connect, $_POST['schoolLevel'] ?? '');
        $phone = mysqli_real_escape_string($connect, $_POST['phone'] ?? '');
        $email = mysqli_real_escape_string($connect, $_POST['email'] ?? '');

        $boardName = mysqli_real_escape_string($connect, $_POST['boardName'] ?? '');
        $schoolNumber = mysqli_real_escape_string($connect, $_POST['schoolNumber'] ?? '');
        $schoolLanguage = mysqli_real_escape_string($connect, $_POST['schoolLanguage'] ?? '');
        $schoolType = mysqli_real_escape_string($connect, $_POST['schoolType'] ?? '');
        $schoolSpecialConditions = mysqli_real_escape_string($connect, $_POST['schoolSpecialConditions'] ?? '');
        $street = mysqli_real_escape_string($connect, $_POST['street'] ?? '');
        $city = mysqli_real_escape_string($connect, $_POST['city'] ?? '');
        $province = mysqli_real_escape_string($connect, $_POST['province'] ?? '');
        $postalCode = mysqli_real_escape_string($connect, $_POST['postalCode'] ?? '');
        $fax = mysqli_real_escape_string($connect, $_POST['fax'] ?? '');
        $gradeRange = mysqli_real_escape_string($connect, $_POST['gradeRange'] ?? '');
        $dateOpen = mysqli_real_escape_string($connect, $_POST['dateOpen'] ?? '');
        $website = mysqli_real_escape_string($connect, $_POST['website'] ?? '');
        $boardWebsite = mysqli_real_escape_string($connect, $_POST['boardWebsite'] ?? '');

        $query = "UPDATE schools SET 
          `Board Name`='$boardName',
          `School Number`='$schoolNumber',
          `School Name`='$schoolName',
          `School Level`='$schoolLevel',
          `School Language`='$schoolLanguage',
          `School Type`='$schoolType',
          `School Special Conditions`='$schoolSpecialConditions',
          `Street`='$street',
          `City`='$city',
          `Province`='$province',
          `Postal Code`='$postalCode',
          `Phone`='$phone',
          `Fax`='$fax',
          `Grade Range`='$gradeRange',
          `Date Open`='$dateOpen',
          `Email`='$email',
          `Website`='$website',
          `Board Website`='$boardWebsite'
        WHERE id=$id";
        $result = mysqli_query($connect, $query);

        if($result){
          header("Location: index.php"); 
          exit;
        }else{
          echo "Failed: " . mysqli_error($connect);
        }
    }
  ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="updateSchool.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $school['id'] ?>">
            <div class="mb-3">
              <label for="schoolName" class="form-label">School Name</label>
              <input type="text" class="form-control" id="schoolName" name="schoolName" value="<?php echo $school['School Name'] ?>">
            </div>
            <div class="mb-3">
              <label for="schoolLevel" class="form-label">School Level</label>
              <input type="text" class="form-control" id="schoolLevel" name="schoolLevel" value="<?php echo $school['School Level'] ?>">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $school['Phone'] ?>">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $school['Email'] ?>">
            </div>

            <div class="mb-3">
              <label for="boardName" class="form-label">Board Name</label>
              <input type="text" class="form-control" id="boardName" name="boardName" value="<?php echo $school['Board Name'] ?>">
            </div>
            <div class="mb-3">
              <label for="schoolNumber" class="form-label">School Number</label>
              <input type="text" class="form-control" id="schoolNumber" name="schoolNumber" value="<?php echo $school['School Number'] ?>">
            </div>
            <div class="mb-3">
              <label for="schoolLanguage" class="form-label">School Language</label>
              <input type="text" class="form-control" id="schoolLanguage" name="schoolLanguage" value="<?php echo $school['School Language'] ?>">
            </div>
            <div class="mb-3">
              <label for="schoolType" class="form-label">School Type</label>
              <input type="text" class="form-control" id="schoolType" name="schoolType" value="<?php echo $school['School Type'] ?>">
            </div>
            <div class="mb-3">
              <label for="schoolSpecialConditions" class="form-label">School Special Conditions</label>
              <input type="text" class="form-control" id="schoolSpecialConditions" name="schoolSpecialConditions" value="<?php echo $school['School Special Conditions'] ?>">
            </div>

            <div class="mb-3">
              <label for="street" class="form-label">Street</label>
              <input type="text" class="form-control" id="street" name="street" value="<?php echo $school['Street'] ?>">
            </div>
            <div class="mb-3">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" value="<?php echo $school['City'] ?>">
            </div>
            <div class="mb-3">
              <label for="province" class="form-label">Province</label>
              <input type="text" class="form-control" id="province" name="province" value="<?php echo $school['Province'] ?>">
            </div>
            <div class="mb-3">
              <label for="postalCode" class="form-label">Postal Code</label>
              <input type="text" class="form-control" id="postalCode" name="postalCode" value="<?php echo $school['Postal Code'] ?>">
            </div>

            <div class="mb-3">
              <label for="fax" class="form-label">Fax</label>
              <input type="text" class="form-control" id="fax" name="fax" value="<?php echo $school['Fax'] ?>">
            </div>
            <div class="mb-3">
              <label for="gradeRange" class="form-label">Grade Range</label>
              <input type="text" class="form-control" id="gradeRange" name="gradeRange" value="<?php echo $school['Grade Range'] ?>">
            </div>
            <div class="mb-3">
              <label for="dateOpen" class="form-label">Date Open</label>
              <input type="date" class="form-control" id="dateOpen" name="dateOpen" value="<?php echo $school['Date Open'] ?>">
            </div>

            <div class="mb-3">
              <label for="website" class="form-label">Website</label>
              <input type="url" class="form-control" id="website" name="website" value="<?php echo $school['Website'] ?>">
            </div>
            <div class="mb-3">
              <label for="boardWebsite" class="form-label">Board Website</label>
              <input type="url" class="form-control" id="boardWebsite" name="boardWebsite" value="<?php echo $school['Board Website'] ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="updateSchool">Update School</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>