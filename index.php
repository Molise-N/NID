<?php include'config/database.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>NID emulator</title>
</head>
<body>
  <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">

            <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                <div class="card-body p-5 text-center">
        
                <h3 class="mb-5">NID Emulator</h3>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="number" id="id_number" name="id_number" class="form-control form-control-lg" />
                    <label class="form-label" for="FirstName"> id_number</label>
                </div>
    
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="name" name="name" class="form-control form-control-lg" />
                    <label class="form-label" for="FirstName"> Name</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="date" id="Birthday" name="Birthday" class="form-control form-control-lg" />
                    <label class="form-label" for="Birthday">Birthday</label>
                </div>

                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" id="Residence" name="Residence" class="form-control form-control-lg" />
                    <label class="form-label" for="Residence">Residence</label>
                </div>
    
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Add a new person</button>
    
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
<?php
if (isset($_POST['name'])) {
    $id_number = stripslashes($_REQUEST['id_number']);
    $id_number = mysqli_real_escape_string($conn, $id_number);
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($conn, $name);
    $Birthday = stripslashes($_REQUEST['Birthday']);
    $Birthday = mysqli_real_escape_string($conn, $Birthday);
    $Residence = stripslashes($_REQUEST['Residence']);
    $Residence = mysqli_real_escape_string($conn, $Residence);
    

    $query = "INSERT into `user` (id_number,name, Birthday, Residence)
            VALUES ('$id_number','$name', '$Birthday', '$Residence')";
        $result = mysqli_query($conn, $query);
        if ($result) {
        echo "<script>alert('you have sucessfully added a new person in the system')</script>";
        } else {
        echo "<div class='form'>
            <h3>Required fieldsusers are missing.</h3><br/>
            <p class='link'>Click here to <a href='index.php'>add another person</a> again.</p>
            </div>";
     }

}
