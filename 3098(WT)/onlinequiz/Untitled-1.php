<?php
// session_start();
if (isset($_SESSION['email'])) {
    $Email = $_SESSION['email'];
    $User_1 = $_SESSION['name'];
}
echo "welcome :" . $Email;
echo "name:" . $User_1;
?>
<?php
$q = mysqli_query($con, "SELECT * FROM user WHERE email=" . $email) or die('Error'); /// USER NOT FOUND
if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
}
?>
<h1><?php echo $fetch['name']; ?></h1>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">QUIZ SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <ul class="nav navbar-nav navbar-left">
                <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>><a class="nav-item nav-link active" href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
                <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>> <a class="nav-item nav-link active" href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
                <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>> <a class="nav-item nav-link active" href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo ''; ?>> <a class="nav-item nav-link active" href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
            </ul>
        </div>
    </div>
</nav>