<?php
session_start();
$email ='';
$errors= array('eemail'=>'','pwd'=>'','logg'=>'');

if (isset($_POST['submit'])) {
    
    if(empty($_POST['eemail'])){
        $errors['eemail']='Email field cannot be blank.';
    }else{
        $email=$_POST['eemail'];
        $connect= new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
        $email_check_query = "SELECT * FROM test WHERE eemail='$email' LIMIT 1";
        $result1 = mysqli_query($connect, $email_check_query);
        $user = mysqli_fetch_assoc($result1);
        
        if($result1->num_rows>0){
            $password=$_POST['pwd'];
            $pass_check_query="SELECT * FROM test WHERE pwd='$password' LIMIT 1";
            $result2 = mysqli_query($connect,$pass_check_query);
            if($result2->num_rows>0){
                $eemail_check_query="SELECT * FROM test WHERE eemail='$email'";
                $res=mysqli_query($connect,$eemail_check_query);
                $resch=mysqli_num_rows($res);
                if($resch>0){
                    while($row=mysqli_fetch_assoc($res)){
                        $_SESSION['accnum']=$row['id'];
                        $_SESSION['username']=$row['uname'];
                        $_SESSION['email']=$row['eemail'];
                        $_SESSION['phone']=$row['phn'];
                        $_SESSION['address']=$row['addrs'];
                        $_SESSION['age']=$row['age'];
                        $_SESSION['gender']=$row['gen'];
                        $_SESSION['password']=$row['pwd'];
                        $_SESSION['balance']=$row['balance'];
                    }
                }
                
                $errors['logg']="Login&nbsp;Successful !";
                echo"
                <script>
         window.location.href='home.php';
         </script>
                ";
            }else{
                $errors['pwd']='Invalid password';
            }
        }else{
            $errors['eemail']='Invalid username';
        }
        
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        h1 {
            font-family: Harlow Solid;
            text-align: center;
        }

        #sect {
            background-color: #333333;
            margin-left: 30%;
            margin-right: 30%;
            border-radius: 10px;
            width: 40%;
            padding: 1px;
            box-shadow: 8px 8px 15px rgb(23, 23, 23);

        }

        ul {
            list-style-type: none;
            padding-top: 7px;
            padding-bottom: 30px;
            margin-bottom: 60px;
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
        }

        input[type=email],
        [type=password] {
            width: 26vw;
            padding: 10px;
            padding-left: 2vw;
            font-size: 100%;
            margin: 5px 0px;
            border-radius: 10px;
            border: 1px solid white;
            box-shadow: 6px 6px 15px  rgb(28, 28, 28);
        }

        label[for=eemail],
        [for=pwd] {
            font-size: 135%;
            font-family: Berlin Sans FB;

        }

        input[type=submit] {
            color: white;
            font-size: 120%;
            padding: 13px 30px;
            border-radius: 20px;
            font-family: Berlin Sans FB;
            background-color: #62e6be;
            font-weight: 500;
            border: 4px solid #62e6be;

        }

        input[type=submit]:hover {
            color: #ba0b68;
            background-color: #32dfab;
            border: 4px solid #32dfab;
        }

        #sub {
            text-align: center;
            padding: 10px 0px;
            padding-top: 20px;
            padding-bottom: 25px;
        }

        #s {
            padding-top: 10px;
            color: white;
            margin: 5px 0px;
            text-decoration: none;
            font-family: Berlin Sans FB;
            font-size:120%;
        }

        #s:hover {
            border-bottom: 2px solid #32dfab;
            color: #eb52a3;
            padding-bottom: 3px;
        }

        #ff {
            box-shadow:0px -4px 15px 3px rgb(23, 23, 23);
            margin-top: 100px;
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

        #inn {
            text-align: left;
            margin-left: 5.5vw;
            margin-bottom: 8px;
        }
        #eun,
        #epwd{
            color: rgb(226, 0, 0);
            text-align: left;
            margin-left: 5.5vw;
            margin-top: 2px;
            font-family: "helvetica";
        }
        #elog{
        color: mistyrose;
        text-align: center;
        font-weight: 600;
        font-size:120%;
        margin-top: 2px;
        font-family: "Lucida Handwriting";
        padding-top: 5px;
        padding-bottom: 5px;
        text-shadow: 1px 1px 40px whitesmoke;
        animation: lo 2s;
        }
        
        #tit{
            font-size: 280%; 
            font-family: Berlin Sans FB;
            margin: 43px 0px;
            text-align: center;
            text-shadow: 2px 2px 5px #ba0b68;
            animation: titt 2s;
        }
    
        @keyframes titt{
            from{
                text-shadow: 2px 2px 5px #333333;
                color: #333333;
            }to{
                text-shadow: 2px 2px 5px #ba0b68;
                color: smokewhite;
            }
        }

    
    </style>

    <link rel="icon" type="image/x-icon" href="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg">
    <title>
        OM3 bank - Login
    </title>
    


</head>

<body style="background-color:#212121;color:white;">
    <header>
        <span>
            <h1 style="font-size:270%; font-family:Magneto; color:#ba0b68;margin-left:20px ; text-align:left;">
                OM<sup><small>3</small></sup> bank <img width="130"
                    src="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg" align="right"
                    style="margin:-15px 5px" /></h1>
        </span>
        <!--<h3 style="color:white; font-family:Forte;"><i>Welcome USER,</i></h3>-->
    </header>
    <ul>

        <li style="float:left;margin-left: -35px;">
            <a id="anav" href="index.html">About us</a>
            <!--welcome page address-->
        </li>
        <li style="float:right;margin-right: 5px;">
            <a id="anav" href="signu.php" title="Create new account">Sign up</a>
        </li>
        <!--<li style="float:right;margin-right: 5px;">
              <a id="anav" href="#"></a> 
        </li> -->
    </ul>
    <div id="sect">
        
            <p id="tit">Login</p>
            <p id="elog"><?php echo $errors['logg'];?></p>
            <div>
                <form name="form" action="logi.php" id="form" align="middle" method="post">


                    <label for="eemail">
                        <p id="inn"><img width="24" style="padding-right: 3px;margin-bottom: -3px;"
                                src="https://qphs.fs.quoracdn.net/main-qimg-e9ace2e2dac30ed544ae393f52a0a0e0"> Username</p>
                    </label>
                    <input type="email" id="un" name="eemail" value="<?php echo $email?>" placeholder="Enter your mail id">
                    <p id="eun" class="emsg"><?php echo $errors['eemail'];?></p>


                    <label for="pwd">
                        <p id="inn"><img width="24" style="padding-right: 3px;margin-bottom: -3px;"
                                src="https://qphs.fs.quoracdn.net/main-qimg-a10e260edc0be6f00820b637a6fc710e"
                                alt=""> Password</p></label>
                    <input type="password" id="pwd" name="pwd" placeholder="Enter your password">
                    <p id="epwd" class="emsg"><?php echo $errors['pwd'];?></p>


                    <a id="s" href="signu.php">Click to create a new account !</a>


                    <div id="sub">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>
            </div>
        
    </div>
</body>

<!--
    <script>
           function lin(){
            let c=null;
            let e = document.forms["form"]["un"].value;
            let p = document.forms["form"]["pwd"].value;
            if (e == '' || e == null) {
                document.getElementById("eun").innerHTML = 'Username field cannot be empty.';
                c=1;
            }
            if (p == '' || p == null) {
                document.getElementById("epwd").innerHTML = 'Password field cannot be empty.';
                c=1;
            }
            if(c==1){
                return false;
            }
            else{
                alert('Successfully logged in.');
                
                return true;
            }
           }
    </script>
-->

<footer style="background-color:#252525;">
    <div id="ff">
        <p id="foot1" align="middle">Contact us</p>
        <div align="middle">
            <a href="https://www.facebook.com/profile.php?id=100005647128902" target="_blank" title="Facebook"
                class="fa fa-facebook"></a>
            <a href="https://twitter.com/_v4vishnu_" target="_blank" class="fa fa-twitter" title="Twitter"></a>
            <a href="https://www.instagram.com/_v4vishnu_/" target="_blank" class="fa fa-instagram" title="Instagram"></a>
            <a href="https://www.linkedin.com/in/vishnu-m-6092811a7/" target="_blank" class="fa fa-linkedin" title="Linkedin"></a>
        </div>
    </div>

</footer>

</html>