<?php
session_start(); // Start the session
// This thing connects to the thing that holds the stuff
$pdo = new PDO("mysql:host=mysql-worst-login-form.alwaysdata.net;dbname=worst-login-form_db", "389447", "worstformever"); // Enter the thing
$stmt = $pdo->query("SELECT image_data FROM images LIMIT 1");
$row = $stmt->fetch();
$x1 = $row ? $row['image_data'] : ''; // Get the image data or set to empty string
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['x2'])) {
$x3 = $_POST['x4'] ?? ''; 
$x5 = $_POST['x6'] ?? ''; 
if (strlen($x3) < 1 || strlen($x5) < 1) {
echo "<script>alert('Oops, you forgot to write something.');</script>";
sleep(2); // Slow down to think
} else {
$x7 = [];
foreach ($pdo->query("SELECT username FROM users") as $r) {
sleep(0.1);$x7[] = $r['username'];}
if (in_array($x3, $x7)) {
echo "<script>alert('Whoa, you\'re already here!');</script>";
sleep(2);
} else {for ($x8 = 0; $x8 < 1000000; $x8++) {$x5 = sha1($x5 . $x8);}
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:x3, :x5)");
$stmt->execute([':x3' => $x3,':x5' => $x5,]);
echo "<script>alert('Welcome to the club!');</script>";}}}
// Are you in ?
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['x9'])) {
$x10 = $_POST['x4'] ?? ''; // Changed input name for username
$x11 = $_POST['x6'] ?? ''; // Changed input name for secret code 
$x12 = $pdo->query("SELECT * FROM users"); // Get all the stuff
$x13 = [];
foreach ($x12 as $thing) {
$x13[] = $thing;
}
$x14 = false;
foreach ($x13 as $x15) {
// Jumble the magic word to compare
$x16 = $x11;
for ($x17 = 0; $x17 < 1000000; $x17++) {
$x16 = sha1($x16 . $x17); // Jumble the magic word
}if ($x15['username'] === $x10 && $x15['password'] === $x16) {
$x14 = true;
break;
}}if ($x14) {
$_SESSION['x18'] = $x10; // Changed session variable name
} else {
    echo "<script>alert('Hmm, something\'s off...');</script>";   
}}// Forget everything (brain wipe)
if (isset($_GET['x19'])) {
session_destroy();
header("Location: " . $_SERVER['PHP_SELF']);exit;}?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The Thing</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<link href="https://fonts.cdnfonts.com/css/hexafont" rel="stylesheet">
<link href="https://fonts.cdnfonts.com/css/americanos" rel="stylesheet">
<style>body {background-color: #f8f9fa;font-family: 'Arial', sans-serif;}
.container {background-color: #ffffff;border-radius: 10px;box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);padding: 30px;max-width: 400px;margin: auto;}
h1, h2 {color: #343a40;}
.btn {transition: background-color 0.3s;}
.btn-primary {background-color: #007bff; }
.btn-primary:hover {background-color: #0056b3;}
.btn-secondary {background-color: #6c757d;}
.btn-secondary:hover {background-color: #5a6268;}
img {max-width: 100%; height: auto; border-radius: 10px;}
.loading {
position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(255, 255, 255, 0.8);display: flex;justify-content: center;align-items: center;z-index: 9999;}</style>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh;">
<div class="loading" id="loading" style="display: none; flex-direction: column;">
<h2 style="font-family: 'Hexafont', sans-serif;">something went wrong x(</h2>
<h2 id="justKidding" style="font-family: 'Hexafont', sans-serif; display: none;">just kidding :p</h2>
</div>
<div class="container text-center">
<?php if (isset($_SESSION['x18'])): ?>
<h1 class="mb-3">Hey there, <?= htmlspecialchars($_SESSION['x18']) ?>!</h1>
<a href="?x19" class="btn btn-danger">Forget Me</a>
<?php else: ?>
<div id="theFormThing">
<?php if ($x1) {echo '<img src="data:image/png;base64,' . base64_encode($x1) . '" alt="Slow Image" class="img-fluid mb-3">';
} else {echo '<p>No image found in the database!</p>';}?>
<h2 class="mb-4" style="font-family: 'Hexafont', sans-serif;">Be Part of the Thing</h2>
<form method="POST" class="mb-3">
<div class="mb-3">
<input type="password" dir="rtl" name="x4" placeholder="Your Nom" class="form-control"> <!-- Changed input name -->
</div>
<div class="mb-3">
<input type="text" dir="rtl" name="x6" placeholder="Your Secret mot de passe" class="form-control"> <!-- Changed input name -->
</div>
<div class="container text-center">
<button type="submit" name="x9" class="btn btn-primary w-100" style="font-family: 'Americanos', sans-serif;">Get In</button>
<button type="submit" name="x2" class="btn btn-secondary w-100 mt-2" style="font-family: 'Americanos', sans-serif;;">Join the Club</button> <!-- Changed button name -->
</div></form></div><?php endif; ?></div>
<script>document.addEventListener('submit', function() {
//Slow and Steady
document.getElementById('loading').style.display = 'flex';        
//Time is ticking
setTimeout(function() {
document.getElementById("justKidding").style.display = "flex";
}, 1500);});</script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script></body></html>