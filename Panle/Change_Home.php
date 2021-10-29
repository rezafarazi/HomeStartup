<?php include "Header.php"; ?>





<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>







<div id="all-Content-New-Home">

    <br>
    <center><p id="Title-New-Home">فرم تغییر اطلاعات ملک</p></center>
    <br>


    <?php

        $date = date('Y/m/d', time());
        $Home_Id=$_POST['Home_Id'];
        $HOME_DATA=SELECT_BY_QUARY("SELECT Title,Year,Tax_Code,Meters,Price_Money,Image,Area,City,Parking,Anbar,Type_Id,Address FROM Home INNER JOIN History ON Home.id=History.Home_Id WHERE (End_Date IS NULL OR End_Date='') AND User_Id=".$_SESSION['User_Id']." AND Is_Pay_Money IS NOT NULL AND Home.Id=$Home_Id","Title~Year~Tax_Code~Meters~Price_Money~Image~Area~City~Parking~Anbar~Type_Id~Address","0");
        $HOME_DATA=preg_split("/\~/",$HOME_DATA);

    ?>


    <form method="post" action="Events/Update-Home.php" enctype="multipart/form-data">

        <label class="full-input-New-Home">
            <center>
                <p>ردیف</p>
                <select name="Home_Id" disable>
                    <?php echo "<option value='$Home_Id'>$Home_Id</option>"; ?>
                </select>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>عنوان</p>
                <input type="text" name="Title" value="<?php echo $HOME_DATA[0]; ?>"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>سال ساخت</p>
                <input type="text" name="Year" value="<?php echo $HOME_DATA[1]; ?>"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>کدپستی</p>
                <input type="text" name="Tax_Code" value="<?php echo $HOME_DATA[2]; ?>"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>متراژ</p>
                <input type="text" name="Meters" value="<?php echo $HOME_DATA[3]; ?>"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>قیمت خرید</p>
                <input type="text" name="Price_Money" value="<?php echo $HOME_DATA[4]; ?>"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>عکس</p>
                <input type="file" name="Image"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>استان</p>
                <input type="text" name="Area" value="<?php echo $HOME_DATA[6]; ?>"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>شهر</p>
                <input type="text" name="City" value="<?php echo $HOME_DATA[7]; ?>"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>پارکینگ</p>
                <select name="Parking">
                    <option value="1" <?php if($HOME_DATA[8]==1) echo "selected";?> >دارد</option>
                    <option value="0"<?php if($HOME_DATA[8]==0) echo "selected";?> >ندارد</option>
                </select>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>انبار</p>
                <select name="Anbar">
                    <option value="1" <?php if($HOME_DATA[9]==1) echo "selected";?> >دارد</option>
                    <option value="0" <?php if($HOME_DATA[9]==0) echo "selected";?> >ندارد</option>
                </select>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>نوع کاربری</p>
                <select name="Home_Type">
                    <?php

                        $Home_Types=SELECT_BY_QUARY("SELECT Id,Name From Home_Types","Id~Name","1");
                        $Home_Types=preg_split("/\^/",$Home_Types);

                        for($i=1;$i<count($Home_Types);$i++)
                        {
                            $Home_Type=preg_split("/\~/",$Home_Types[$i]);
                            $Sel=($Home_Type[0]==$HOME_DATA[10])?"selected":"";
                            echo "<option value='$Home_Type[0]'".$Sel.">$Home_Type[1]</option>";
                        }

                    ?>
                </select>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>آدرس</p>
                <input type="text" name="Address" value="<?php echo $HOME_DATA[11]; ?>"/>
            </center>
        </label>


        <br>
        <br>
        <br>
        <br>
        <br>


        <label class="half-input-New-Home">
            <center>
                <button id="Change-House"><a href="Change_Owner.php?<?php echo "Home_Id=".$Home_Id?>">انتقال مالکیت</a></button>
            </center>
        </label>


        <label class="half-input-New-Home">
            <center>
                <input type="submit" value="ثبت" id="Submit-Btn">
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



    #Change-House
    {
        background: #FFFFFF;
        color: #7CB342;
        height: 50px;
        border-radius: 5px !important;
    }



    #Change-House>a
    {
        width: 100%;
        height: 100%;
        color: #7CB342;
        padding: 12px calc((50% - 20px)/2) 12px calc((50% - 20px)/2);
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
        width: 175px;
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


    .half-input-New-Home>center>input,.full-input-New-Home>center>input,.half-input-New-Home>center>select,.full-input-New-Home>center>select,.half-input-New-Home>center>button,.full-input-New-Home>center>button
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

