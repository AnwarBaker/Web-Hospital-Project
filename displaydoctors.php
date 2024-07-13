




<!DOCTYPE html>
<html lang="en">
<title>display doctor page</title>

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
<h1 style="font-size: 4rem; color: #ff101b;" align="center">Here You Can See ALL Hospital Doctor</h1>


<table >
    <tr>
        <td>Doctor name</td>
        <td>Doctor pass </td>
        <td>Doctor User level</td>
        <td>Doctor Birth Date</td>
    </tr>
<?php
$db=new mysqli('localhost','root','','hospital');
$qry=" select * from doctor ";
$res=$db->query($qry);
for($i=0;$i<$res->num_rows;$i++) {
  $row=$res->fetch_assoc();
    $a=$row['name'];
    $b=$row['pass'];
    $c=$row['userlevel'];
    $d=$row['birthdate'];
    echo "<tr>
    <td>$a</td>
    <td>$b</td>
    <td>$c</td>
    <td>$d</td>
</tr>";

}
$db->close();

    ?>
</table>
</body>
</html
