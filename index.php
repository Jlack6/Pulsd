<?php


$hostname = "xo3.x10hosting.com";
$username = "pract147";
$password = "";
$databaseName = "pract147_pulsd";

$connect = mysqli_connect($hostname,$username,$password,$databaseName);
$query = "SELECT * FROM websites";

$result1 = mysqli_query($connect, $query);

if ($connect->connect_error) {
   die("Connection failed: " . $connect->connect_error);
}
  echo "Connected successfully";

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

    // Redirect to another page
    //header('location: index.php');
}

 ?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
  function showRSS(str) {
    if (str.length==0) { 
      document.getElementById("rssOutput").innerHTML="";
      return;
    }
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("rssOutput").innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","getrss.php?q="+str,true);
    xmlhttp.send();
  }
  </script>
</head>
<body>

  <form>
    <select class="form-control form-control-lg" onchange="showRSS(this.value)">

      <?php while($row1 = mysqli_fetch_array($result1)):;?>
      <option value="<?php echo $row1[0]; ?>"><?php echo $row1[1]; ?></option>
      <?php endwhile; ?>

    </select>
  </form>
  <input type="button" value="Login" class="btn btn-warning btn-lg btn-block" onclick="window.location.href='login.php'" />
<br>
<div id="rssOutput">RSS-feed will be listed here</div>
</body>
</html>
