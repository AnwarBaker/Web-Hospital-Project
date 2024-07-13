<?php

try {
    if (isset($_GET['username']) && isset($_GET['password']) && isset($_GET['userlevel'])&&isset($_GET['birthdate'])) {
        $a = $_GET['username'];
        $b = $_GET['password'];
        $c = $_GET['userlevel'];
        $d = $_GET['birthdate'];


        $db=new mysqli('localhost','root','','hospital');

        if($c==1){

            $qf=" select * from admin ";

            $res=$db->query($qf);

            $row = $res->fetch_object();

                if ($b== $row-> pass ){

                   header('location:sign_up.php');
                    echo "use different pass";

                }
                else{
                    $qry="INSERT INTO `admin` (`name`, `pass`, `userlevel`, `birthdate`) VALUES ('".$a."', '".$b."','".$c."','".$d."')";
                    header('location:loginpage.php');
                }
            }

    elseif ($c==2){


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
            top :130px;
            left:500px;
            width: 450px;
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
<h1 align="center" style="font-size: 4rem"> Welcome Admin To Sign Up Page</h1>
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
                <input size="30"  style="padding:5px"  type="number" min="1"  max="3" name="userlevel" >

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