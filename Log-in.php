<?php include "GUI/Components/Starter.php"; ?>
<script src="GUI/js/Cityes.js"></script>






<div class="container-fluid">

    <div class="row" style="height: 100%;">



        <!--Image Content Start-->
        <div class="col-md-6 Sign-in-Content-Img" style="height: 100% !important;">

            <div class="container Sign-in-Content-Img-Law">

                <h1>قوانین و مقررات</h1>
                <br>
                <p>
                    قوانین ومقررات این وب سایت یه مشت چرت و ترپ می باشد و زیاد مغز خود را کثیف ننمایید من یک خالی بند اسکول هستم شمایی هم که اینو داری می خونی و نمی خونی یه گاو تشریف داری من هم یه برنامه نویس حرفه ای هستم و برای این برنامه هیچ ذهمتی مثلا نکشیده ام
                </p>

            </div>

        </div>
        <!--Image Content End-->


        <!-----------------------------------------------------!>


        <!--Sign-in Content Start-->
        <div class="col-md-6 Login-Border">


            <!--Header Start-->
            <?php include "GUI/Components/Classic-Header.php"; ?>
            <!--Header End-->


            <form method="post" action="Panle/index.php" dir="rtl">

                <div class="container Login-Border-Indide">

                    <center>

                        <div class="row" style="width: 75%;">

                            <label class="input-text-full">
                                <center><p>شماره ملی</p></center>
                                <input type="text" id="National_ID" onchan="On_Changed_Text(this)" name="National_ID">
                            </label>

                            <label class="input-text-full">
                                <center><p>شماره تلفن همراه</p></center>
                                <input type="tel" id="Phone" onchange="On_Changed_Text(this)" name="Phone">
                            </label>

                            <label id="I-DONE-Web-Site-Laws-Lable" style="color: #2f2f2f;">
                                <input type="checkbox" id="I-DONE-Web-Site-Laws" name="Stay_Me" onchange="On_Changed_Text(this)">من را به خاطر بسپار
                            </label>

                            <label class="input-text-full">
                                <input type="submit" value="بعدی" id="Submit-Btn" onclick="Click_On_Next_Button(this)">
                            </label>

                        </div>

                    </center>

                </div>

            </form>




        </div>
        <!--Sign-in Content End-->



    </div>

</div>







<script>


    function Next_Button_Disabled()
    {
        var next_button=document.getElementById("Submit-Btn");
        next_button.disabled=true;
        next_button.style.background="#616161";
    }


    function Next_Button_Enabled()
    {
        var next_button=document.getElementById("Submit-Btn");
        next_button.disabled=false;
        next_button.style.background="#7CB342";
    }


    Next_Button_Disabled();


    function On_Changed_Text(e)
    {
        var National_ID=document.getElementById("National_ID");
        var Phone=document.getElementById("Phone");

        if( National_ID.value.trim()!="" && Phone.value.trim()!="" )
        {
            Next_Button_Enabled();
        }
        else
        {
            Next_Button_Disabled();
        }
    }


</script>






<?php include "GUI/Components/Ender.php"; ?>
