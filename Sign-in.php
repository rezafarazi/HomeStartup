<?php include "GUI/Components/Starter.php"; ?>
<script src="GUI/js/Cityes.js"></script>




<div class="container-fluid">

    <div class="row">



        <!--Image Content Start-->
        <div class="col-md-6 Sign-in-Content-Img">

            <div class="container Sign-in-Content-Img-Law">

                <h1>قوانین و مقررات</h1>
                <br>
                <p>
قوانین ومقررات این وب سایت یه مشت چرت و ترپ می باشد و زیاد مغز خود را کثیف ننمایید من یک خالی بند اسکول هستم شمایی هم که اینو داری می خونی و نمی خونی یه گاو تشریف داری من هم یه برنامه نویس حرفه ای هستم و برای این برنامه هیچ ذهمتی مثلا نکشیده ام
                </p>

            </div>

            <div class="container Sign-in-Content-Img-Law-Done">
                <label id="I-DONE-Web-Site-Laws-Lable">
                    <input type="checkbox" id="I-DONE-Web-Site-Laws" onchange="Done_Check(this)">با قوانین وب سایت موافقم
                </label>
            </div>

        </div>
        <!--Image Content End-->


        <!-----------------------------------------------------!>


        <!--Sign-in Content Start-->
        <div class="col-md-6">

            <?php include "GUI/Components/Classic-Header.php"; ?>

            <br>

                <div class="container">

                    <div class="row">

                        <form style="display: contents;direction: rtl;" action="Panle/Events/New-User.php" method="post" dir="rtl" enctype="multipart/form-data">

                            <label class="input-text-half">
                                <center><p>نام خانوادگی</p></center>
                                <input type="text" id="Family" onchange="On_Changed_Text(this)" name="Family">
                            </label>

                            <label class="input-text-half">
                                <center><p>نام</p></center>
                                <input type="text" onchange="On_Changed_Text(this)" id="Name" name="Name">
                            </label>

                            <label class="input-text-half">
                                <center><p>عکس کارت ملی</p></center>
                                <input type="file" id="National_Card" onchange="On_Changed_Text(this)" name="National_Card">
                            </label>

                            <label class="input-text-half">
                                <center><p>شماره ملی</p></center>
                                <input type="text" id="National_ID" onchange="On_Changed_Text(this)" name="National_ID">
                            </label>

                            <label class="input-text-half">
                                <center><p>تاریخ تولد</p></center>
                                <input type="text" id="Birth_Day" onchange="On_Changed_Text(this)" name="Birth_Day">
                            </label>

                            <label class="input-text-half">
                                <center><p>شماره تلفن همراه</p></center>
                                <input type="tel" id="Phone" onchange="On_Changed_Text(this)" name="Phone">
                            </label>

                            <label class="input-text-half">
                                <center><p>استان محل سکونت</p></center>
                                <select id="Ostan-Combobox" onchange="Ostans_Combobox_Change_Event(this)" name="Ostan">
                                    <script>

                                        for(var i=0;i<Ostans.length;i++)
                                        {
                                            document.write("<option value='"+Ostans[i][0]+"'>"+Ostans[i][0]+"</option>");
                                        }

                                    </script>
                                </select>
                            </label>

                            <label class="input-text-half">
                                <center><p>عکس کاربر</p></center>
                                <input type="file" id="User_Image" onchange="On_Changed_Text(this)" name="User_Image">
                            </label>

                            <label class="input-text-half">
                                <center><p>شغل</p></center>
                                <input type="text" id="Job" onchange="On_Changed_Text(this)" name="Job">
                            </label>

                            <label class="input-text-half">
                                <center><p>شهر محل سکونت</p></center>
                                <select id="Cityes-Combobox" name="City">
                                    <script>


                                        document.getElementById("Ostan-Combobox").value=Ostans[0][0];
                                        Fill_Cityes(0);


                                        function Ostans_Combobox_Change_Event(e)
                                        {
                                            Fill_Cityes(e.selectedIndex);
                                        }

                                        function Fill_Cityes(index)
                                        {
                                            var cityes=Ostans[index][1].split(',');
                                            var Combobox=document.getElementById("Cityes-Combobox");
                                            Combobox.options.length=0;
                                            for(var i=1;i<cityes.length;i++)
                                            {
                                                var option=document.createElement("option");
                                                option.text=cityes[i];
                                                option.value=cityes[i];
                                                Combobox.appendChild(option);
                                            }
                                        }



                                    </script>
                                </select>
                            </label>

                            <label class="input-text-full">
                                <center><p>آدرس</p></center>
                                <textarea id="Address" onchange="On_Changed_Text(this)" name="Address"></textarea>
                            </label>

                            <label class="input-text-full">
                                <input type="submit" value="بعدی" id="Submit-Btn" onclick="Click_On_Next_Button(this)">
                            </label>


                        </form>

                    </div>

                </div>



        </div>
        <!--Sign-in Content End-->



    </div>

</div>




<script>


    Next_Button_Disabled();


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


    function Done_Check(e)
    {
        On_Changed_Text(e);
    }


    function On_Changed_Text(e)
    {
        var Controls=[document.getElementById("Name"),document.getElementById("Family"),document.getElementById("National_ID"),document.getElementById("National_Card"),document.getElementById("Phone"),document.getElementById("Birth_Day"),document.getElementById("User_Image"),
        document.getElementById("Ostan-Combobox"),document.getElementById("Cityes-Combobox"),document.getElementById("Job"),document.getElementById("Address")];
        var check=document.getElementById("I-DONE-Web-Site-Laws");
        var Fill_ALL=true;

        for(var i=0;i<Controls.length;i++)
        {
            if(Controls[i].value == "")
            {
                Fill_ALL=false;
            }
        }

        if(Fill_ALL && check.checked == 1)
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
