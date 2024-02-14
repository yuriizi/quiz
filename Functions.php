<?php

include_once 'Config.php';
session_start();
$email = $_SESSION['email'];

if (@$_GET['q'] == 'addquiz') {
    $name = $_POST['name'];
    $name = ucwords(strtolower($name));
    $total = $_POST['total'];
    $id = uniqid();
    $q3 = mysqli_query($con, "INSERT INTO quiz VALUES  ('$id','$name' , '3' , '1','$total', NOW())");
    header("location:Menu.php?q=4&step=2&quizid=$id&n=$total");
}



if (@$_GET['q'] == 'addqns') {
    $n = @$_GET['n'];
    $quizid = @$_GET['quizid'];
    $ch = @$_GET['ch'];
    for ($i = 1; $i <= $n; $i++) {
        $questionsid = uniqid();
        $qns = $_POST['qns' . $i];
        $q3 = mysqli_query($con, "INSERT INTO questions VALUES  ('$quizid','$questionsid','$qns' , '$ch' , '$i')");
        $oaid = uniqid();
        $obid = uniqid();
        $ocid = uniqid();
        $odid = uniqid();
        $a = $_POST[$i . '1'];
        $b = $_POST[$i . '2'];
        $c = $_POST[$i . '3'];
        $d = $_POST[$i . '4'];
        $qa = mysqli_query($con, "INSERT INTO options VALUES  ('$questionsid','$a','$oaid')") or die('Error61');
        $qb = mysqli_query($con, "INSERT INTO options VALUES  ('$questionsid','$b','$obid')") or die('Error62');
        $qc = mysqli_query($con, "INSERT INTO options VALUES  ('$questionsid','$c','$ocid')") or die('Error63');
        $qd = mysqli_query($con, "INSERT INTO options VALUES  ('$questionsid','$d','$odid')") or die('Error64');
        $e = $_POST['ans' . $i];
        switch ($e) {
            case 'a':
                $ansid = $oaid;
                break;
            case 'b':
                $ansid = $obid;
                break;
            case 'c':
                $ansid = $ocid;
                break;
            case 'd':
                $ansid = $odid;
                break;
            default:
                $ansid = $oaid;
        }
        $qans = mysqli_query($con, "INSERT INTO answer VALUES  ('$questionsid','$ansid')");
    }
    header("location:Menu.php?q=1");
}


if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2) {
    $quizid = @$_GET['quizid'];
    $sn = @$_GET['n'];
    $total = @$_GET['t'];
    $ans = $_POST['ans'];
    $questionsid = @$_GET['questionsid'];
    $q = mysqli_query($con, "SELECT * FROM answer WHERE questionsid='$questionsid' ");
    while ($row = mysqli_fetch_array($q)) {
        $ansid = $row['ansid'];
    }
    if ($ans == $ansid) {
        $q = mysqli_query($con, "SELECT * FROM quiz WHERE quizid='$quizid' ");
        while ($row = mysqli_fetch_array($q)) {
            $hitscore = $row['hitscore'];
        }
        if ($sn == 1) {
            $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$quizid' ,'0','0','0','0',NOW())") or die('Error');
        }
        $q = mysqli_query($con, "SELECT * FROM history WHERE quizid='$quizid' AND email='$email' ") or die('Error115');
        while ($row = mysqli_fetch_array($q)) {
            $s = $row['score'];
            $r = $row['hitscore'];
        }
        $r++;
        $s = $s + $hitscore;
        $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`hitscore`=$r, date= NOW()  WHERE  email = '$email' AND quizid = '$quizid'") or die('Error124');
    } else {
        $q = mysqli_query($con, "SELECT * FROM quiz WHERE quizid='$quizid' ") or die('Error129');
        while ($row = mysqli_fetch_array($q)) {
            $wrong = $row['wrong'];
        }
        if ($sn == 1) {
            $q = mysqli_query($con, "INSERT INTO history VALUES('$email','$quizid' ,'0','0','0','0',NOW() )") or die('Error137');
        }
        $q = mysqli_query($con, "SELECT * FROM history WHERE quizid='$quizid' AND email='$email' ") or die('Error139');
        while ($row = mysqli_fetch_array($q)) {
            $s = $row['score'];
            $w = $row['wrong'];
        }
        $w++;
        $s = $s - $wrong;
        $q = mysqli_query($con, "UPDATE `history` SET `score`=$s,`level`=$sn,`wrong`=$w, date=NOW() WHERE  email = '$email' AND quizid = '$quizid'") or die('Error147');
    }
    if ($sn != $total) {
        $sn++;
        header("location:Menu.php?q=quiz&step=2&quizid=$quizid&n=$sn&t=$total") or die('Error152');
    } else if ($_SESSION['key'] != 'admin') {
        $q = mysqli_query($con, "SELECT score FROM history WHERE quizid='$quizid' AND email='$email'") or die('Error156');
        while ($row = mysqli_fetch_array($q)) {
            $s = $row['score'];
        }
        $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
        $rowcount = mysqli_num_rows($q);
        if ($rowcount == 0) {
            $q2 = mysqli_query($con, "INSERT INTO rank VALUES('$email','$s',NOW())") or die('Error165');
        } else {
            while ($row = mysqli_fetch_array($q)) {
                $sun = $row['score'];
            }
            $sun = $s + $sun;
            $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
        }
        header("location:Menu.php?q=result&quizid=$quizid");
    } else {
        header("location:Menu.php?q=result&quizid=$quizid");
    }
}

if (@$_GET['q'] == 'quizre' && @$_GET['step'] == 25) {
    $quizid = @$_GET['quizid'];
    $n = @$_GET['n'];
    $t = @$_GET['t'];
    $q = mysqli_query($con, "SELECT score FROM history WHERE quizid='$quizid' AND email='$email'") or die('Error156');
    while ($row = mysqli_fetch_array($q)) {
        $s = $row['score'];
    }
    $q = mysqli_query($con, "DELETE FROM `history` WHERE quizid='$quizid' AND email='$email' ") or die('Error184');
    $q = mysqli_query($con, "SELECT * FROM rank WHERE email='$email'") or die('Error161');
    while ($row = mysqli_fetch_array($q)) {
        $sun = $row['score'];
    }
    $sun = $sun - $s;
    $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE email= '$email'") or die('Error174');
    header("location:Menu.php?q=quiz&step=2&quizid=$quizid&n=1&t=$t");
}
