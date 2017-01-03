<?php  //Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `login` WHERE pass='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $password;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Der Zugangscode wurde schon benutzt oder ist falsch.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
$password = $_SESSION['username'];
echo "<html>
<head>
  <link rel='stylesheet' href='css/vote.css' media='screen' title='no title'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet'>
<script src='getvote.js'></script>
</head>
<body>
<center>
<div id='poll'>
<h1>Wer ist deine Wahl?</h1>
<form>
  <input type='button' class='box' name='vote' value='0' onclick='getVote(this.value)'>
    <img src='fm.png' alt='Freie Marktwirtschaft' width='150px'/>
  </input>
  <input type='button' class='box' id='box-2' name='vote' value='1' onclick='getVote(this.value)'>
    <img src='zvm.png' alt='Zentralverwaltungswirtschaft' width='150px'/>
  </input>
</form>
<a href='logout.php' id='logout'>Logout</a>
</div>
</center>
</body>
</html>
";

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<html>
<head>
  <link rel="stylesheet" href="css/style.css" media="screen" title="no title">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body>
  <div id="login-box">
  <form method="POST">
    <h1>Wahlen</h1>
    <label for="password">Zuganscode</label><br>
    <input type="text" name="password" placeholder="Zugangscode" required id="zc-input"><br>
    <button type="submit" id="zc-login"><span>Anmelden!</span></button>
  </form>
  </div>

</body>

</html>
<?php } ?>
