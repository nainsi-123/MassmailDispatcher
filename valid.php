<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="background-color: aquamarine;">
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
                    <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>

                </ul>
            </div>
        </nav>
    </section>
    <h4><u>Valid Email Addresses</u></h4>
</body>

</html>
<?php
$con = mysqli_connect("localhost", "root", "");
$sql = "CREATE DATABASE emailstore";

$con->query($sql);

 /*   echo "Database created successfully";
} else {

    echo "Error creating database: " . $con->error;
}*/
$con = mysqli_connect("localhost", "root", "", "emailstore");
$sql = "CREATE TABLE emailids(
 Email VARCHAR(250) NOT NULL
 )";

$con->query($sql);

 /*   echo "Table emailids created successfully";
} else {

    echo "Error creating table: " . $con->error;
}*/
class dbconnect
{
    public $host = "localhost";
    public $user = "root";
    public $password = null;
    public $db = "csv";
    public $connect = "";
    public $command = "";
    public $db2 = "emailstore";
    public $conn = "";



    public function __construct()
    {
        $connect = new mysqli($this->host, $this->user, $this->password, $this->db);
        $conn =  new mysqli($this->host, $this->user, $this->password, $this->db2);
        $command = "SELECT * FROM csvfile";
        $result = $connect->query($command);
        /* for($i=0; $i<=$result->nums_rows; $i++)
        {
            $row = $result->fetch_assoc();
            echo $row['Email'];
            echo "<br>";
        }*/
        while ($row = $result->fetch_assoc()) {
            if (preg_match(
                "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",
                $row['Email']
            )) {
                print_r($row['Email']);
                $item = mysqli_real_escape_string($conn, $row['Email']);
                $sql = "INSERT INTO emailids(Email) VALUES('$item')";
                //$sql= "INSERT INTO emailids(Email) VALUES($row['Email'])";
                mysqli_query($conn, $sql);
                echo "<br>";
            }
            // else{
            // print_r($row['Email']);
            //echo "Invalid";
            // header("Location:fetch2.php");
            // echo "<br>";
            // }   
        }
    }
}
new dbconnect();
?>