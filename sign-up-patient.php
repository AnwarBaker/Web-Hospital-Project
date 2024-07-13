<?php
session_start();
try {
    if(isset($_SESSION['ismember'])) {
        if ($_SESSION['ismember'] == 2) {
            $g = $_SESSION['username'];
        }

        if (isset($_GET['idInvoice']) && isset($_GET['InvoiceSit']) && isset($_GET['valueInv']) && isset($_GET['PatientName']) && isset($_GET['idPatient']) && isset($_GET['bookingTime'])) {
            $a = $_GET['idInvoice'];
            $b = $_GET['InvoiceSit'];
            $c = $_GET['valueInv'];
            $d = $_GET['PatientName'];
            $e = $_GET['idPatient'];
            $f = $_GET['bookingTime'];

            $db = new mysqli('localhost', 'root', '', 'hospital');


            $qf = "select * from invoice";
            $res = $db->query($qf);
            $row = $res->fetch_object();
            if ($a == $row->id) {

                echo "use different id for invoice";

            } else {
                $qry = "INSERT INTO `invoice`(`id`,`situation`,`value`) VALUES ('" . $a . "','" . $b . "','" . $c . "') ";
                $res = $db->query($qry);

                $aa = 1;
            }
            $qff = "select * from patient";
            $res = $db->query($qff);
            $row = $res->fetch_object();
            if ($e == $row->id) {

                echo "use different id for patient";

            } elseif ($aa == 1) {
                $qryy ="INSERT INTO `patient`(`name`,`id`,`invoice-id`) VALUES ('".$d."','".$e."','".$a."') ";
                $res =$db->query($qryy);

                $aa = 2;
            }

            if ($aa == 2) {
                $qrry = "select `id` from doctor where `name`='" . $g . "'";
                $res = $db->query($qrry);
                $row = $res->fetch_assoc();
                $bb = $row['id'];
                $qryyy = "INSERT INTO `patient-booking`(`P-id`,`d-id`,`booking-time`) VALUES ('" . $e . "','" . $bb . "','" . $f . "')";
                $res = $db->query($qryyy);

                header('location:sign-up-patient.php');
            }


        }
    }} catch (Exception $e) {

    echo "enter values pls";
    echo $e;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sign up-Patient</title>


    <style>

        #s {
            width: 75%;
            align-content: center;
            font-size: 2rem;
            font-family: Arial;
            background-color: lightgray;


        }

        #userlevel {
            position: absolute;
            top: 110px;
            left: 500px;
            width: 450px;
            height: 250px;
            padding: 0px;
            margin: 0px;
            font-size: 2rem;

            :hover {
                color: red;
            }
        }

        body {
            background-color: lightgray;

        }


    </style>
</head>


<body>
<h1 align="center" style="font-size: 4rem"> Welcome To Sign Up For Patient Page</h1>
<br>
<form action="sign-up-patient.php" method="get">

    <table>
        <tr>
            <td>
                <label style="font-size: 2rem"><b> ID Invoice: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" name="idInvoice" type="number">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"><b>  Invoice Situation: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" name="InvoiceSit">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"><b> Value Invoice: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" type="number" name="valueInv">

            </td>

        </tr>
        <tr>

            <td>
                <label style="font-size: 2rem"><b> Patient Name: </b> </label>
            </td>
            <td>
                <input style="padding:5px" size="30" name="PatientName">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"> <b> ID Patient: </b> </label>
            </td>
            <td>
                <input size="30" style="padding:5px" name="idPatient" type="number">
            </td>
        </tr>
        <tr>
            <td>
                <label style="font-size: 2rem"> <b> Booking Time: </b> </label>
            </td>
            <td>
                <input size="30" style="padding:5px" type="datetime-local" name="bookingTime">
            </td>
        </tr>


        <tr>

            <td></td>
            <td><input id="s" type="submit" value="Add-Patient" size="3" width="100%"></td>


        </tr>

    </table>

</form>



</body>
</html>