<?php include "GUI/Components/Starter.php"; ?>


<script>

    setTimeout(function ()
    {
        window.location.href="index.php";
    },3000);

</script>



<?php



if(isset($_REQUEST['Condition']))
{


    $Condition = $_REQUEST['Condition'];


    if ($Condition == "Wait") {
        echo "
            <style>
            
                #SMS_CODE_TEXT_INPUT_BORDER
                {
                    display: block;
                }
                
                .Sing-Up-Sms-Form-Content
                {
                    background: #7CB342;
                }
            
            </style>
         ";
    } else if ($Condition == "Actived") {
        echo "
            <style>
            
                #SMS_Active_BORDER
                {
                    display: block;
                }
                
                .Sing-Up-Sms-Form-Content
                {
                    background: #102030;
                }
                
            
            </style>
         ";
    } else {
        echo "
            <style>
            
                #Error_BORDER
                {
                    display: block;
                }
                
                .Sing-Up-Sms-Form-Content
                {
                    background: #d50000;
                }
            
            </style>
         ";
    }


}
else
{
    echo "<script> window.document.location.href='Sign-in.php'; </script>";
}

?>




<div class="Sing-Up-Sms-Form-Content">


    <!--Wait Start-->
    <div id="SMS_CODE_TEXT_INPUT_BORDER">
        <center>
            <h1>در چند روز آینده منتظر پیامک فعال سازی باشید</h1>
            <br>
            <h1>باتشکر</h1>
        </center>
    </div>
    <!--Wait End-->





    <!--Active Start-->
    <div id="SMS_Active_BORDER">
        <center>
            <h1>کاربر شما از قبل ثبت شده است</h1>
            <br>
            <h1>باتشکر</h1>
        </center>
    </div>
    <!--Active End-->






    <!--Error Start-->
    <div id="Error_BORDER">
        <center>
            <h1>کاربری شما قبلا بسته شده است</h1>
            <br>
            <h1>باتشکر</h1>
        </center>
    </div>
    <!--Error End-->





</div>



<?php include "GUI/Components/Ender.php"; ?>
