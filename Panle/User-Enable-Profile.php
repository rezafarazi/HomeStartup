<?php include "Header.php"; ?>
<body>





<?php

    $ID=$_REQUEST['ID'];
    $User=SELECT_BY_QUARY("SELECT Id,Name,Family,National_Id,Phone,Birth_Day,Area,City,Job,Address,National_Card,User_Image From User Where Enabled=0 AND Id=".$ID,"Id~Name~Family~National_Id~Phone~Birth_Day~Area~City~Job~Address~National_Card~User_Image","0");
    $User=preg_split("/\~/",$User);

    if(count($User)<=1)
    {
        echo "<script> document.location.href='../Error/Not-Found.php'; </script>";
    }

?>








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

        <center>

            <a href="../uploads/User/<?php echo $User[10]; ?>" target="_blank"><img src="../uploads/User/<?php echo $User[10]; ?>"></a>
            <a href="../uploads/User/<?php echo $User[11]; ?>" target="_blank"><img src="../uploads/User/<?php echo $User[11]; ?>"></a>

        </center>





        <form method="post" action="Events/Update-User.php" enctype="multipart/form-data">



            <label class="half-input-New-Home">
                <center>
                    <p>ردیف مدیر</p>
                    <select name="Done_User_Id">
                        <option><?php echo $_SESSION['User_Id']; ?></option>
                    </select>
                </center>
            </label>


            <label class="half-input-New-Home">
                <center>
                    <p>ردیف</p>
                    <select name="User_Id">
                        <option><?php echo $User[0]; ?></option>
                    </select>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>نام</p>
                    <input type="text" name="Name" value="<?php echo $User[1]; ?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>نام خانوادگی</p>
                    <input type="text" name="Family" value="<?php echo $User[2]; ?>"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>شماره ملی</p>
                    <input type="text" name="National_Id" value="<?php echo $User[3]; ?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>عکس کارت ملی</p>
                    <input type="file" name="National_Card"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>شماره تلفن همراه</p>
                    <input type="text" name="Phone" value="<?php echo $User[4]; ?>"/>
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
                    <input type="text" name="Birth_Day" value="<?php echo $User[5]; ?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>استان</p>
                    <input type="text" name="Ostan" value="<?php echo $User[6]; ?>"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>شهر</p>
                    <input type="text" name="City" value="<?php echo $User[7]; ?>"/>
                </center>
            </label>

            <label class="half-input-New-Home">
                <center>
                    <p>شغل</p>
                    <input type="text" name="Job" value="<?php echo $User[8]; ?>"/>
                </center>
            </label>

            <br>

            <label class="half-input-New-Home">
                <center>
                    <p>کاربر</p>
                    <select name="Enabled">
                        <option><?php echo $_SESSION['User_Id_Home_Done'];?></option>
                    </select>
                </center>
            </label>


            <label class="half-input-New-Home">
                <center>
                    <p>وضعیت</p>
                    <select name="Enabled">
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>
                    </select>
                </center>
            </label>


            <br>

            <label class="full-input-New-Home">
                <center>
                    <p>آدرس</p>
                    <textarea name="Address"><?php echo $User[9]; ?></textarea>
                </center>
            </label>


            <br>

            <label class="half-input-New-Home">
                <center>
                    <input type="submit" value="ردکردن" id="Cancel-Btn">
                </center>
            </label>


            <label class="half-input-New-Home">
                <center>
                    <input type="submit" value="ثبت" id="Submit-Btn">
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


    #Cancel-Btn
    {
        outline: none;
        border: 1px solid #CCC;
        padding: 5px 8px 5px 8px;
        border-radius: 5px;
        font-size: 14px;
        text-align: center;
        height: 50px;
        background: #F00;
        color: #FFFFFF;
        cursor: pointer;
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

</style>
</body>
</html>

