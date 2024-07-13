<!DOCTYPE html>
<html lang="en">
<title>display Nurse page</title>

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
    <script>
        document.getElementById("backButton").addEventListener("click", function() {
            window.history.back(); // Go back to the previous page
        });
    </script>
</head>
<body>
<h1 style="font-size: 4rem; color: #ff101b;" align="center">Here You Can See ALL Hospital Nurses</h1>


<table >
    <tr>
        <td>Nurse name</td>
        <td>Nurse pass </td>
        <td>Nurse User level</td>
        <td>Nurse Birth Date</td>
        <td>Nurse Shift</td>
    </tr>
    <?php
    $db=new mysqli('localhost','root','','hospital');
    $qry=" select * from nurse ";
    $res=$db->query($qry);
    for($i=0;$i<$res->num_rows;$i++) {
        $row=$res->fetch_assoc();
        $a=$row['name'];
        $b=$row['pass'];
        $c=$row['userlevel'];
        $d=$row['birthdate'];
        $e=$row['shift'];
        echo "<tr>
    <td>$a</td>
    <td>$b</td>
    <td>$c</td>
    <td>$d</td>
    <td>$e</td>
</tr>";

    }
    $db->close();

    ?>
</table>
</body>
</html
