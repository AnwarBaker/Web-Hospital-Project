<?php
try {
    if (isset($_GET['did']) && isset($_GET['nid']) && isset($_GET['userlevel'])) {
        $a = $_GET['did'];
        $b = $_GET['nid'];
        $c = $_GET['userlevel'];


        $db=new mysqli('localhost','root','','hospital');


        if($c==2){
           // $qry=" select * from doctor ";
            $qry="DELETE FROM `patient-booking` WHERE `d-id`='".$a."'";
            $res=$db->query($qry);
            $qry="DELETE FROM `patient` WHERE `id`='".$a."'";
            $res=$db->query($qry);
            $qry="DELETE FROM `doctor` WHERE `id`='".$a."'";
            $res=$db->query($qry);

            }

        if($c==3){
            $qry="DELETE FROM `nurse` WHERE `pass`='".$b."'";
            $res=$db->query($qry);

           }


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
    <title>Delete Page</title>


<style>


    #k{
position: absolute;
        top:450px;
        width: 80%;
        align-content: center;
        text-align: center;
        margin:120px;
        border : 4px black solid;
    }
    #k tr{
        height: 30px;
        font-size: 2rem;
        background-color: lightgray;
        border:2px black dashed ;

    }
    #k tr:nth-child(odd){
        background-color: aqua;

    }
#l tr{

    height: 30px;
    font-size: 2rem;
    background-color: lightgray;
    border:2px black dashed ;
}

#l tr:nth-child(odd){
    background-color: aqua;

}


body{

    background-image: url("byee.png");
}
form{
    background-color: white;
    position: absolute;
    align-content: center;
    width: 500px;
    height: 300px;
    top: 150px;
    left: 550px;
    text-align: center;


}
form>p{
    text-align: center;
    align-content: center;

}
#l{
    position: absolute;
    top:800px;
    width: 80%;
    align-content: center;
    text-align: center;
    margin:120px;
    border : 4px black solid;
}
#p{
    font-size: 3rem;
    color: black;
    position: absolute;
    top:480px;

}

</style>
</head>
<body>
<h1 align="center" style="font-size:4rem; background-color: bisque; ">Here You Can Delete Any Employee</h1>
<form action="delete.php" method="get">
    <p><b style="font-size:2rem; font-family: 'Baskerville Old Face'; ">Enter The ID Of Doctor Or Nurse Who You Wanna Delete</b></p>
    <table>
        <tr>

            <td>
                <label style="font-size: 2rem"><b> Doctor ID: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" type="number" name="did">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"> <b>  Nurse Pass:   </b> </label>
            </td>
            <td>
                <input size="30"  style="padding:5px" type="number" name="nid">
            </td>
            <td><input size="10" style="font-size: 2rem; color: black;" type="submit" value="Delete"> </td>
        </tr>



        <tr>
            <td>
                <label style="font-size: 2rem"> <b>  UserLevel:   </b> </label>
            </td>
            <td>
                <input size="50" placeholder="'2' for Doctor '3' for nurse'" style="padding:5px" type="number" name="userlevel">
            </td>
        </tr>
    </table> </form>

<p id="b"></p>

      <table id="k">
    <tr>
        <td>Doctor id</td>
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
        $h=$row['id'];
        echo "<tr>
    <td>$h</td>
    <td>$a</td>
    <td>$b</td>
    <td>$c</td>
    <td>$d</td>
</tr>";

    }
    $db->close();

    ?>
      </table>





<table id="l">
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
</html>