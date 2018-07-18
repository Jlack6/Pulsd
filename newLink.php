<?php

session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>
<?php 
$msg = "";
if(isset($_POST["upload"])){

    $db = mysqli_connect("xo3.x10hosting.com","pract147","","pract147_pulsd");
    $value = $_POST['value'];
    $website = $_POST['website'];


    $sql = "INSERT INTO websites (value,website)
     VALUES ('$value','$website')";
    mysqli_query($db,$sql);

    header('location: newLink.php');
}

 ?>

 <?php 
$msg = "";
if(isset($_POST["delete"])){

    $id = $_POST['id'];

    $db = mysqli_connect("xo3.x10hosting.com","pract147","","pract147_pulsd");

    $sql = "DELETE FROM websites WHERE id = '$id' ";

    mysqli_query($db,$sql);

    header('location: newLink.php');
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>New Listing</title>
    <link rel="stylesheet" type="text/css" href="generalCss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div id="content">
            <form method="post" action="newLink.php" enctype="multipart/form-data">
                <p><a href="logout.php" class="btn btn-danger btn-lg btn-block">Sign Out of Your Account</a></p>
                <input type="button" value="Back Home" class="btn btn-success btn-lg btn-block" onclick="window.location.href='index.php'" />
                <input type="hidden" name="size" value="1000000">
                <div>
                    <textarea name="value" cols="40" rows="1" placeholder="Value (What you want it to be named)" class="form-control form-control-lg"></textarea>
                </div>
                <div>
                    <textarea name="website" cols="40" rows="1" placeholder="Link of the Website" class="form-control form-control-lg"></textarea>
                </div>
                <div>
                    <button type="submit" name="upload" value="Upload Image"  class="btn btn-primary btn-lg btn-block">Submit Name</button>
                </div>
            </form>
    </div>
    <div id="contentTwo">
        <form method="post" action="newLink.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <textarea name="id" cols="40" rows="1" placeholder="Enter number of the row you would like to delete" class="form-control form-control-lg"></textarea>
                </div>
                <div>
                    <button type="submit" name="delete" value="delete"  class="btn btn-warning btn-lg btn-block">Delete Value</button>
                </div>
        </form>
        <?php 
            $post = array();
            $db = mysqli_connect("xo3.x10hosting.com","pract147","","pract147_pulsd");
            $sql = "SELECT * FROM websites";
            $result = mysqli_query($db,$sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div id= display >";
                    echo "<p> ".$row['id']. ": ".$row['value']."</p>";
                    echo "<p>".$row['website']."</p>";
                echo "</div>";

            }
        ?>
    </div>
</body>
</html>
