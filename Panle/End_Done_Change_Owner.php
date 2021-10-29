<?php include "Header.php"; ?>
    <body>







        <script>
        
            function Error()
            {
                setInterval(function ()
                {
                    window.location.href='Change_Owner_Start.php';
                },3000)
            }

        </script>








        <div id="loading">

            <div>

                <center>

                    <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

                </center>

            </div>

        </div>








        <?php

            if(isset($_REQUEST['Home_Id']) && isset($_REQUEST['Own_Code']))
            {
                $Home_Id = $_REQUEST['Home_Id'];
                $User_Id = $_REQUEST['Own_Code'];
                $Curent_User_Id = $_SESSION['User_Id_Home_Done'];
                $Rows = SELECT_BY_QUARY("SELECT * FROM User INNER JOIN History ON User.Id=History.User_Id INNER JOIN Home ON History.Home_Id=Home.Id WHERE Home.Id=$Home_Id AND History.User_Id=$Curent_User_Id AND History.End_Date IS NULL", "Id", "1");
                $Rows=preg_split("/\~/",$Rows);
                if (count($Rows) > 0)
                {
                    $User = SELECT_BY_QUARY("SELECT Name,Family,Job,Phone,Area,City,Address FROM User WHERE User.Id=$User_Id AND User.Enabled=1", "Name~Family~Job~Phone~Area~City~Address", "0");

                    if (trim($User)!="")
                    {

                        $User = preg_split("/\~/", $User);

                    }
                    else
                    {
                        echo "<style> #all-Content-Change-Own-End{display: none !important;} #Error-Border{display:block !important;} </style>";
                        echo "<script>Error();</script>";
                    }

                }
                else
                {
                    echo "<style> #all-Content-Change-Own-End{display: none !important;} #Error-Border{display:block !important;} </style>";
                    echo "<script>Error();</script>";
                }
            }
            else
            {
                echo "<script>window.location.href='Change_Owner_Start.php';</script>";
            }

        ?>










        <div id="all-Content-Change-Own-End">

            <div id="Header">

                <center><img src="../GUI/img/Color.png" width="35px"></center>

            </div>

            <div id="New_Own_User_Ditales">

                <center>

                    <img src="../uploads/User/20190213_033840.jpg"/>

                    <div id="Ditales">

                        <p>نام : <?php echo $User[0];?></p>
                        <p>نام خانوادگی : <?php echo $User[1];?></p>
                        <p>شغل : <?php echo $User[2];?></p>
                        <p>شماره تلفن همراه : <?php echo $User[3];?></p>
                        <p>استان محل سکونت : <?php echo $User[4];?></p>
                        <p>شهر محل سکونت : <?php echo $User[5];?></p>
                        <p>آدرس : <?php echo $User[6];?></p>

                        <br>

                        <div id="Grid-Buttons-Event">

                            <a id="Submit-Btn" href="End_Done_Change_Owner_Event.php?User_Id=<?php echo $User_Id; ?>&Home_Id=<?php echo $Home_Id; ?>">اعمال تغییرات</a>

                            <a id="Submit-Btn" style="background: #F00" onclick="OnClick_Cancel(this)">انصراف</a>

                        </div>

                    </div>

                </center>

            </div>

        </div>









        <div id="Error-Border">
            <div id="Error-Border-Inside">
                <center>
                    <p>...اطلاعات وارد شده اشتباه می باشد و یا کاربر مورد نظر شما غیرفعال است</p>
                </center>
            </div>
        </div>










        <script>

            window.addEventListener("load",function (e) {

                document.getElementById("loading").style.display="none";
                document.getElementById("all-Content-Change-Own-End").style.display="block";

            });


            function OnClick_Cancel(e)
            {
                document.location.href="Change_Owner_Start.php";
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

        
            #Error-Border
            {
                width: 100%;
                height: 100%;
                position: relative;
                display:none;
            }



            #Error-Border-Inside
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
            }

        </style>
    </body>
</html>

