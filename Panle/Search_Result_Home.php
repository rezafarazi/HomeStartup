<?php include "Header.php"; ?>
<body>



<?php


    $Search=$_REQUEST['Search'];
    INSERT_NEW_Search_History($_SESSION['User_Id'],$Search);
    $Data=SELECT_BY_QUARY("SELECT DISTINCT Home.Id AS Home_ID,Home.Title AS Home_Title,Home.Year AS Home_Year,Home.Tax_Code AS Home_Tax_Code,Home.Meters AS Home_Meters,Home.Price_Money AS Home_Price_Money,Home.Image AS Home_Image,Home.Area AS Home_Area,Home.City AS Home_City,Home.Parking AS Home_Parking,Home.Anbar AS Home_Anbar,Home.Document_Image AS Home_Document,Home.Address AS Home_Address,User.Name AS User_Name,User.Family AS User_Family,User.Phone AS User_Phone,User.Job AS User_Job,User.City AS User_City,Home_Types.Name AS Home_Type FROM Home Inner Join History ON Home.id=History.Home_Id Inner Join User ON History.User_Id=User.Id INNER Join Home_Types ON Home.Type_Id=Home_Types.Id WHERE Home.Id=".$Search,"Home_ID~Home_Title~Home_Year~Home_Tax_Code~Home_Meters~Home_Price_Money~Home_Image~Home_Area~Home_City~Home_Parking~Home_Anbar~Home_Document~Home_Address~User_Name~User_Family~User_Phone~User_Job~User_City~Home_Type","0");
    $Data=preg_split("/\~/",$Data);

    if(count($Data)<=1)
    {
        echo "<script>document.location.href='../Error/Not-Found.php';</script>";
    }

?>


<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>


<div id="all-Content-New-Home">

    <br>
    <center><p id="Title-New-Home">نتیجه جست و جو</p></center>
    <br>

    <form method="post" action="#">

        <label class="half-input-New-Home">
            <center>
                <p>نام مالک</p>
                <p><?php echo $Data[13];?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>نام خانوادگی مالک</p>
                <p><?php echo $Data[14];?></p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>شماره تلفن همراه مالک</p>
                <p><?php echo $Data[15];?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>تاریخ ساخت ملک</p>
                <p><?php echo $Data[2];?></p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>شغل مالک</p>
                <p><?php echo $Data[16];?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>شهر محل سکونت مالک</p>
                <p><?php echo $Data[17];?></p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>عنوان</p>
                <p><?php echo $Data[1];?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>شماره تلفن</p>
                <p><?php echo $Data[2];?></p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>کدپستی</p>
                <p><?php echo $Data[3];?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>متراژ</p>
                <p><?php echo $Data[4];?> متر</p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>قیمت خرید</p>
                <p><?php echo $Data[5];?> تومان</p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>عکس</p>
                <a href="<?php echo $Data[6]; ?>" target="_blank">نمایش</a>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>استان</p>
                <p><?php echo $Data[7];?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>شهر</p>
                <p><?php echo $Data[8];?></p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>پارکینگ</p>
                <p><?php if($Data[9]=="1") echo "دارد";else echo "ندارد";?></p>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>انبار</p>
                <p><?php if($Data[10]=="1") echo "دارد";else echo "ندارد";?></p>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>نوع کاربری</p>
                <p><?php echo $Data[18];?></p>
            </center>
        </label>


        <label class="half-input-New-Home">
            <center>
                <p>عکس سند</p>
                <a href="<?php echo $Data[11];?>">نمایش تصویر</a>
            </center>
        </label>

        <br>

        <label class="full-input-New-Home">
            <center>
                <p>آدرس</p>
                <p><?php echo $Data[12];?></p>
            </center>
        </label>

        <br>

        <label class="full-input-New-Home">
            <center>
                <p>تاریخچه مالکان</p>
                <a href="Search_Result_Home_Full.php?Home_ID=<?php echo $Data[0]; ?>" target="_blank">نمایش</a>
            </center>
        </label>

    </form>

</div>


<script>

    window.addEventListener("load",function (e) {

        document.getElementById("loading").style.display="none";
        document.getElementById("all-Content-New-Home").style.display="block";

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



    #Submit-Btn
    {
        background: #7CB342;
        color: #FFFFFF;
        height: 50px;
        border-radius: 5px !important;
        cursor: pointer;
    }



    #all-Content-New-Home
    {
        width: 100%;
        height: 100%;
        direction: rtl;
        display: none;
    }


    #Title-New-Home
    {
        font-size: 18px;
        border-bottom: 1px solid #7CB342;
        width: 150px;
        padding-bottom: 15px;
    }


    #all-Content-New-Home>form
    {
        display: flex;
        flex-wrap: wrap;
        padding-bottom: 50px;
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
    <?php INSERT_NEW_Search_History($_SESSION['User_Id_Home_Done'],$Search); ?>
</body>
</html>

