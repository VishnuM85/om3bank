<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>
        OM3 bank - User Home
    </title>


    <?php
    date_default_timezone_set("Asia/Kolkata");
    $thfrom = $_SESSION['accnum'];
    if (empty($_SESSION['username'])) {
        $sname = $sid = $semail = $sphn = $sadd = $sage = $sgen = $sbal = '';
        $thto = $thfrom = $thmessage1 = $thmessage2 = $thamt = $thbal = '';
    } else {
        $sname = $_SESSION['username'];
        $sid = $_SESSION['accnum'];
        $semail = $_SESSION['email'];
        $sphn = $_SESSION['phone'];
        $sadd = $_SESSION['address'];
        $sage = $_SESSION['age'];
        $sgen = $_SESSION['gender'];
        $sbal = $_SESSION['balance'];
        
    }
    
    $hsname = $hsmail = $hssub = $hstarea = '';
    $count1 = $count2 = 1;
    $depval = $tavali = $tavala = $temp2 = $query2 = $query_run2 = $newbal = '';
    $temp = $sbal;
    $emid = $semail;
    $errors = array('dep' => '', 'tran1' => '', 'tran2' => '');

    if (isset($_POST['hsend'])) {
        if (empty($_SESSION['username'])) {
            echo "<script> window.location.href='logi.php'; </script>";
        } else {
            $hsname=$_POST['hname'];
            $hsmail=$_POST['hmail'];
            $hssub=$_POST['hsub'];
            $hstarea=$_POST['htarea'];
            $conn=mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
            $htres=mysqli_query($conn,"INSERT INTO supp(cname,cmail,csub,ctarea)values('$hsname','$hsmail','$hssub','$hstarea')");
            $conn->close();
            echo "<script>alert('Message sent, thank you for contacting us!')</script>";
            $hsname = $hsmail = $hssub = $hstarea = '';
            echo "<script> window.location.href='home.php'; </script>";
        }
    }

    /* if (isset($_POST['deposit'])) {
        if (empty($_SESSION['username'])) {
            echo "<script> window.location.href='logi.php'; </script>";
        } else {
            if (empty($_POST['depo'])) {
                $errors['dep'] = 'Enter valid amount to deposit';
            } else {
                $errors['dep'] = '';
                $depval = $_POST['depo'];
                ++$count1;
                if ($count1 == 2) {
                    $depval = $depval + $temp;
                    $connection = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                    $query = "UPDATE `test` SET balance='$depval' where eemail='$emid'";

                    $query_run = mysqli_query($connection, $query);
                    if ($query_run) {
                        $eemail_check_query = "SELECT * FROM test WHERE eemail='$emid'";
                        $res = mysqli_query($connection, $eemail_check_query);
                        $resch = mysqli_num_rows($res);
                        if ($resch > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $_SESSION['accnum'] = $row['id'];
                                $_SESSION['username'] = $row['uname'];
                                $_SESSION['email'] = $row['eemail'];
                                $_SESSION['phone'] = $row['phn'];
                                $_SESSION['address'] = $row['addrs'];
                                $_SESSION['age'] = $row['age'];
                                $_SESSION['gender'] = $row['gen'];
                                $_SESSION['password'] = $row['pwd'];
                                $_SESSION['balance'] = $row['balance'];
                            }
                        }
                        echo "<script> alert('Amount successfully deposited!');</script>";
                        $connection->close();
                        $count1 = 1;
                        echo " <script> window.location.href='home.php'; </script> ";
                    }
                }
            }
        }
    }*/
    if (isset($_POST['transfer'])) {
        if (empty($_SESSION['username'])) {
            echo "<script> window.location.href='logi.php'; </script>";
        } else {
            if (empty($_POST['trani'])) {
                $errors['tran1'] = 'Enter a valid a/c num';
            } else {
                $tavali = $_POST['trani'];
                $thto = $tavali;
                
                $connection = new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                $accnum_check_query = "SELECT * FROM test WHERE id='$tavali' LIMIT 1";
                $result = mysqli_query($connection, $accnum_check_query);
                $accnum = mysqli_fetch_assoc($result);
                if ($result->num_rows > 0) {
                    ++$count2;
                    $connection->close();
                } else {
                    $errors['tran1'] = 'Enter a valid a/c num';
                }
            }
            if (empty($_POST['trana'])) {
                $errors['tran2'] = 'Enter valid amount';
            } else if ($_POST['trana'] <= ($temp - 100)) {
                $tavala = $_POST['trana'];
                ++$count2;
            } else {
                $errors['tran2'] = 'Minimum balance exceeding';
            }
            if ($count2 == 3) {
                $count2 = 1;
                $temp = $temp - $tavala;
                $thamt = $tavala;
                $connection = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                $query = "UPDATE `test` SET balance='$temp' where eemail='$emid'";
                $thbal = $temp;
                $query_run = mysqli_query($connection, $query);
                if ($query_run) {
                    $id_check_query = "SELECT * FROM test WHERE id='$tavali'";
                    $res = mysqli_query($connection, $id_check_query);
                    $resch = mysqli_num_rows($res);
                    if ($resch > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $_SESSION['balance'] = $row['balance'];
                        }
                        $temp2 = $_SESSION['balance'];
                    }
                    $newbal = $temp2 + $tavala;
                    $query2 = "UPDATE `test` SET balance='$newbal' where id='$tavali'";
                    $query_run2 = mysqli_query($connection, $query2);
                    if ($query_run2) {
                        $id_check_query2 = "SELECT * FROM test WHERE eemail='$emid'";
                        $res2 = mysqli_query($connection, $id_check_query2);
                        $resch2 = mysqli_num_rows($res2);
                        if ($resch2 > 0) {
                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                $_SESSION['accnum'] = $row2['id'];
                                $_SESSION['username'] = $row2['uname'];
                                $_SESSION['email'] = $row2['eemail'];
                                $_SESSION['phone'] = $row2['phn'];
                                $_SESSION['address'] = $row2['addrs'];
                                $_SESSION['age'] = $row2['age'];
                                $_SESSION['gender'] = $row2['gen'];
                                $_SESSION['password'] = $row2['pwd'];
                                $_SESSION['balance'] = $row2['balance'];
                            }
                        }
                    }
                    echo "<script>alert('Amount transfer successful!')</script>";
                }
                $stmt2 = "insert into tra(fromid,toid,amount,cbalance)values('$thfrom','$thto','$thamt','$thbal')";
                mysqli_query($connection, $stmt2);
                $thto = $thfrom = $thmessage1 = $thmessage2 = $thamt = $thbal = '';
                $depval = $tavali = $tavala = $temp2 = $query2 = $query_run2 = $newbal = '';
                $connection->close();
                echo " <script> window.location.href='home.php'; </script> ";
            }
        }
    }

    ?>


    <style>
        ul {
            list-style-type: none;
            padding-top: 7px;
            padding-bottom: 30px;
            margin-bottom: 30px;
            border-top: 2px solid whitesmoke;
            background-color: #252525;
            box-shadow: 0px 5px 15px 3px rgb(23, 23, 23);

        }

        #anav {
            text-decoration: none;
            color: whitesmoke;
            font-family: Berlin Sans FB;
            font-size: 115%;
            padding: 5px 5px;
            padding-bottom: 7px;

        }

        #anav:hover {
            color: #32dfab;
            border-bottom: 3px solid #ba0b68;
            animation: navb 0.5s;
        }

        @keyframes navb {
            from {
                border-bottom: black;
                color: whitesmoke;
            }

            to {
                color: #32dfab;
                border-bottom: 3px solid #ba0b68;
            }
        }

        @keyframes menn {
            from {
                border-bottom: black;
                color: whitesmoke;
            }

            to {
                color: #32dfab;
                border-bottom: 3px solid #ba0b68;
            }
        }

        #he1 {
            font-family: MV Boli;
            text-align: center;
            text-shadow: 2px 2px 5px #ba0b68;
            animation: pop2 2s;
            padding-bottom: 20px;
        }

        @keyframes pop2 {
            from {
                color: #333333;
            }

            to {
                color: whitesmoke;
            }

        }

        #namep {
            font-family: Lucida Sans;
            margin-left: 10vw;
            font-size: 140%;
            text-shadow: 0px 5px 14px black;
        }

        #nump {
            font-family: Lucida Sans;
            margin-left: 10vw;
            font-size: 90%;
            margin-top: -1vw;
            text-shadow: 0px 5px 14px black;
        }


        #opts {

            margin-left: 15vw;
            margin-right: 15vw;
            margin-top: 3.5vw;
            margin-bottom: 2vw;
            text-align: center;

        }

        #opts2 {
            font-family: Forte;
            color: WHITE;
            border: 3px solid WHITE;
            text-decoration: none;
            border-radius: 1.7vw;
            font-size: 140%;
            width: 40vw;
            max-width: 100%;
            border-style: dotted;
            line-height: 5.5vw;

        }

        #opts2:hover {
            color: #32dfab;
            border: 3px solid #ba0b68;
        }

        #ff {
            box-shadow: 0px -4px 15px 3px rgb(23, 23, 23);
            margin-top: 80px;
            padding-bottom: 20px;
            padding-top: 25px;
        }

        #foot1 {
            font-size: 20px;
            font-family: helvetica;
        }

        .fa-facebook {
            color: #3978ff;
            /*color: white;*/
        }

        .fa-twitter {
            color: #5fbaff;
            /* color: white;*/
        }

        .fa-instagram {

            color: rgb(214, 67, 214);
        }

        .fa-linkedin {
            color: #007bb5;
        }

        .fa {
            padding-bottom: 10px;
            font-size: 25px;
            width: 40px;
            text-align: center;
            text-decoration: none;
            margin: 0px 2px;

        }

        .fa-shield {
            color: black;
        }

        .wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
        }

        .wrap2 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
        }

        .sm-head {
            font-size: 50px;
            line-height: 54px;
            color: #E5E5E5;
            font-family: SyfSans;
            font-weight: 700;
        }

        .sm-head2 {
            font-size: 50px;
            line-height: 54px;
            color: #E5E5E5;
            font-family: SyfSans;
            font-weight: 700;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a,
        #accdet {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover,
        #accdet:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        #menu {
            font-size: 115%;
            cursor: pointer;
            font-family: Berlin Sans FB;
            padding-bottom: 7px;
        }

        #menu:hover {
            color: #32dfab;
            border-bottom: 3px solid #ba0b68;
            animation: menn 0.5s;
        }

        .special-card {
            background-color: transparent;
            border-color: 2px solid #212121;
        }
        #bg-modal1,
        #bg-modal2,
        #bg-modal4,
        #bg-modal5 {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            justify-content: center;
            align-items: center;
            display: none;
            animation: fadee 1s;
        }
        #bg-modal9 {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            justify-content: center;
            align-items: center;
            display: flex;
            animation: fadee 1s;
        }

        #bg-modal3 {
            width: 100%;
            height: auto;
            background-color: rgba(0, 0, 0, 0.7);
            position: absolute;
            top: 0;
            justify-content: center;
            align-items: center;
            display: none;
            padding-bottom: 1080px;
            animation: fadee 1s;
        }

        @keyframes fadee {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }

        }

        #ad-content {
            width: 800px;
            height: 550px;
            text-align: center;
            border-radius: 4px;
            padding-left: 0px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            position: relative;
            background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);

        }

        #ba-content {
            width: 500px;
            height: 300px;
            text-align: center;
            border-radius: 4px;
            padding-left: 0px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            position: relative;
            background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
        }

        #de-content {
            width: 1000px;
            height: auto;
            text-align: center;
            border-radius: 4px;
            padding-left: 0px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            margin-top: 80px;
            margin-bottom: 120px;
            position: relative;
            background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);

        }

        #ta-content {
            width: 700px;
            height: 500px;
            text-align: center;
            border-radius: 4px;
            padding-left: 0px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            position: relative;
            background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);

        }

        #em-content {
            width: 700px;
            height: 495px;
            text-align: center;
            border-radius: 4px;
            padding-left: 0px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 20px;
            position: relative;
            background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
        }

        .close {
            position: absolute;
            top: 0;
            right: 14px;
            font-size: 50px;
            transform: rotate(45deg);
            cursor: pointer;
        }

        .ad-t {
            font-size: 120%;
        }

        #baid {
            font-size: 120%;
        }

        .mon {
            font-family: Britannic;
            font-size: 250%;
            font-weight: bold;
            color: rgb(83, 199, 0);
            text-shadow: 2px 2px 4px black;
        }

        #headmen,
        #headmen3,
        #headmen4,
        #headmen5 {
            color: white;
            font-size: 250%;
            border-bottom: 2px solid;
            font-family: Gabriola;
            font-weight: bold;
        }

        #headmen2 {
            color: white;
            font-size: 200%;
            border-bottom: 2px solid;
            font-family: Gabriola;
            font-weight: bold;
        }

        .faaa {
            font-size: 80%;
        }

        #depamti {
            font-family: Poor Richard;
            color: white;
            text-align: center;
            border: none;
            background-color: transparent;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
            border-radius: 5px;
            font-size: 180%;
        }

        #hname,
        #hmail,
        #hsub {
            font-family: Poor Richard;
            color: white;
            text-align: center;
            border: none;
            background-color: transparent;
            border-radius: 5px;
            font-size: 125%;
            margin-bottom: 5px;
        }

        #htarea {
            font-family: Poor Richard;
            color: white;
            text-align: center;
            border: none;
            background-color: transparent;
            border-radius: 5px;
            font-size: 90%;
            margin-top: 15px;
            margin-bottom: 25px;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
        }


        #taamti1 {
            font-family: Poor Richard;
            color: white;
            text-align: center;
            border: none;
            background-color: transparent;
            border-radius: 5px;
            font-size: 125%;
            margin-bottom: -15px;
        }

        #taamti2 {
            font-family: Poor Richard;
            color: white;
            text-align: center;
            border: none;
            background-color: transparent;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
            border-radius: 5px;
            font-size: 180%;
        }



        #depamti:focus,
        #depamti::selection,
        #taamti1:focus,
        #taamti1::selection,
        #taamti2:focus,
        #taamti2::selection,
        #hname:focus,
        #hname::selection,
        #hmail:focus,
        #hmail::selection,
        #htarea:focus,
        #htarea::selection,
        #hsub:focus,
        #hsub::selection {
            outline: none;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        #depamtb,
        #taamtb {
            color: white;
            font-size: 120%;
            border-radius: 20px;
            font-family: Berlin Sans FB;
            background-color: #62e6be;
            font-weight: 400;
            justify-content: center;
            align-content: center;
            border: none;
            margin-top: -40px;
        }

        #depamtb:focus,
        #taamtb:focus {
            outline: none;
        }

        #depamtb:hover,
        #taamtb:hover {
            animation: vv 0.4s;
            color: #ea1084;
        }

        @keyframes vv {
            from {
                color: whitesmoke;
            }

            to {
                color: #ea1084;
                ;
            }
        }

        ::placeholder {
            color: grey;
        }

        #taamti1::placeholder {
            color: grey;
            font-size: 90%;
            font-family: "Courier";
            padding: 20px;
        }

        #prompts {
            color: red;
        }
        #t222{
             font-size: 25px;
             height: 400px;
             width: 550px;
        }
        
    </style>

</head>

<body id="#top" style="background-color:#212121;color:white;">
    <header>
        <span>
            <h1 class="mt-4 mb-4" style="font-size:270%; font-family:Magneto; color:#ba0b68;margin-left:20px ; text-align:left;">
                OM<sup><small>3</small></sup> bank <img width="130" src="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg" align="right" style="margin:-15px 5px" /></h1>
        </span>
    </header>
    <ul>

        <li style="float:left;margin-left: -35px;">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                <a href="#" class="button" id="button" onclick="openAd()">Account details</a>
                <a href="#" class="button" id="button" onclick="openBa()">Balance</a>
                <a href="#" class="button" id="button" onclick="openTa()">Transfer amount</a>
                <a href="#" class="button" id="button" onclick="openDe()">Transaction History</a><br><br><br>
                <a href="#" class="button" id="button" onclick="openEm()">Support</a>
            </div>
            <span id="menu" onclick="openNav()">&#9776; meNu</span>

            <script>
                function openEm() {
                    document.getElementById("bg-modal5").style.display = "flex";
                    document.getElementById("mySidenav").style.width = "0";
                }

                function closeEm() {
                    document.getElementById("mySidenav").style.width = "300px";
                    document.getElementById("bg-modal5").style.display = "none";
                }

                function openTa() {
                    document.getElementById("bg-modal4").style.display = "flex";
                    document.getElementById("mySidenav").style.width = "0";
                }

                function closeTa() {
                    document.getElementById("mySidenav").style.width = "300px";
                    document.getElementById("bg-modal4").style.display = "none";
                }

                function openDe() {
                    document.getElementById("bg-modal3").style.display = "flex";
                    document.getElementById("mySidenav").style.width = "0";
                }

                function closeDe() {
                    document.getElementById("mySidenav").style.width = "300px";
                    document.getElementById("bg-modal3").style.display = "none";
                }

                function openBa() {
                    document.getElementById("bg-modal2").style.display = "flex";
                    document.getElementById("mySidenav").style.width = "0";
                }

                function closeBa() {
                    document.getElementById("mySidenav").style.width = "300px";
                    document.getElementById("bg-modal2").style.display = "none";

                }

                function openAd() {
                    document.getElementById("bg-modal1").style.display = "flex";
                    document.getElementById("mySidenav").style.width = "0";
                }

                function closeAd() {
                    document.getElementById("mySidenav").style.width = "300px";
                    document.getElementById("bg-modal1").style.display = "none";

                }

                function openNav() {
                    document.getElementById("mySidenav").style.width = "300px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
            </script>
        </li>
        <li style="float:right;margin-right: 5px;">
            <?php
            if (isset($_SESSION['username'])) {
                echo "
                <a id='anav' href='logo.php' title='Sign out'>Log out</a>";
            } else if (!isset($_SESSION['username'])) {
                echo "
                <a id='anav' href='logi.php' title='Sign in'>Log in</a>";
            }

            ?>
        </li>
    </ul>
    <div class="container-fluid">




        <div class="col-md-10 offset-1 border-bottom border-secondary ">
            <h1 id="he1" class="mt-5 mb-4"><span>Good to see you <?php echo $sname ?>!</span></h1>
        </div>

        <div class="wrap2 col-md-10 offset-1 mt-5 border-bottom border-secondary">
            <h2 class="sm-head2 mt-5 mb-4">Explore the benefits of a Om<small><b><sup>3</sup></b></small> banking
                account</h2>
            <div class="mb-5">
                <div class="card-deck">
                    <div class="row">
                        <div class="card special-card">
                            <div class="card-body">
                                <img class="card-img-top mb-3" src="https://qphs.fs.quoracdn.net/main-qimg-6e933f3f34b5aa0fbf0ffe11bb22e414">
                                <h4 class="card-title">Digital Wallets</h4>
                                <h6 class="card-text">Pair your debit card with Mango Pay® and earn rewards on
                                    qualifying purchases.</h6>
                            </div>
                        </div>
                        <div class="card special-card">
                            <div class="card-body">
                                <img class="card-img-top mb-3" src="https://qphs.fs.quoracdn.net/main-qimg-056dc83f27c7dd19513924d4aa114c90">
                                <h4 class="card-title">Fraud protection</h4>
                                <h6 class="card-text">A comprehensive set of features and tools to help protect your
                                    checking account from fraud.</h6>
                            </div>
                        </div>
                        <div class="card special-card">
                            <div class="card-body">
                                <img class="card-img-top mb-3" src="https://qphs.fs.quoracdn.net/main-qimg-211a885e8390754fc08317246ef9b0a6">
                                <h4 class="card-title">60,000+ fee-free ATMs</h4>
                                <h6 class="card-text">Easily access the cash from your checking account at stores you
                                    already visit.</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="card special-card">
                            <div class="card-body">
                                <img class="card-img-top mb-3" src="https://qphs.fs.quoracdn.net/main-qimg-d16e09ca906e2dc3e4ab66eae46a9cc0">
                                <h4 class="card-title">Mobile first banking</h4>
                                <h6 class="card-text">Use the Om<small><b><sup>3</sup></b></small> App to complete all
                                    your banking needs—in the palm of your hand.</h6>
                            </div>
                        </div>
                        <div class="card special-card">
                            <div class="card-body">
                                <img class="card-img-top mb-3" src="https://qphs.fs.quoracdn.net/main-qimg-1930ad2e9e444f251da86b1dd34b062b">
                                <h4 class="card-title">Send money with Om<small><b><sup>3</sup></b></small>®</h4>
                                <h6 class="card-text">Send money to and receive money from friends and family.</h6>
                            </div>
                        </div>
                        <div class="card special-card">
                            <div class="card-body ">
                                <img class="card-img-top mb-3" src="https://qphs.fs.quoracdn.net/main-qimg-01477c3d427b1c1d34e2c5a96a125cfa">
                                <h4 class="card-title">FDIC insured</h4>
                                <h6 class="card-text">Checking account deposits are FDIC-insured up to the maximum
                                    allowed by law.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wrap col-md-10 offset-1 border-bottom border-secondary">
            <h2 class=" sm-head mt-5 mb-5">Money Matters Blog</h2>
            <div class="mb-5">
                <div class="card-deck mb-5">
                    <div class="card bg-danger">
                        <img class="card-img-top" src="https://www.synchronybank.com/images/banking-terms-everyone-should-know-1140x570.gif">
                        <div class="card-body ">
                            <h4 class="card-title">SAVING & SPENDING</h4>
                            <h6 class="card-text ">Banking terms everyone should know</h6>
                            <a href="https://www.synchronybank.com/blog/banking-terms-to-know/" target="_blank" class="stretched-link"></a>
                        </div>
                    </div>
                    <div class="card bg-dark">
                        <img class="card-img-top" src="https://www.synchronybank.com/images/financial-planning-for-those-who-dont-like-finances-1140x570.jpg">
                        <div class="card-body ">
                            <h4 class="card-title">SAVING & SPENDING</h4>
                            <h6 class="card-text ">Financial planning for those who don't like finances</h6>
                            <a href="https://www.synchronybank.com/blog/planning-do-not-like-finances/" target="_blank" class="stretched-link pe-none" tabindex="-1" aria-disabled="true"></a>
                        </div>
                    </div>
                    <div class="card bg-primary">
                        <img class="card-img-top" src="https://www.synchronybank.com/images/retirement-calculations-1140x570.gif">
                        <div class="card-body">
                            <h4 class="card-title">SAVING & SPENDING</h4>
                            <h6 class="card-text fs-10">10 Questions to Help Accurately Calculate Your Retirement
                                Numbers</h6>
                            <a href="https://www.synchronybank.com/blog/ultimate-guide-to-retirement-calculations/" target="_blank" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    

    <div id="bg-modal1" class="bg-modal1">
        <div id="ad-content">
            <div onclick="closeAd()" class="close text-light">+</div>
            <div class="text-warning mb-4 mt-3 offset-3 col-md-6">
            <h3 id="headmen">Account Details</h3>
            </div>
            <div align="middle">
            <table id="t222">
                    <tr id="t223">
                        <th scope="row">Account number</th>
                        <td><?php echo $sid ?></td>
                    </tr>
                    <tr id="t223">
                        <th scope="row">Username</th>
                        <td><?php echo $sname ?></td>
                    </tr>
                    <tr id="t223">
                        <th scope="row">E-mail</th>
                        <td><?php echo $semail ?></td>
                    </tr>
                    <tr id="t223">
                        <th scope="row">Phone number</th>
                        <td><?php echo $sphn ?></td>
                    </tr>
                    <tr id="t223">
                        <th scope="row">Address</th>
                        <td><?php echo $sadd ?></td>
                    </tr>
                    <tr id="t223">
                        <th scope="row">Age</th>
                        <td><?php echo $sage ?></td>
                    </tr>
                    <tr id="t223">
                        <th scope="row">Gender</th>
                        <td><?php echo $sgen ?></td>
                    </tr>
                </tbody>
            </table>
                
            </div>
        </div>
    </div>

    <div id="bg-modal2" class="bg-modal2">
        <div id="ba-content" class="ba-content bg-dark">
            <div onclick="closeBa()" class="close text-light">+</div>
            <div class="text-warning mb-4 mt-3 offset-3 col-md-6">
                <h3 id="headmen2" class="ml-1">Account Balance</h3>
            </div>
            <div id="baid" class="text-left ml-5">
                Name: &emsp;<?php echo $sname ?><br>
                Acc no:&emsp;<?php echo $sid ?><br>Balance: <br>
            </div>
            <div class="mon text-center ml-1">
                $ <?php echo $sbal ?>
            </div>
        </div>
    </div>

    <div id="bg-modal3" class="bg-modal3">
        <div id="de-content" class="de-content bg-dark">
            <div onclick="closeDe()" class="close text-light">+</div>
            <div class="text-warning mb-4 mt-3 offset-4 col-md-4">
                <h3 id="headmen3" class="ml-4">Transaction History</h3>
            </div>
            <div>
                <p class="ml-3 mt-4 text-justify" style="color:#9a9a9a;">Online transaction is a payment method in which
                    the transfer of fund or money happens online over
                    electronic fund transfer.
                    Online transaction process (OLTP) is secure and password protected.
                    Three steps involved in the online transaction are Registration, Placing an order, and, Payment.
                    Online transaction processing (OLTP) is information systems that facilitate and manage
                    transaction-oriented applications,
                    typically for data entry and retrieval transaction processing.
                    So online transaction is done with the help of the internet.
                    It can't take place without a proper internet connection.
                    Online transactions occur when a process of buying and selling takes place through the internet.
                    When a consumer purchases a product or a service online,
                    he/she pays for it through online transaction.
                    Let's find out more about it.</p>
            </div>
            <table style="font-size:120%;" class="table table-borderless text-light mt-3 mb-5">
                <tbody>
                    <tr>
                        <th scope="col">From A/c No.</th>
                        <th scope="col">To A/c No.</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction type</th>
                    </tr>

                    <?php
                    if (empty($_SESSION['username'])) {
                        $tempid = '';
                    } else {
                        $tempid = $_SESSION['accnum'];
                    }

                    $conn = mysqli_connect('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
                    $tab = "SELECT fromid,toid,amount FROM tra WHERE fromid='$tempid' OR toid='$tempid' ORDER BY id DESC";
                    $re = mysqli_query($conn,$tab);
                    if ($re->num_rows > 0) {
                        while ($ro = $re->fetch_assoc()) {
                            echo "<tr style='font-size:70%;'><td>" . $ro['fromid'] . "</td><td>" . $ro['toid'] . "</td><td>" . $ro['amount'] . "</td><td>" . ($ro['fromid'] == $tempid ? "Debited" : "Credited") . "</td></tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    }
                    $conn->close();
                    ?>
            </table>
        </div>

    </div>


    <div id="bg-modal4" class="bg-modal4">
        <div id="ta-content" class="ta-content bg-dark">
            <div onclick="closeTa()" class="close text-light">+</div>
            <div class="text-warning mb-5 mt-3 offset-3 col-md-6">
                <h3 id="headmen4" class="ml-1">Transfer Amount</h3>
            </div>
            <div id="baid" class="text-left ml-5">
                Name: &emsp;<?php echo $sname ?><br>
                Acc no:&emsp;<?php echo $sid ?><br><br>
            </div>
            <div class="text-left">
                <form method="post" name="transs" id="trans" action="home.php">

                    <label for="trani" style="font-size:90%;" class="text-left ml-5">To A/c no:</label>
                    <input id="taamti1" type="tel" name="trani" minlength="10" maxlength="10" placeholder="Enter a/c number" value="<?php echo $tavali ?>">
                    <p id="prompts" class="ml-5" style="font-size:80%;">
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $errors['tran1']; ?></p>
                    <label for="trana" style="font-size:90%;" class="text-left ml-5">Transfer amount:</label><br>
                    <input class="col-md-8 offset-2 mt-1 mb-2 pl-3" id="taamti2" type="tel" name="trana" min="500" max="50000" minlength="3" maxlength="6" placeholder="Enter amount" value="<?php echo $tavala ?>" required>
                    <p id="prompts" class="ml-5" style="font-size:80%;">
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;<?php echo $errors['tran2']; ?></p>

                    <input type="submit" style="margin-top:px" class="col-md-4 offset-4" id="taamtb" name="transfer" value="Transfer">
                </form>
            </div>
        </div>
    </div>

    <div id="bg-modal5" class="bg-modal5">
        <div id="em-content" class="em-content bg-dark">
            <div onclick="closeEm()" class="close text-light">+</div>
            <div class="text-warning mb-3 mt-3 offset-3 col-md-6">
                <h3 id="headmen5" class="ml-1">We're here to help!</h3>
            </div>
            <div class="text-left ml-5 mb-2" style="font-size:100%;color:#a2a5ab">
                Please feel free to reach out if you have any questions,
                we are 100% responsive and reply instantly.
                Please send us an email at <strong class="text-light">om3banking@gmail.com</strong> or you can fill out
                the form below.
                This page will also HELP you.<br>
            </div>
            <div class="text-left">
                <form method="post" name="help" id="help" action="home.php">

                    <label for="hname" style="font-size:90%;" class="text-left ml-5">Name:&ensp;</label>
                    <input id="hname" type="text" name="hname" minlength="6" maxlength="50" class="col-md-6" placeholder="Enter your name" value="<?php echo $hsname ?>" required><br>

                    <label for="hmail" style="font-size:90%;" class="text-left ml-5">E-mail:&nbsp;</label>
                    <input id="hmail" type="email" name="hmail" minlength="5" maxlength="50" class="col-md-6" placeholder="Enter your mail" value="<?php echo $hsmail ?>" required><br>

                    <label for="hsub" style="font-size:90%;" class="text-left ml-5">Subject:</label>
                    <input id="hsub" type="text" name="hsub" minlength="5" maxlength="30" class="col-md-6" placeholder="Enter the subject" value="<?php echo $hssub ?>" required><br>

                    <label for="htarea" class="text-left ml-5"></label>
                    <textarea id="htarea" name="htarea" rows="4" cols="91" align="middle" placeholder="Tell us about your problem" value="<?php echo $hstarea ?>" required></textarea>

                    <input type="submit" style="margin-top:0px" class="col-md-4 offset-4" id="hsend" name="hsend" value="Send">
                </form>
            </div>
        </div>
    </div>
</body>
<footer style="background-color:#252525;">
    <div id="ff">
        <p id="foot1" align="middle">Contact us</p>
        <div align="middle">
            <a href="https://www.facebook.com/profile.php?id=100005647128902" target="_blank" title="Facebook" class="fa fa-facebook"></a>
            <a href="https://twitter.com/_v4vishnu_" target="_blank" title="Twitter" class="fa fa-twitter"></a>
            <a href="https://www.instagram.com/_v4vishnu_/" target="_blank" title="Instagram" class="fa fa-instagram"></a>
            <a href="https://www.linkedin.com/in/vishnu-m-6092811a7/" target="_blank" title="Linkedin" class="fa fa-linkedin"></a>
        </div>
    </div>
</footer>

</html>