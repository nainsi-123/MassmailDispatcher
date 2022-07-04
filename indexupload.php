<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>FileUpload</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/upload.css">

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
  <!--Navbar-->
  <section class="Login" id="title">
    <nav class="navbar bg-dark navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="aftlogin.php">ExposysDataLabs</a>
      <!--Not Working-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="home.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
        </ul>
      </div>
    </nav>
    <form action="insertdb2.php" method="POST" enctype="multipart/form-data">
      <div class="form-group file">
        <label for="exampleFormControlFile1">
          <h5>Upload your file here</h5>
        </label>
        <br>
        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        <br>
        <button type="submit" name="submit">Upload</button>
      </div>
    </form>
</body>

</html>