
<!DOCTYPE html>
<html lang="en">
<title>display patient page</title>

<head>
    <style>

        table{

            width: 80%;
            align-content: center;
            text-align: center;
            margin:120px;
            border : 4px black solid;
        }
        table tr{
            height: 30px;
            font-size: 2rem;
            background-color: lightgray;
            border:2px black dashed ;

        }
        table tr:nth-child(odd){
            background-color: aqua;

        }



    </style>
</head>
<body>
<h1 style="font-size: 4rem; color: #ff101b;" align="center">Here You Can See My All Patient</h1>


<table >
    <tr>
        <td>Patient id</td>
        <td>Patient Name</td>
        <td>Patient booking time</td>



    </tr>




    <?php

    session_start();
$g="";

    $db=new mysqli('localhost','root','','hospital');

    if(isset($_SESSION['ismember'])){
        if($_SESSION['ismember']==2){
            $g=$_SESSION['username'];
        }
    }


    $q2="select `id` from doctor where `name`='".$g."'";

    $res=$db->query($q2);


        $row=$res->fetch_assoc();
        $f=$row['id'];



    $qry=" select * from `patient-booking` where `d-id` ='".$f."'";

    $res=$db->query($qry);
$n=array();
    for($i=0;$i<$res->num_rows;$i++) {
    $row=$res->fetch_assoc();

    $m=$row['p-id'];
    $n[]=$m;

    }

    $h=array();
    $l=0;
    foreach ($n as $piddd) {
        $qry = " select `name` from `patient` where `id` ='".$piddd."'";

        $res = $db->query($qry);
        $row=$res->fetch_assoc();
        $h[$l]=$row['name'];
        $l++;

    }



    $qry=" select * from `patient-booking` where `d-id` ='".$f."'";

    $res=$db->query($qry);
$o=0;
    for($i=0;$i<$res->num_rows;$i++) {
    $row=$res->fetch_assoc();

    $a=$row['p-id'];

    $c=$row['booking-time'];



        echo "<tr>
    <td>$a</td>";




  echo "<td>$h[$o]</td>";
$o++;

echo "<td>$c</td> 
    
    </tr>";

    }

    $db->close();

    ?>
</table>
</body>
</html>
