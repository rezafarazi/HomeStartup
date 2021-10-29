<?php include "Header.php"; ?>
<?php

    $Profile=SELECT_BY_QUARY("SELECT Id,Name,Family,Phone,Birth_Day,Area,City,Job,Address,User_Image FROM User WHERE National_Id='".$_SESSION['Nantional_ID_Home_Done']."' AND Phone='".$_SESSION['Phone_Home_Done']."';","Id~Name~Family~Phone~Birth_Day~Area~City~Job~Address~User_Image","1");
    $Profile_Array=preg_split("/\^/",$Profile);
    $Profile_Array_SPLITED=preg_split("/\~/",$Profile_Array[1]);
    $_SESSION['User_Id_Home_Done']=$Profile_Array_SPLITED[0];

?>



<body>
<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>


















<div id="all-Content-Profile">


    <div id="Main-Content-User-Profile">

        <br>
        <center><p id="Title-Profile">پروفایل</p></center>
        <br>




        <center>

            <a href="../uploads/User/<?php echo $Profile_Array_SPLITED[9];?>" target="_blank"><img src="../uploads/User/<?php echo $Profile_Array_SPLITED[9];?>"></a>

        </center>





        <form action="Events/Update-User.php" method="post" enctype="multipart/form-data">

            <label class="half-input-New-Home">
                <center>
                    <p>نام</p>
                    <input type="text" name="Name" value="<?php echo $Profile_Array_SPLITED[1];?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>نام خانوادگی</p>
                    <input type="text" name="Family" value="<?php echo $Profile_Array_SPLITED[2];?>"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>شماره تلفن همراه</p>
                    <input type="text" name="Phone" value="<?php echo $Profile_Array_SPLITED[3];?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>عکس کاربری</p>
                    <input type="file" name="User_Image"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>تاریخ تولد</p>
                    <input type="text" name="Birth_Day" value="<?php echo $Profile_Array_SPLITED[4];?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>استان</p>
                    <input type="text" name="Ostan" value="<?php echo $Profile_Array_SPLITED[5];?>"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>شهر</p>
                    <input type="text" name="City" value="<?php echo $Profile_Array_SPLITED[6];?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>شغل</p>
                    <input type="text" name="Job" value="<?php echo $Profile_Array_SPLITED[7];?>"/>
                </center>
            </label>

            <br>

            <label class="full-input-New-Home">
                <center>
                    <p>آدرس</p>
                    <textarea name="Address"><?php echo $Profile_Array_SPLITED[8];?></textarea>
                </center>
            </label>


            <br>


            <label class="full-input-New-Home">
                <center>
                    <input type="submit" value="تغییر" id="Submit-Btn">
                </center>
            </label>



        </form>



    </div>


</div>




















<script>

    window.addEventListener("load",function (e) {

        document.getElementById("loading").style.display="none";
        document.getElementById("all-Content-Profile").style.display="block";

    });

</script>
<script src="js/Main.js"></script>






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



    #all-Content-Profile
    {
        width: 100%;
        height: 100%;
        position: relative;
        display: none;
        direction: rtl;
    }


    #Main-Content-User-Profile
    {
        width: 100%;
        height: 100%;
        direction: rtl;
    }


    #Main-Content-User-Profile>center>a>img
    {
        height: 100px;
        width: 100px;
        border-radius: 500%;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }


    form
    {
        display: flex;
        flex-wrap: wrap;
        padding-bottom: 50px;
        direction: rtl;
    }


    #Submit-Btn
    {
        background: #7CB342;
        color: #FFFFFF;
        height: 50px;
        border-radius: 5px !important;
        cursor: pointer;
    }


    #History-Btn
    {
        background: #FFFFFF;
        color: #7CB342;
        height: 50px;
        border-radius: 5px !important;
        cursor: pointer;
    }


    .full-input-New-Home
    {
        width: 100%;
        padding: 10px;
    }


    .half-input-New-Home
    {
        width: calc(50% - 20px);
        padding: 10px;
    }


    .half-input-New-Home>center>p,.full-input-New-Home>center>p
    {
        padding: 10px;
    }


    .half-input-New-Home>center>input,.full-input-New-Home>center>input,.half-input-New-Home>center>select,.full-input-New-Home>center>select
    {
        outline: none;
        border: 1px solid #CCC;
        padding: 5px 8px 5px 8px;
        border-radius: 5px;
        width: 100%;
        font-size: 14px;
    }


    .full-input-New-Home>center>textarea
    {
        outline: none;
        border: 1px solid #CCC;
        padding: 5px 8px 5px 8px;
        border-radius: 5px;
        width: 100%;
        font-size: 14px;
    }


    .half-input-New-Home>center>input::selection,.full-input-New-Home>center>input::selection,
    {
        background: #7CB342;
        color: #FFF;
    }


    #Title-Profile
    {
        font-size: 18px;
        border-bottom: 1px solid #7CB342;
        width: 150px;
        padding-bottom: 15px;
    }

</style>
</body>
</html>

