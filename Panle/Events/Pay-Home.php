<?php

include "Header.php";

?>
<body>


    <?php


        $User_Id=$_SESSION['User_Id_Home_Done'];
        $TAX_CODE=$_SESSION['NEW_HOME_Tax_CODE'];
        $METERS=$_SESSION['NEW_HOME_Meters'];
        $MONEY=$_SESSION['NEW_HOME_Price_Money'];
        $CITY=$_SESSION['NEW_HOME_City'];




        $Result=SELECT_BY_QUARY("SELECT Home.Id AS Home_Id,User.Name AS User_Name,User.Family AS User_Family,User.National_Id AS User_National_Id,Year AS Home_Year,Tax_Code AS Home_Tax_Code,Meters AS Home_Meters,Price_Money AS Money,Type_Id AS Type,Home.City AS City,Home.Address AS Address FROM Home INNER JOIN User ON Home.Done_User_Id=User.Id WHERE Is_Pay_Money=0 AND User.Id=$User_Id AND Home.City LIKE '$CITY' AND Price_Money LIKE '$MONEY' AND Meters LIKE '$METERS' AND Home.Tax_Code LIKE '$TAX_CODE';","Home_Id~User_Name~User_Family~User_National_Id~Home_Year~Home_Tax_Code~Home_Meters~Money~Type~City~Address","0");
        $Result=preg_split("/\~/",$Result);

    ?>


    <div id="All">
        <div>
            <center>
                <div dir="rtl" id="INTERNAL_BORDER">
                    <img src="../../GUI/img/Color.png" width="35px">
                    <br>
                    <br>
                    <p>نام : <?php echo $Result[1]; ?></p>
                    <br>
                    <p>نام خانوادگی : <?php echo $Result[2]; ?></p>
                    <br>
                    <p>کد ملی : <?php echo $Result[3]; ?></p>
                    <br>
                    <p>کد پستی خانه : <?php echo $Result[5]; ?></p>
                    <br>
                    <p>سال ساخت خانه : <?php echo $Result[4]; ?></p>
                    <br>
                    <p>اندازه ملک : <?php echo $Result[6]; ?> متر</p>
                    <br>
                    <p>قیمت ملک : <?php echo $Result[7]; ?> ریال</p>
                    <br>
                    <p>آدرس ملک : <?php echo $Result[9]."         ".$Result[10]; ?></p>
                    <br>
                    <p>هزینه ثبت : 10 هزار تومان</p>
                    <br>
                    <br>
                    <a href="Pay-Home-Redierect.php?Home_Id=<?php echo $Result[0]; ?>">پرداخت</a>
                </div>
            </center>
        </div>
    </div>




</body>
</html>


<style>

    body
    {
        background: #7CB342;
    }


    #All
    {
        width: 100%;
        height: 100%;
        position: relative;
    }


    #All>div
    {
        width: 100%;
        position: absolute;
        top: 2%;
    }


    a
    {
        padding: 10px 25px 10px 25px;
        background: #7CB342;
        color: #FFFFFF;
        border-radius: 20px;
    }


    #INTERNAL_BORDER
    {
        width: 50%;
        background: #FFFFFF;
        padding: 30px 0px 30px 0px;
        border-radius: 20px;
    }


    @media screen and (max-width: 724px)
    {
        #INTERNAL_BORDER
        {
            width: 100% !important;
            background: #FFFFFF;
        }

        #All>div
        {
            top: 1%;
        }
    }

</style>
