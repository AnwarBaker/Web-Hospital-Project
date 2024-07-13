<?php
session_start();

if(isset($_SESSION['ismember'])){
    if($_SESSION['ismember']==3){
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


                div :hover{
                    border: 2px black dashed;
                    background-color: azure;
                }

                body{

                    background-image:url("nurse.png");
                }
            </style>
        </head>
        <body>
        <h1 align="center" style="font-size: 4rem ; background: white"> you are welcome Nurse <i style="color: red"><?PHP echo $_SESSION['username'] ;  ?> </i></h1>
        <br><br><br>
        <table width="100%">
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
        </table>
        <br><br><br><br><br><br>
        <a href="loginpage.php" ><button style="font-size: 2rem"> <?php session_destroy()?> sign out</button> </a>

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
