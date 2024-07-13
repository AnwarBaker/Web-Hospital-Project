<?php
session_start();

if(isset($_SESSION['ismember'])){
    if($_SESSION['ismember']==1){
?>
        <!DOCTYPE html>
        <html lang="en">
        <title>admin page</title>

        <head>
        </head>
        <body>
        <h1  style="font-size: 4rem; background-color: white;" align="center"> you are welcome admin <i style="color: red"><?PHP echo $_SESSION['username'] ;  ?> </i></h1>


        </body>
        </html

<?php
    }else{
        header('location:loginpage.php');
    }
}else{
    header('location:loginpage.php');

}

?>



<!DOCTYPE html>
<html lang="en">
<title>admin page</title>
<head>


   <style>

     div{
        width: 250px;
         height: 150px;
         background-color: cyan;
         text-align: center;
         border: 1px red solid;

     }
     div>a>button{
         width: 100%;
         height: 100%;
        font-size: 2rem;
         background-color: cyan;

         font-family:"Arial Narrow";
     }
     form{
         width: 100%;
         height: 100%;
     }
     #p{
         width: 100%;
         height: 100%;
         font-size: 2rem;
         background-color: cyan;

         font-family:"Arial Narrow";
     }


     div :hover{
         border: 2px black dashed;
         background-color: azure;
     }

body{

    background-image:url("admin.png");
}

   </style>
</head>

<body>
<br><br><br>
<table style="width: 100%">
    <tr>
        <td>
<div>
    <a target="_blank" href="displaydoctors.php"><button> Click To See All Doctor </button></a>

</div>
        </td>
        <td>
            <div>
                <a target="_blank" href="displaynurses.php"> <button> Click To See All Nurses </button></a>

            </div>
        </td>

        <td>
            <div>
                <a target="_blank" href="displaypatient.php"><button> Click To See All Patient </button></a>

            </div>

        </td>
    </tr>



    <tr>

<td>
    <div>
        <a target="_blank" href="sign_up.php"><button> Click To Add Employee "Doctor/Nurse/Admin" </button></a>

    </div>

</td>

        <td>

            <div>
                <a target="_blank" href="showinvoice.php"><button> Click To See The income </button></a>

            </div>
        </td>

        <td>


            <div>
                <a target="_blank" href="showadmins.php"><button> Click To See The Admins </button> </a>

            </div>

        </td>


    </tr>
<tr>
    <td>


        <div>
            <form action="delete.php" method="get">
                <a target="_blank" href="delete.php"><button id="p""> Click To  Delete Doctor/Nurse </button> </a>

            </form>
        </div>

    </td>

</tr>


</table>
<br><br><br><br><br><br>
<a href="loginpage.php" ><button style="font-size: 2rem"><?php //session_destroy()?> sign out</button> </a>
</body>

</html

