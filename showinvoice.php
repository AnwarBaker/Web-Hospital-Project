<!DOCTYPE html>
<html lang="en">
<title>show invoice page</title>

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
<h1 style="font-size: 4rem; color: #ff101b;" align="center">Here You Can See ALL Hospital Patient</h1>


<table >
    <tr>
        <td>Invice id</td>
        <td>Invoce Suituation </td>
        <td>Invoce value</td>

    </tr>
    <?php
    $db=new mysqli('localhost','root','','hospital');
    $qry=" select * from invoice ";
    $res=$db->query($qry);
    $d=0;
    for($i=0;$i<$res->num_rows;$i++) {
        $row=$res->fetch_assoc();
        $a=$row['id'];
        $b=$row['situation'];
        $c=$row['value'];
        $d+=(int)$row['value'];
        echo "<tr>
    <td>$a</td>
    <td>$b</td>
    <td>$c</td>
   
</tr>

 <tr>
        <td>Income Summation :</td>
        <td>$d</td>
        <td></td>
    </tr> " ;

    }
    $db->close();

    ?>

</table>
</body>
</html

