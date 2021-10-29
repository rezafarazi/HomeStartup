<?php include "Header.php";?>


    <body>



        <br>
        <center><p id="Title-History">تاریخچه کلی</p></center>


        <br>


        <center>
            <div id="History-Content">

                <div class="Divided-3">

                    <div class="Divided-3-Content">

                        <div>

                            <center>
                                <p>تاریخ شروع</p>
                                <br>
                                <p><?php

                                    $Start_Date=SELECT_BY_QUARY("SELECT Date From User WHERE Id=".$_SESSION['User_Id'],"Date","0");
                                    $Start_Date=preg_split("/\~/",$Start_Date);
                                    echo $Start_Date[0];

                                    ?></p>
                            </center>

                        </div>

                    </div>

                </div>
                <div class="Divided-3">

                    <div class="Divided-3-Content">

                        <div>

                            <center>
                                <p>تعداد املاک ثبت شده</p>
                                <br>
                                <p>
                                    <?php

                                    $My_Home_Count=SELECT_BY_QUARY("SELECT Count(Id) AS Count FROM History WHERE User_Id=".$_SESSION['User_Id'],"Count","0");
                                    $My_Home_Count=preg_split('/\~/',$My_Home_Count);
                                    echo $My_Home_Count[0];

                                    ?>
                                </p>
                            </center>

                        </div>

                    </div>

                </div>
                <div class="Divided-3">

                    <div class="Divided-3-Content">

                        <div>

                            <center>
                                <p>تعداد املاک به اسم شما در حال حاضر</p>
                                <br>
                                <p>
                                    <?php

                                        $My_Home_Count_Now=SELECT_BY_QUARY("SELECT Count(Id) AS Count FROM History WHERE User_Id=".$_SESSION['User_Id'],"Count","0");
                                        $My_Home_Count_Now=preg_split('/\~/',$My_Home_Count_Now);
                                        echo $My_Home_Count_Now[0];

                                    ?>
                                </p>
                            </center>

                        </div>

                    </div>

                </div>
                <div class="Divided-3">

                    <div class="Divided-3-Content">

                        <div>

                            <center>
                                <p>تعداد ورود به وب سایت در امروز</p>
                                <br>
                                <p>
                                    <?php

                                    $date = date('m/d/Y', time());

                                    $My_Log_To_Day=SELECT_BY_QUARY("SELECT Count(Id) AS Count FROM Log_History WHERE User_Id=".$_SESSION['User_Id']." AND Date LIKE '".$date."';","Count","0");
                                    $My_Log_To_Day=preg_split('/\~/',$My_Log_To_Day);
                                    echo $My_Log_To_Day[0];


                                    ?>
                                </p>
                            </center>

                        </div>

                    </div>

                </div>
                <div class="Divided-3">

                    <div class="Divided-3-Content">

                        <div>

                            <center>
                                <p>تعداد ورود به وب سایت در این ماه</p>
                                <br>
                                <p>
                                    <?php

                                    $date = date('m', time());

                                    $My_Log_To_Month=SELECT_BY_QUARY("SELECT Count(Id) AS Count FROM Log_History WHERE Date LIKE '$date/%/%' AND User_Id=".$_SESSION['User_Id'],"Count","0");
                                    $My_Log_To_Month=preg_split('/\~/',$My_Log_To_Month);
                                    echo $My_Log_To_Month[0];

                                    ?>
                                </p>
                            </center>

                        </div>

                    </div>

                </div>

            </div>
        </center>


        <style>



            @font-face
            {
                font-family: 'Vazir';
                src: url("Font/Vazir.ttf");
            }


            *
            {
                font-family: Vazir !important;
            }


            #History-Content
            {
                width: 100%;
            }

            .Divided-3
            {
                width: 25%;
                height: 150px;
                display: inline-flex;
                background: #FFF;
                margin: 25px;
                border: 1px solid #CCC;
                border-radius: 5px;
                direction: rtl !important;
            }


            .Divided-3-Content
            {
                width: 100%;
                height: 100%;
                position: relative;
            }


            .Divided-3-Content>div
            {
                position: relative;
                top: 24%;
            }


            .Divided-3:hover
            {
                transition: all 0.2s ease-in-out;
                box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            }

            #Title-History
            {
                font-size: 18px;
                border-bottom: 1px solid #7CB342;
                width: 150px;
                padding-bottom: 15px;
            }

            @media screen and (max-width: 724px)
            {
                .Divided-3
                {
                    width: 100%;
                    margin: 0px 0px 10px 0px !important;
                }

                body
                {
                    margin-bottom: 60px;
                }
            }

        </style>
    </body>
</html>
