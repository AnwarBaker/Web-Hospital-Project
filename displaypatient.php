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
<h1 style="font-size: 4rem; color: #ff101b;" align="center">Here You Can See ALL Hospital Patient</h1>


<table >
    <tr>
        <td>Patient name</td>
        <td>Patient invoice id</td>
        <td>Patient id</td>
        
    </tr>
    <?php
    $db=new mysqli('localhost','root','','hospital');
    $qry=" select * from patient ";
    $res=$db->query($qry);
    for($i=0;$i<$res->num_rows;$i++) {
        $row=$res->fetch_assoc();
        $a=$row['name'];

        $c=$row['invoice-id'];
        $d=$row['id'];

        echo "<tr>
    <td>$a</td>
    
    <td>$c</td>
    <td>$d</td>
    
</tr>";

    }
    $db->close();

    ?>
</table>
</body>
</html
