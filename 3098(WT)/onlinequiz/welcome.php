<?php
include_once 'database.php';
session_start();
if (!(isset($_SESSION['email']))) {
    header("location:login.php");
} else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $college = $_SESSION['college'];
    include_once 'database.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Welcome | Online Quiz System</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css" /> -->
<link rel="stylesheet" href="css/welcome.css">
<link rel="stylesheet" href="css/font.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<style>
    .user {
        margin-top: 20px;
        margin-bottom: 10px;
        background-color: #111827;
        border-radius: 10px;
        padding: 10px 10px;
        position: relative;
        width: 50%;
        color: #ddd;
    }

    .mypanel {
        margin-bottom: 10px;
        background-color: #111827;
        border-radius: 10px;
        padding: 10px 10px;
    }

    .table-myresponsive {
        background-color: transparent;
        border-radius: 15px;
        margin-top: 5px;
        border-collapse: separate;
        border-spacing: 0px;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: separate;
        border-spacing: 0px 5px;
        width: 100%;
        border: none
    }

    table td,
    th {
        padding: 5px;
    }

    table tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: right;
        background-color: #331763;
        color: white;
    }

    td:first-child,
    th:first-child {
        border-radius: 10px 0 0 10px;
    }

    td:last-child,
    th:last-child {
        border-radius: 0 10px 10px 0;
    }

    a{
        color:white;
    }
</style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color:cornsilk;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ONLINE QUIZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav navbar-left">
                   <ul class="navbar-nav">
                     <li <?php if (@$_GET['q'] == 1) echo 'class="active"'; ?>> <a class="nav-link" href="welcome.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
                     <li <?php if (@$_GET['q'] == 2) echo 'class="active"'; ?>> <a class="nav-link" href="welcome.php?q=2"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
                     <li <?php if (@$_GET['q'] == 3) echo 'class="active"'; ?>> <a class="nav-link" href="welcome.php?q=3"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li>
                    
                   </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo''; ?> > <a class="nav-link" href="logout.php?q=welcome.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <div class="user">
            <?php if (@$_GET['q'] == 1) {
                if (isset($_SESSION['email'])) {
                    $Email = $_SESSION['email'];
                    $User_1 = $_SESSION['name'];
                }
                echo "Name : " . $User_1;
                echo "<br>";
                echo " Email : " . $Email;
            }
            ?>
        </div>
    </div>

    <div class="container"><!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="row">
            <div class="col-md-12">
                <?php if (@$_GET['q'] == 1) {
                    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
                    echo  '<div class="mypanel"><div ><table class="table table-my">
                    <tr><td><center><b>S.N.</b></center></td><td><center><b>Topic</b></center></td><td><center><b>Total question</b></center></td><td><center><b>Marks</center></b></td><td><center><b>Action</b></center></td></tr>';
                    $c = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        $title = $row['title'];
                        $total = $row['total'];
                        $sahi = $row['sahi'];
                        $eid = $row['eid'];
                        $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND email='$email'") or die('Error98');
                        $rowcount = mysqli_num_rows($q12);
                        if ($rowcount == 0) {
                            echo '<tr><td><center>' . $c++ . '</center></td><td><center>' . $title . '</center></td><td><center>' . $total . '</center></td><td><center>' . $sahi * $total . '</center></td><td><center><b><a href="welcome.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '" class="btn sub1" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></center></td></tr>';
                        } else {
                            echo '<tr style="color:#99cc32"><td><center>' . $c++ . '</center></td><td><center>' . $title . '&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></center></td><td><center>' . $total . '</center></td><td><center>' . $sahi * $total . '</center></td><td><center><b><a href="update.php?q=quizre&step=25&eid=' . $eid . '&n=1&t=' . $total . '" class="pull-right btn sub1" style="color:black;margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></center></td></tr>';
                        }
                    }
                    $c = 0;
                    echo '</table></div></div>';
                } ?>

                <?php
                if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
                    $eid = @$_GET['eid'];
                    $sn = @$_GET['n'];
                    $total = @$_GET['t'];
                    $q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' ");
                    echo '<div class="panel" style="margin:5%">';
                    while ($row = mysqli_fetch_array($q)) {
                        $qns = $row['qns'];
                        $qid = $row['qid'];
                        echo '<b>Question &nbsp;' . $sn . '&nbsp;::<br /><br />' . $qns . '</b><br /><br />';
                    }
                    $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
                    echo '<form action="update.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal">
                        <br />';

                    while ($row = mysqli_fetch_array($q)) {
                        $option = $row['option'];
                        $optionid = $row['optionid'];
                        echo '<input type="radio" name="ans" value="' . $optionid . '">&nbsp;' . $option . '<br /><br />';
                    }
                    echo '<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
                }

                if (@$_GET['q'] == 'result' && @$_GET['eid']) {
                    $eid = @$_GET['eid'];
                    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND email='$email' ") or die('Error157');
                    echo  '<div class="panel">
                        <center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

                    while ($row = mysqli_fetch_array($q)) {
                        $s = $row['score'];
                        $w = $row['wrong'];
                        $r = $row['sahi'];
                        $qa = $row['level'];
                        echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>' . $qa . '</td></tr>
                                <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>' . $r . '</td></tr> 
                                <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>' . $w . '</td></tr>
                                <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
                    }
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE  email='$email' ") or die('Error157');
                    while ($row = mysqli_fetch_array($q)) {
                        $s = $row['score'];
                        echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>' . $s . '</td></tr>';
                    }
                    echo '</table></div>';
                }
                ?>

                <?php
                if (@$_GET['q'] == 2) {
                    $q = mysqli_query($con, "SELECT * FROM history WHERE email='$email' ORDER BY date DESC ") or die('Error197');
                    echo  '<div class="mypanel title">
                        <table class="table table-my" >
                        <tr style="color:black;"><td><center><b>S.N.</b></center></td><td><center><b>Quiz</b></center></td><td><center><b>Question Solved</b></center></td><td><center><b>Right</b></center></td><td><center><b>Wrong<b></center></td><td><center><b>Score</b></center></td>';
                    $c = 0;
                    while ($row = mysqli_fetch_array($q)) {
                        $eid = $row['eid'];
                        $s = $row['score'];
                        $w = $row['wrong'];
                        $r = $row['sahi'];
                        $qa = $row['level'];
                        $q23 = mysqli_query($con, "SELECT title FROM quiz WHERE  eid='$eid' ") or die('Error208');

                        while ($row = mysqli_fetch_array($q23)) {
                            $title = $row['title'];
                        }
                        $c++;
                        echo '<tr><td><center>' . $c . '</center></td><td><center>' . $title . '</center></td><td><center>' . $qa . '</center></td><td><center>' . $r . '</center></td><td><center>' . $w . '</center></td><td><center>' . $s . '</center></td></tr>';
                    }
                    echo '</table></div>';
                }

                if (@$_GET['q'] == 3) {
                    $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC ") or die('Error223');
                    echo  '<div class="mypanel title"><div class="table-responsive">
                        <table class="table table-my" >
                        <tr style="color:red"><td><center><b>Rank</b></center></td><td><center><b>Name</b></center></td><td><center><b>Email</b></center></td><td><center><b>Score</b></center></td></tr>';
                    $c = 0;

                    while ($row = mysqli_fetch_array($q)) {
                        $e = $row['email'];
                        $s = $row['score'];
                        $q12 = mysqli_query($con, "SELECT * FROM user WHERE email='$e' ") or die('Error231');
                        while ($row = mysqli_fetch_array($q12)) {
                            $name = $row['name'];
                        }
                        $c++;
                        echo '<tr><td style="color:black"><center><b>' . $c . '</b></center></td><td><center>' . $name . '</center></td><td><center>' . $e . '</center></td><td><center>' . $s . '</center></td></tr>';
                    }
                    echo '</table></div></div>';
                }
                ?>
</body>

</html>