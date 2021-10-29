<?php


    include "Header.php";

    $User_Profile_Image="";
    $User_National_Card_Image="";

    if(isset($_FILES['User_Image']['tmp_name']))
    {
        $User_Profile_Image=NEW_UPLOAD_USER_IMAGE().".jpg";
        move_uploaded_file($_FILES['User_Image']['tmp_name'],"../../uploads/User/".$User_Profile_Image);
    }

    if(isset($_FILES['National_Card']['tmp_name']))
    {
        $User_National_Card_Image=NEW_UPLOAD_USER_IMAGE().".jpg";
        move_uploaded_file($_FILES['National_Card']['tmp_name'],"../../uploads/User/".$User_National_Card_Image);
    }

    $Result=UPDATE_USER((isset($_REQUEST['User_Id']))?$_REQUEST['User_Id']:""
        ,(isset($_REQUEST['Enabled']))?$_REQUEST['Enabled']:""
        ,(isset($_REQUEST['Name']))?$_REQUEST['Name']:""
        ,(isset($_REQUEST['Family']))?$_REQUEST['Family']:""
        ,(isset($_REQUEST['Phone']))?$_REQUEST['Phone']:""
        ,$User_Profile_Image
        ,(isset($_REQUEST['Birth_Day']))?$_REQUEST['Birth_Day']:""
        ,(isset($_REQUEST['Ostan']))?$_REQUEST['Ostan']:""
        ,(isset($_REQUEST['City']))?$_REQUEST['City']:""
        ,(isset($_REQUEST['Job']))?$_REQUEST['Job']:""
        ,(isset($_REQUEST['Address']))?$_REQUEST['Address']:""
        ,""
        ,$User_National_Card_Image
        ,(isset($_REQUEST['User_Type']))?$_REQUEST['User_Type']:""
        ,(isset($_REQUEST['Done_User_Id']))?$_REQUEST['Done_User_Id']:"");

?>
<div class="Done-Border">


    <div>

        <center>

            <div>

                <p>تغییرات با موفقیت انجام شد</p>
                <p>تا زمان تایید تغییرات از سمت مدیر سیستم موقتا حساب شما بسته خواهد بود</p>

            </div>

        </center>

    </div>


</div>
<style>

    @font-face
    {
        font-family: 'Vazir';
        src: url("../Font/Vazir.ttf");
    }


    .Done-Border
    {
        width: 100%;
        height: 100%;
    }


    .Done-Border>div
    {
        width: 95%;
        position: absolute;
        top: 34%;
    }



    .Done-Border>div>center>div>p
    {
        font-family: Vazir;
        text-align: center;
    }





    @media screen and(max-width: 724px)
    {

        .Done-Border>div>center>div>p
        {
            margin-right: 25px;
            margin-left: 25px;
        }
    }




</style>
<script>

    setInterval(function (e)
    {
        // window.location.href="../../Log-in.php";
    },2500);

</script>
