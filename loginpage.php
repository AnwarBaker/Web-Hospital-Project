<?php
session_start();
try {
    if (isset($_GET['name']) && isset($_GET['pass']) && isset($_GET['userlevel'])) {
        $a = $_GET['name'];
        $b = $_GET['pass'];
        $c = $_GET['userlevel'];


        $db=new mysqli('localhost','root','','hospital');


        if($c==1){
            $qry=" select * from admin ";
            $res=$db->query($qry);
            for($i=0;$i<$res->num_rows;$i++){
                $row = $res->fetch_object();
                if ($a ==$row->name && $b==$row->pass ){
                    $_SESSION['ismember']=1;
                    $_SESSION['username']=$a;
                    header('location:adminpage.php');

            }elseif($a!=$row->name ){
            echo "<br>wrong name";
            }
            elseif ($b!=$row->pass ){
                echo "<br>wrong password";
            }
}}


        if($c==2){
            $qry=" select * from doctor ";
            $res=$db->query($qry);
            for($i=0;$i<$res->num_rows;$i++){
                $row = $res->fetch_object();
                if ($a ==$row->name && $b==$row->pass ){
                    $_SESSION['ismember']=2;
                    $_SESSION['username']=$a;
                    header('location:doctorpage.php');

                }elseif($a!=$row->name ){
                    echo "<br>wrong name";
                }
                elseif ($b!=$row->pass ){
                    echo "<br>wrong password";
                }
            }}

        if($c==3){
            $qry=" select * from nurse ";
            $res=$db->query($qry);
            for($i=0;$i<$res->num_rows;$i++){
                $row = $res->fetch_object();
                if ($a ==$row->name && $b==$row->pass ){
                    $_SESSION['ismember']=3;
                    $_SESSION['username']=$a;
                    header('location:nursepage.php');

                }else{
                    echo "<br>wrong password";
                }
            }}


        $db->close();

    }
}
catch(Exception $e){

    echo "enter values pls";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" type="text/css" href=".idea/style.css" >

    <meta charset="UTF-8">
    <title>Login page</title>
    <style>
        #o{
            font-size: 2rem;
            background-color : lightgray;

        }
        #l{
            font-size: 2rem;
            background-color : lightgray;

        }

        #d{
            position:absolute;
            top :110px;
            left:500px;
            width: 450px;
            height: 250px;
            padding: 0px;
            margin: 0px;
            font-size: 2rem;


        }
        body{background-image: url("byee.png");}
    </style>

</head>



<body>





<h1 align="center" style="font-size: 4rem"> Welcome To Login Page</h1>
<form action="loginpage.php" method="get" style="padding : 40px ">

    <table>
        <tr>

            <td>
                <label style="font-size: 2rem"><b> Username: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"> <b>  Password:   </b> </label>
            </td>
            <td>
                <input size="30"  style="padding:5px" type="password" name="pass">
            </td>
        </tr>

        <tr>

            <td>
                <label style="font-size: 2rem"> <b>  User Level:   </b> </label>

            </td>
            <td>
                <input size="30"  style="padding: 5px" name="userlevel" type="number" min="1" max="3" width="100%">

            </td>
        </tr>

        <tr>
            <td>
                <input id="l" style="font-size: 2rem" width="100%" type="submit" value="login" >
            </td>
            <td>
                <input onclick="window.location.href='signupgeneral.php'" id="o" value="sign up" size="3">

            </td>
        </tr>

    </table>

</form>
<div id="d">
    <p><pre><b>
    Userl Level :
    1-) '1' for Admin
    2-) '2' for Doctor
    3-) '3' for nurse

</b>
</pre>
    </p>
</div>

</body>
</html>
