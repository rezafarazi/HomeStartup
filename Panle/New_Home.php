<?php include "Header.php"; ?>
<body>



<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>


<div id="all-Content-New-Home">

    <br>
    <center><p id="Title-New-Home">فرم ثبت ملک جدید</p></center>
    <br>


    <form method="post" action="Events/New-Home.php" enctype="multipart/form-data">

        <label class="half-input-New-Home">
            <center>
                <p>عنوان</p>
                <input type="text" name="Title"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>سال ساخت</p>
                <input type="text" name="Year"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>کدپستی</p>
                <input type="text" name="Tax_Code"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>متراژ</p>
                <input type="text" name="Meters"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>قیمت خرید</p>
                <input type="text" name="Price_Money"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>عکس</p>
                <input type="file" name="Home_Image"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>استان</p>
                <input type="text" name="Area"/>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>شهر</p>
                <input type="text" name="City"/>
            </center>
        </label>

        <br>

        <label class="half-input-New-Home">
            <center>
                <p>پارکینگ</p>
                <select name="Parking">
                    <option value="1">دارد</option>
                    <option value="0">ندارد</option>
                </select>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>انبار</p>
                <select name="Anbar">
                    <option value="1">دارد</option>
                    <option value="0">ندارد</option>
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
                        $Type=preg_split("/\~/",$Home_Types[$i]);
                        echo "<option value='$Type[0]'>$Type[1]</option>";
                    }

                    ?>
                </select>
            </center>
        </label>

        <label class="half-input-New-Home">
            <center>
                <p>عکس سند</p>
                <input type="file" name="Document_Image"/>
            </center>
        </label>

        <br>

        <label class="full-input-New-Home">
            <center>
                <p>آدرس</p>
                <textarea name="Address"></textarea>
            </center>
        </label>


        <br>

        <label class="full-input-New-Home">
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
</body>
</html>

