<?php

try {
    if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['userlevel'])&&isset($_GET['birthdate'])) {
        $a = $_GET['username'];
        $b = $_GET['password'];
        $c = $_GET['userlevel'];
        $d = $_GET['birthdate'];


        $db=new mysqli('localhost','root','','hospital');


        if ($c==2){


            $qf=" select * from doctor";
            $res=$db->query($qf);

            $row = $res->fetch_object();

            if ($b== $row-> pass ){

                header('location:sign_up.php');
                echo "use different pass";

            }
            else{
                $qry="INSERT INTO `doctor` (`name`, `pass`, `userlevel`, `birthdate`,`specialization`) VALUES ('".$a."', '".$b."','".$c."','".$d."','medecine')";

                header('location:loginpage.php');

            }

        }

        elseif($c==3){

            $qf=" select * from nurse";
            $res=$db->query($qf);

            $row = $res->fetch_object();

            if ($b== $row-> pass ){

                header('location:sign_up.php');
                echo "use different pass";

            }
            else{
                $qry="INSERT INTO `nurse` (`name`, `pass`, `userlevel`, `birthdate`,`shift`) VALUES ('".$a."', '".$b."','".$c."' ,'".$d."','evening')";

                header('location:loginpage.php');
            }

        }


        $res=$db->query($qry);
        $db->commit();

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
    <meta charset="UTF-8">
    <title>sign up</title>


    <style>

        #s{
            width: 75%;
            align-content: center;
            font-size: 2rem;
            font-family: Arial;
            background-color:lightgray;



        }
        #userlevel{
            position:absolute;
            top :120px;
            left:500px;
            width: 650px;
            height: 250px;
            padding: 0px;
            margin: 0px;
            font-size: 2rem;
            :hover{color: red;}
            background-color: white;
        }

        body{
            background-image: url("byee.png");

        }


    </style>
</head>



<body>
<h1 align="center" style="font-size: 4rem"> Welcome To Sign Up Page</h1>
<br>
<form action="sign_up.php"  method="get">

    <table>
        <tr>

            <td>
                <label style="font-size: 2rem"><b> Username: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" name="username">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"> <b>  Password:   </b> </label>
            </td>
            <td>
                <input size="30"  style="padding:5px" name="password" type="password">
            </td>
        </tr>

        <tr>

            <td>
                <label style="font-size: 2rem"> <b>  User Level:   </b> </label>

            </td>
            <td>
                <input size="30"  style="padding:5px"  type="number" min="2"  max="3" name="userlevel" >

            </td>
        </tr>

        <tr>
            <td>
                <label style="font-size: 2rem"> <b>  Birth Date:   </b> </label>

            </td>
            <td>
                <input size="30"  style="padding:5px"  name="birthdate" placeholder="yyyy-mm-dd">

            </td>
        </tr>

        <tr>

            <td></td>
            <td> <input id="s" type="submit" value="sign up" size="3" width="100%"> </td>


        </tr>

    </table>

</form>


<div id="userlevel">
    <p><pre><b>
    User Level Only Doctor And Nurse:
    2-) '2' for Doctor
    3-) '3' for nurse

</b>
</pre>
    </p>
</div>

</body>
</html>