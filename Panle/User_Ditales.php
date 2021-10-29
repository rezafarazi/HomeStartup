<?php include "Header.php"; ?>
<body>



<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>












<?php

    $ID=$_REQUEST['User_ID'];
    $User=SELECT_BY_QUARY("SELECT Name,Family,Job,Phone,Area,City,Address FROM User WHERE User.Id=".$ID,"Name~Family~Job~Phone~Area~City~Address","0");
    $User=preg_split("/\~/",$User);

?>















<div id="all-Content-Change-Own-End">

    <center>

        <div id="Ditales-Content">

            <center><p id="Title-User">اطلاعات کاربر</p></center>

            <div id="New_Own_User_Ditales">

            <center>

                <img src="../uploads/User/20190213_033840.jpg"/>

                <div id="Ditales">

                    <p>نام : <?php echo $User[0]; ?></p>
                    <p>نام خانوادگی : <?php echo $User[1]; ?></p>
                    <p>شغل : <?php echo $User[2]; ?></p>
                    <p>شماره تلفن همراه : <?php echo $User[3]; ?></p>
                    <p>استان محل سکونت : <?php echo $User[4]; ?></p>
                    <p>شهر محل سکونت : <?php echo $User[5]; ?></p>
                    <p>آدرس : <?php echo $User[6]; ?></p>

                    <br>

                    <div id="Grid-Buttons-Event">

                        <a id="Submit-Btn" onclick="OnClick_Back(this)">برگشت</a>
                        <a id="Submit-Btn" style="background: #F00" onclick="OnClick_Cancel(this)">بستن</a>

                    </div>
                </div>

            </center>

        </div>

        </div>

    </center>

</div>




















<script>

    window.addEventListener("load",function (e) {

        document.getElementById("loading").style.display="none";
        document.getElementById("all-Content-Change-Own-End").style.display="block";

    });


    function OnClick_Cancel(e)
    {
        close();
    }


    function OnClick_Back()
    {
        window.history.back();
    }

</script>
<style>


    #loading
    {
        width: 100%;
        height: 100%;
        position: relative;
    }


    #loading>div
    {
        width: 100%;
        position: absolute;
        top: 40%;
    }



    #all-Content-Change-Own-End
    {
        width: 100%;
        height: 100%;
        position: relative;
        display: none;
        top: 3%;
    }


    body
    {
        background: #7CB342;
    }


    #Ditales-Content
    {
        width: 50%;
        background: #FFFFFF;
        padding: 15px 0px 15px 0px;
        border-radius: 20px;
    }


    #Header
    {
        width: 100%;
        height: 40px;
        background: #FFFFFF;
    }


    #New_Own_User_Ditales
    {
        margin: 30px 25px 25px 25px;
        direction: rtl;
    }

    #New_Own_User_Ditales>center>img
    {
        height: 100px;
        width: 100px;
        border-radius: 500%;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }


    #Ditales
    {
        margin-top: 40px;
    }


    #Ditales>p
    {
        margin: 15px;
        color: #2F2F2F;
    }


    #Ditales>a
    {
        font-size: 16px;
        padding: 10px 50px 10px 50px;
        border-radius: 20px;
        border: none;
        outline: none;
        text-align: center;
        border: 1px solid #CCC;
        cursor: pointer;
        color: #FFFFFF;
        background: #7CB342;
        margin: 25px 5px 25px 10px;
    }


    #Title-User
    {
        font-size: 18px;
        border-bottom: 1px solid #7CB342;
        width: 150px;
        padding-bottom: 15px;
    }


    #Submit-Btn
    {
        background: #7CB342;
        color: #FFFFFF;
        cursor: pointer;
        width: 50%;
        outline: none;
        padding: 8px 15px 8px 15px;
        border-radius: 15px;
        text-align: center;
        height: 50px;
        margin: 15px;
    }


    @media screen and (max-width: 720px)
    {

        #Ditales
        {
            padding-bottom: 70px !important;
        }

        #Ditales-Content
        {
            width: 100%;
        }

        #all-Content-Change-Own-End
        {
            top: 1%;
        }
    }

</style>
</body>
</html>

