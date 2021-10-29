<?php



    include "Header.php";




    if
    (
        isset($_POST['Title'])&&
        isset($_POST['Year'])&&
        isset($_POST['Tax_Code'])&&
        isset($_POST['Meters'])&&
        isset($_POST['Price_Money'])&&
        isset($_POST['Area'])&&
        isset($_POST['City'])&&
        isset($_POST['Parking'])&&
        isset($_POST['Anbar'])&&
        isset($_POST['Home_Type'])&&
        isset($_POST['Address'])&&
        isset($_FILES['Home_Image']['tmp_name'])&&
        isset($_FILES['Document_Image']['tmp_name'])
    )
    {

        $Title = $_POST['Title'];
        $Year = $_POST['Year'];
        $Tax_Code = $_POST['Tax_Code'];
        $Meters = $_POST['Meters'];
        $Price_Money = $_POST['Price_Money'];
        $Home_Image=NEW_UPLOAD_Home_IMAGE().".jpg";
        $Home_Image_="../../uploads/Home/".$Home_Image;
        $Area = $_POST['Area'];
        $City = $_POST['City'];
        $Parking = $_POST['Parking'];
        $Anbar = $_POST['Anbar'];
        $Home_Type = $_POST['Home_Type'];
        $Document_Image=NEW_UPLOAD_Home_IMAGE().".jpg";
        $Document_Image_="../../uploads/Home/".$Document_Image;
        $Address = $_POST['Address'];


        $Result=INSERT_NEW_Home($Title,$Year,$Tax_Code,$Meters,$Price_Money,$Home_Image,$Area,$City,$Parking,$Anbar,$Home_Type,$Document_Image,$Address,"0",$_SESSION['User_Id_Home_Done'],"0","0","0");

        move_uploaded_file($_FILES['Home_Image']['tmp_name'],$Home_Image_);
        move_uploaded_file($_FILES['Document_Image']['tmp_name'],$Document_Image_);


        $_SESSION['NEW_HOME_Tax_CODE']=$Tax_Code;
        $_SESSION['NEW_HOME_Meters']=$Meters;
        $_SESSION['NEW_HOME_Price_Money']=$Price_Money;
        $_SESSION['NEW_HOME_City']=$City;


        echo "<script> window.top.location.href='Pay-Home.php'; </script>";

    }
    else
    {
        echo "<script> window.top.location.href='../index.php'; </script>";
    }




?>