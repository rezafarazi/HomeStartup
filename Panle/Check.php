<?php
include "../functions/functions.php";





$Phone="";
$National_ID="";



session_start();



if(isset($_SESSION['Nantional_ID_Home_Done']) && isset($_SESSION['Phone_Home_Done']))
{
    $National_ID = $_SESSION['Nantional_ID_Home_Done'];
    $Phone = $_SESSION['Phone_Home_Done'];
}

if(isset($_COOKIE['Nantional_ID_Home_Done']) && isset($_COOKIE['Phone_Home_Done']))
{
    $National_ID = $_COOKIE['Nantional_ID_Home_Done'];
    $Phone = $_COOKIE['Phone_Home_Done'];
}

if((isset($_POST['Phone']) && isset($_POST['National_ID'])))
{
    $Phone = $_POST['Phone'];
    $National_ID = $_POST['National_ID'];
    $_SESSION['Nantional_ID_Home_Done']=$National_ID;
    $_SESSION['Phone_Home_Done']=$Phone;
}






//Start Check User
if( $Phone !="" && $National_ID !="" )
{



    $Data=SELECT_BY_QUARY("SELECT National_Id,Phone,Enabled,Done_User_Id,User_Type,User.Id AS Id FROM User INNER JOIN User_Types ON User.User_Type=User_Types.Id WHERE User.Phone='$Phone' AND User.National_Id='$National_ID' AND Enabled=1;","National_Id~Phone~Enabled~Done_User_Id~User_Type~Id","0");
    $Data_Array=preg_split("/\~/",$Data);





    if(count($Data_Array)>0)
    {
        if(isset($_POST['Stay_Me']))
        {

            if(mb_strtolower($_POST['Stay_Me'])=="on")
            {
                $_COOKIE['Nantional_ID_Home_Done']=$National_ID;
                $_COOKIE['Phone_Home_Done']=$Phone;
            }

        }

        $_SESSION['User_Id_Home_Done']=$Data_Array[0];
        $_SESSION['User_Id_Home_Type']=$Data_Array[4];
        $_SESSION['User_Id']=$Data_Array[5];
    }
    else
    {
        echo "<script> window.top.location.href='../Log-in.php'; </script>";
    }



}
else
{
    echo "<script> window.top.location.href='../Log-in.php'; </script>";
}
//End Check User






?>