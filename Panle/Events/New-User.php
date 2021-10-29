<meta charset="UTF-8">
<?php




include "../../functions/functions.php";



if(isset($_REQUEST['Name']) && isset($_REQUEST['Family']) && isset($_REQUEST['National_ID']) && isset($_REQUEST['Phone']) && isset($_REQUEST['Birth_Day']) && isset($_REQUEST['Ostan']) && isset($_REQUEST['City']) && isset($_REQUEST['Address']) && isset($_REQUEST['Job']))
{



    $name = $_REQUEST["Name"];
    $family = $_REQUEST["Family"];
    $national_id = $_REQUEST["National_ID"];
    $national_card = "";
    $phone = $_REQUEST["Phone"];
    $birth_Day = $_REQUEST["Birth_Day"];
    $user_image = "";
    $ostan = $_REQUEST["Ostan"];
    $city = $_REQUEST["City"];
    $job = $_REQUEST["Job"];
    $address = $_REQUEST["Address"];



    // echo $name . "<br>";
    // echo $family . "<br>";
    // echo $national_id . "<br>";
    // echo $phone . "<br>";
    // echo $birth_Day . "<br>";
    // echo $ostan . "<br>";
    // echo $city . "<br>";
    // echo $job . "<br>";
    // echo $address . "<br>";
    // echo $user_image . "<br>";
    // echo $national_card . "<br>";



    $user_image=NEW_UPLOAD_USER_IMAGE().".jpg";
    $national_card=NEW_UPLOAD_USER_IMAGE().".jpg";

    $Job = INSERT_NEW_User($name, $family, $national_id, $national_card, $phone, $birth_Day, $user_image, $ostan, $city, $job, $address);
    $Event = "";


    if ($Job == 1 || $Job == true)
    {

        $User_Image = "../../uploads/User/".$user_image;
        move_uploaded_file($_FILES['User_Image']['tmp_name'], $User_Image);

        $User_Card = "../../uploads/User/".$national_card;
        move_uploaded_file($_FILES['National_Card']['tmp_name'], $User_Card);

        $Event = "Wait";
    }
    else if ($Job == 0 || $Job == false)
    {
        $Event = "Actived";
    }
    else
    {
        $Event = "Block";
    }



    echo "<script>
                window.location.href='../../Wait-For-Active.php?Condition=$Event';
          </script>";

}
else
{
    echo "<script> window.location.href='../../Sign-in.php'; </script>";
}



?>