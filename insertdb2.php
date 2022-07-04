<?php
$conn = mysqli_connect("localhost", "root", "");
$sql = "CREATE DATABASE csv";

if ($conn->query($sql) === TRUE) {

    echo "Database created successfully <html><br></html>";
    
} else {

    echo "Error creating database: " . $conn->error;
}
$conn = mysqli_connect("localhost", "root", "", "csv");
$sql = "CREATE TABLE csvfile(
    Email VARCHAR(250) NOT NULL
    )";

if ($conn->query($sql) === TRUE) {

    echo "Table csvfile created successfully <html><br></html>";
} else {

    echo "Error creating table: " . $conn->error;
}

//$conn->close();

if (isset($_POST["submit"])) {

    if ($_FILES['file']['name']) {
        $filename = explode(".", $_FILES['file']['name']);
        if ($filename[1] == "csv") {
            $handel = fopen($_FILES['file']['tmp_name'], "r");
            while ($data = fgetcsv($handel)) {
                $item = mysqli_real_escape_string($conn, $data[0]);
                $sql = "INSERT INTO csvfile(Email) VALUES('$item')";
                mysqli_query($conn, $sql);
            }
            fclose($handel);
            header("Location: indexupload.php");
        }
        else{
            echo "Only CSV files allowed.";
        }
    }
}
