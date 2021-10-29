<?php include "Header.php"; ?>
<body>





    <!--Get Log And Page Load Events in Php Start-->
    <?php

        try
        {
            INSERT_NEW_History($_SESSION['User_Id']);
        }
        catch(Exception $Error)
        {

        }

        $User_Type=(int)$_SESSION['User_Id_Home_Type'];


    ?>
    <!--Get Log And Page Load Events in Php End-->








    <!--Main Panle Start-->
    <div class="Panle-All">



        <!--Menu Start-->
        <div class="Panle-Menu">


            <ul>
                <li><a href="#" onclick="On_CLICK_Profile(this)"><center><i title="پروفایل" class="large material-icons">account_circle</i></center></a></li>
                <li><a href="#" onclick="On_CLICK_History(this)"><center><i title="تاریخچه" class="large material-icons">history</i></center></a></li>
                <li><a href="#" onclick="On_CLICK_New(this)"><center><i title="ملک جدید" class="large material-icons">add</i></center></a></li>
                <li><a href="#" onclick="On_CLICK_Change(this)"><center><i title="انتقال مالکیت" class="large material-icons">edit</i></center></a></li>
                <?php if($User_Type<3) echo "<li><a href='#' onclick='On_CLICK_NEW_User(this)'><center><i title='اضافه کردن کاربر جدید' class='large material-icons'>widgets</i></center></a></li>";?>
                <?php if($User_Type<2) echo "<li><a href='#' onclick='On_CLICK_NEW_Admin(this)'><center><i title='اضافه کردن ادمین جدید' class='large material-icons'>devices</i></center></a></li>"?>
                <li><a href="#" onclick="On_CLICK_SEARCH(this)"><center><i title="جست و جو" class="large material-icons">search</i></center></a></li>
            </ul>


        </div>
        <!--Menu End-->


        <!--Search Start-->
        <div class="Panle-Contents">




            <!--Panle Profile Start-->
            <div id="Panle-Profile">

                <div id="Main-Profile-Content">

                    <iframe src="Profile.php" id="Profile_iFrame"></iframe>

                </div>

            </div>
            <!--Panle Profile End-->




            <!--Panle History Start-->
            <div id="Panle-History">

                <div id="Main-History-Content">

                    <iframe src="History.php" id="History_iFrame"></iframe>

                </div>

            </div>
            <!--Panle History End-->




            <!--Panle Edit House Start-->
            <div id="Panle-Edit-Home">

                <div id="Main-Edit-Home-Content">

                    <iframe src="Change_Owner_Start.php" id="Change_Home"></iframe>

                </div>

            </div>
            <!--Panle Edit House End-->



            <!--Panle Add New House Start!-->
            <div id="Panle-Add-New-Home">

                <div id="Main-Add-New-Home-Content">

                    <iframe src="New_Home.php" id="New_Home"></iframe>

                </div>

            </div>
            <!--Panle Add New House End!-->



            <!--Panle Add New Manager Start-->
            <?php

                if($User_Type<2)
                {
                        echo "<div id=\"Panle-Add-New-Manager\">
    
                                <div class=\"Panle-Add-New-Manager-Icon\">
                                    <center>
                                        <img src=\"../GUI/img/Color.png\" width=\"70px\"/>
                                    </center>
                                </div>
                
                
                                <div id=\"Add-Manager-Content\">
                
                                    <center>
                
                                        <input type='text'  name='Search' placeholder='جست و جو با نام شماره پیگیری و هر فیلدی' id='Add-Manager-Content-Search'>
                
                                        <br>
                                        <br>
                
                                        <input type='submit' value='جست و جو' id='Panle-Search-Submit-Button' onclick=\"Add_New_Manager(this,document.getElementById('Add-Manager-Content-Search').value);document.getElementById('Add-Manager-Content-Search').value='';\">
                
                                    </center>
                
                                </div>
                
                            </div>";
                }

            ?>
            <!--Panle Add New Manager End-->



            <!--Search Panle Start-->
            <div id="Panle-Search">

                <div class="Panle-Search-Icon">
                    <center>
                        <img src="../GUI/img/Color.png" width="70px"/>
                    </center>
                </div>

                <form action="#" method="post">

                    <center>

                        <input type="text" name="Search" placeholder="جست و جو با نام شماره پیگیری و هر" id="Search_TextBox">

                        <br>
                        <br>

                        <input type="button" value="جست و جو" id="Panle-Search-Submit-Button" onclick="Get_A_Home_Profile(this,document.getElementById('Search_TextBox').value);document.getElementById('Search_TextBox').value='';">

                    </center>

                </form>

            </div>
            <!--Search Panle End-->



            <!--Active New User Start-->
            <div id="Panle-Active-New-User">

                <?php

                    if($User_Type<3)
                    {

                        $ALL_Disable_Users = SELECT_BY_QUARY("SELECT Id,Name,Family,National_Id,Phone,Birth_Day,Area,City,Job,Address From User Where Enabled=0", "Id~Name~Family~National_Id~Phone~Birth_Day~Area~City~Job~Address", "1");
                        $ALL_Disable_Users = preg_split("/\^/", $ALL_Disable_Users);


                        if(count($ALL_Disable_Users)<=1)
                        {
                            echo "<iframe src='../Error/Empty.php' id='Is-Empty'></iframe>";
                        }


                        for ($i = 1; $i < count($ALL_Disable_Users); $i++)
                        {

                            $User_Ditales = preg_split("/\~/", $ALL_Disable_Users[$i]);

                            ?>

                            <!--User Items Start-->
                            <a onclick="Get_A_Disable_User_Func(this,<?php echo $User_Ditales[0]; ?>)">

                                <div class="Disable-Users-Content">

                                    <div>
                                        <p>نام : <?php echo $User_Ditales[1]; ?></p>
                                        <p>نام خانوادگی : <?php echo $User_Ditales[2]; ?></p>
                                        <p>شماره ملی : <?php echo $User_Ditales[3]; ?></p>
                                        <p>شماره تلفن : <?php echo $User_Ditales[4]; ?></p>
                                    </div>

                                    <div>
                                        <p>تاریخ تولد : <?php echo $User_Ditales[5]; ?></p>
                                        <p>استان : <?php echo $User_Ditales[6]; ?></p>
                                        <p>شهر : <?php echo $User_Ditales[7]; ?></p>
                                        <p>شغل : <?php echo $User_Ditales[8]; ?></p>
                                    </div>

                                    <div>
                                        <p>آدرس : <?php echo $User_Ditales[9]; ?></p>
                                    </div>

                                </div>

                            </a>
                            <!--User Items End-->

                            <?php

                        }

                    }
                ?>

            </div>
            <!--Active New User End-->



        </div>
        <!--Search End-->



    </div>
    <!--Main Panle End-->








    <!--Dialogs Start-->
    <div id="Dialogs">



        <!--Show Disable User Dialog Start-->
        <div id="Diable-User-Dialog-Content">

            <center>

                <div id="Diable-User-Dialog">


                    <div id="Diable-User-Dialog-Context">

                        <iframe id="Diable-User-Dialog-Context-Inside"></iframe>

                    </div>


                    <a id="Close-Diable-User-Dialog" onclick="Close_Dialog(this)">بستن</a>

                </div>

            </center>

        </div>
        <!--Show Disable User Dialog End-->


    </div>
    <!--Dialogs End-->






    <script src="js/Main.js"></script>
</body>
</html>







