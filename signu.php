<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <!--   <link rel="stylesheet" href="bootstrap.css">  -->
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

    input[type=text],
    [type=email],
    [type=password],
    [type=tel],
    [type=number] {
        width: 26vw;
        padding: 10px;
        padding-left: 2vw;
        font-size: 100%;
        margin: 5px 0px;
        border-radius: 10px;
        border: 1px solid white;
        box-shadow: 6px 6px 15px rgb(28, 28, 28);
    }

    label[for=uname],
    [for=pwd],
    [for=phn],
    [for=addrs],
    [for=age],
    [for=eemail],
    #gl {
        font-size: 135%;
        font-family: Berlin Sans FB;

    }

    #inn {
        text-align: left;
        margin-left: 5.5vw;
        margin-bottom: 8px;
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
        text-align: left;
    }

    #prom {
        margin-left: 5.5vw;
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

    #gender {

        font-family: Berlin Sans FB;
        font-size: 120%;
    }

    input[type=radio] {
        font-family: Berlin Sans FB;
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
        box-shadow: 0px -4px 15px 3px rgb(23, 23, 23);
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

    #ena,
    #eem,
    #epw,
    #epn,
    #ead,
    #eag {
        color: rgb(226, 0, 0);
        text-align: left;
        margin-left: 5.5vw;
        margin-top: 2px;
        font-family: "helvetica";
        animation: prom 2s;
    }


    #egen {
        color: rgb(226, 0, 0);
        text-align: left;
        margin-left: 5.5vw;
        margin-top: 2px;
        font-family: "helvetica";
        margin-bottom: 30px;
        animation: prom 1s;
    }
    #ereg{
        color: mistyrose;
        text-align: center;
        font-weight: 600;
        font-size:120%;
        margin-top: 2px;
        font-family: "Lucida Handwriting";
        padding-top: 5px;
        padding-bottom: 5px;
        text-shadow: 1px 1px 50px whitesmoke;
    }
    #tit{
            font-size: 280%; 
            font-family: Berlin Sans FB;
            margin: 43px 0px;
            text-align: center;
            text-shadow: 2px 2px 5px #ba0b68;
            animation: titt 1s;
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
        
        @keyframes prom {
            from{
               color:#333333;
            }to{
                color:rgb(226,0,0);
            }
        }
    </style>

    <link rel="icon" type="image/x-icon" href="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg">
    <title>
        OM3 bank - Sign up
    </title>
<script></script>


    <?php
$count=1;
$name = $email = $phone = $address = $age= $balance='';
$errors= array('uname'=>'','eemail'=>'','phn'=>'','addrs'=>'','age'=>'','gen'=>'','pwd'=>'','regis'=>'');


if (isset($_POST['submit'])) {
    if(empty($_POST['uname'])){
        $errors['uname']='Name field cannot be blank.';
    } else{
        $name=$_POST['uname'];
        ++$count;
    }


    if(empty($_POST['eemail'])){
        $errors['eemail']='Email field cannot be blank.';
    }else{
        
        $email=$_POST['eemail'];
        $connect= new mysqli('sql6.freesqldatabase.com', 'sql6506138', '29xSAlcdfJ', 'sql6506138');
        $user_check_query = "SELECT * FROM test WHERE eemail='$email' LIMIT 1";
        $result = mysqli_query($connect, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if($result->num_rows>0){
            $errors['eemail']='Email already exists.';
        }else{
            ++$count;
        }
        
    }

    if(empty($_POST['phn'])){
        $errors['phn']='Phone field cannot be blank.';
    }else{
        $phone=$_POST['phn'];
        ++$count;
    }

    if(empty($_POST['addrs'])){
        $errors['addrs']='Address field cannot be blank.';
    }else{
        $address=$_POST['addrs'];
        ++$count;
    }

    if(empty($_POST['age'])){
        $errors['age']='Age field cannot be blank.';
    }else{
        $age=$_POST['age'];
        ++$count;
    }

    if(empty($_POST['gen'])){
        $errors['gen']='Gender field cannot be blank.';
    }else{
        $gender=$_POST['gen'];
        ++$count;
    }

    if(empty($_POST['pwd'])){
        $errors['pwd']='Password field cannot be blank.';
    }else{
        $password=$_POST['pwd'];
        ++$count;
    }
    if($count==8){
    
     if($connect->connect_error){
            die('Connection Failed : '.$connect->connect_error);
            $count=1;
     }else{
         $balance=50000;
         $stmt = $connect->prepare("insert into test(uname,eemail,phn,addrs,age,gen,pwd,balance)values(?,?,?,?,?,?,?,?)");
         $stmt->bind_param("ssisissi",$name,$email,$phone,$address,$age,$gender,$password,$balance);
         $stmt->execute();
         $errors['regis']='Registration&nbsp;Successful !';
         $name = $email = $phone = $address = $age=$balance='';
         echo"
         <script>
         window.location.href='logi.php';
         </script>
         ";
         $stmt->close();
         $connect->close();
         $count=1;
         
        }
    }
}

?>




</head>

<body style="background-color:#212121;color:white;">

    <header>
        <span>
            <h1 style="font-size:270%; font-family:Magneto; color:#ba0b68;margin-left:20px ; text-align:left;">
                OM<sup><small>3</small></sup> bank <img width="130"
                    src="https://www.logo.wine/a/logo/Apache_Tomcat/Apache_Tomcat-Logo.wine.svg" align="right"
                    style="margin:-15px 5px" /></h1>
        </span>

    </header>
    <ul>
        <li style="float:left;margin-left: -35px;">
            <a id="anav" href="index.html">About us</a>

        </li>
        <li style="float:right;margin-right: 5px;">
            <a id="anav" href="logi.php" title="Sign in">Log in</a>
        </li>
    </ul>

    <div id="sect">

        <p id="tit">Sign up</p>
        <p id="ereg"><?php echo $errors['regis'];?></p>
        <div>
            <form name="form" id="form" action="signu.php" align="middle" method="post">


                <label for="uname">
                    <p id="inn"><img width="24" style="padding-right: 4px;margin-bottom: -3px;"
                            src="https://qphs.fs.quoracdn.net/main-qimg-e9ace2e2dac30ed544ae393f52a0a0e0" alt=""> Name
                    </p>
                </label>
                <input type="text" id="na" placeholder="Enter your name" value="<?php echo $name?>" name="uname">
                <p id="ena" class="emsg"><?php echo $errors['uname'];?></p>


                <label for="eemail">
                    <p id="inn"><img width="24" style="padding-right: 9px;margin-bottom: -3px;"
                            src="https://qphs.fs.quoracdn.net/main-qimg-7425e73838328973a423d086095fb557" alt="">E-mail
                    </p>
                </label>
                <input type="email" id="em" placeholder="Enter your mail" value="<?php echo $email?>" name="eemail">
                <p id="eem" class="emsg"><?php echo $errors['eemail'];?></p>


                <label for="phn">
                    <p id="inn"><img width="24" style="padding-right: 9px;margin-bottom: -3px;"
                            src="https://qphs.fs.quoracdn.net/main-qimg-da2bf0314d612006ccc75dcae0e1720d" alt="">Phone
                    </p>
                </label>
                <input type="tel" id="pn" placeholder="Phone number without country code" name="phn" value="<?php echo $phone?>" minlength="10"
                    maxlength="10">
                <p id="epn" class="emsg"><?php echo $errors['phn'];?></p>


                <label for="addrs">
                    <p id="inn"><img width="24" style="padding-right: 9px;margin-bottom: -3px;"
                            src="https://qphs.fs.quoracdn.net/main-qimg-bd828e83f9edd1580febf1901cbd2c89" alt="">Address
                    </p>
                </label>
                <input type="text" id="ad" placeholder="Enter your address" value="<?php echo $address?>" name="addrs">
                <p id="ead" class="emsg"><?php echo $errors['addrs'];?></p>


                <label for="age">
                    <p id="inn"><img width="24" style="padding-right: 9px;margin-bottom: -3px;"
                            src="https://qphs.fs.quoracdn.net/main-qimg-f5e200815f308b321c9c1e6cf561497b" alt="">Age</p>
                </label>
                <input type="number" id="ag" placeholder="Enter your age" value="<?php echo $age?>" min="18" max="60" minlength="2" name="age">
                <p id="eag" class="emsg"><?php echo $errors['age'];?></p>


                <p id="gl" style="margin-bottom: 25px;"><img width="24" style="padding-right: 9px;margin-bottom: -3px;"
                        src="https://qphs.fs.quoracdn.net/main-qimg-514f581368d82b30416c71d1457e8104" alt="">Gender</p>
                <div id="gender" align="middle">
                    <label" for="gen">
                        <input type="radio" name="gen" id="ma" value="Male">Male&emsp;
                        <input type="radio" name="gen" id="fe" value="Female">Female&emsp;
                        <input type="radio" name="gen" id="oo" value="Other">Other
                        </label>
                </div>
                <p id="egen" class="emsg"><?php echo $errors['gen'];?></p>


                <label for="pwd">
                    <p id="inn"><img width="24" style="padding-right: 8px;margin-bottom: -3px;"
                            src="https://qphs.fs.quoracdn.net/main-qimg-a10e260edc0be6f00820b637a6fc710e"
                            alt="">Password</p>
                </label>
                <input type="password" id="pw" name="pwd" placeholder="Enter your password" minlength="6"
                    maxlength="20">
                <p id="epw" class="emsg"><?php echo $errors['pwd'];?></p>


                <a id="s" href="logi.php">Already registered.. login !</a>
                <div id="sub">
                    <input type="submit" name="submit" value="Sign up">
                </div>

            </form>

        </div>

    </div>
</body>



<!--
<script>  
    let id= (id)=>document.getElementById(id);

    let name=id("na"),email=id("em"),phn=id("pn"),add=id("ad"),age=id("ag"),pswd=id("pw"),form=id("form");
    let m=id("ma"),f=id("fe"),o=id("oo");
    let gende=document.getElementsByName("gen");
    let emmsg=document.getElementsByClassName("emsg");

    form.addEventListener("submit",(e)=>{
        

        eng(name,0,"Name field cannot be blank");
        eng(email,1,"Email field cannot be blank");
        eng(phn,2,"Phone field cannot be blank");
        eng(add,3,"Address field cannot be blank");
        eng(age,4,"Age field cannot be blank");
        engg(gende,5,"Gender field cannot be blank");
        eng(pswd,6,"Password field cannot be blank");

    })

    let eng=(id,serial,message)=>{
        if (id.value.trim() === '' || id.value === null) {
        emmsg[serial].innerHTML = message;
    }else{
        emmsg[serial].innerHTML = '';
    }
    }
    let engg=(id,serial,message)=>{
        if (id[0].checked == true || id[1].checked == true || id[2].checked == true) {
        emmsg[serial].innerHTML = '';
    }else{
        emmsg[serial].innerHTML = message;
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
            <a href="https://www.instagram.com/_v4vishnu_/" target="_blank" class="fa fa-instagram"
                title="Instagram"></a>
            <a href="https://www.linkedin.com/in/vishnu-m-6092811a7/" target="_blank" class="fa fa-linkedin"
                title="Linkedin"></a>
        </div>
    </div>

</footer>

</html>