<?php

echo "<script> alert('Log out successful') </script>";
session_start();
session_destroy();
//echo"<script>alert('Amount transfer successful!')</script>";
//header("location:index.html");
echo " <script> window.location.href='index.html'; </script> ";
?>