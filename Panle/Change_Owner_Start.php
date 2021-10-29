<?php include "Header.php"; ?>
<body>


<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">



        </center>

    </div>

</div>



<div id="all-Content-Change-Own">
    <div class="Panle-Add-New-Manager-Icon">
        <center>
            <img src="../GUI/img/Color.png" width="70px"/>
        </center>
    </div>


    <div id="Add-Manager-Content">

        <center>

            <form method="post" action="Change_Home.php">

                <select id="Home_ID_Text_Input" name="Home_Id">
                    <?php

                        $SQL="SELECT History.Home_Id AS Id FROM History WHERE (End_Date='' OR End_Date IS Null) AND User_Id=".$_SESSION['User_Id'];
                        $date = date('Y/m/d', time());
                        $My_Homes=SELECT_BY_QUARY($SQL,"Id","0");
                        $My_Homes=preg_split("/\~/",$My_Homes);
                        for($i=0;$i<count($My_Homes)-1;$i++)
                        {
                            echo "<option value='$My_Homes[$i]'>$My_Homes[$i]</option>";
                        }

                    ?>
                </select>

                <br>
                <br>

                <input type="submit" value="شروع تغییر" id="Panle-Search-Submit-Button">

            </form>

        </center>

    </div>
</div>



<script>

    window.addEventListener("load",function (e) {

        document.getElementById("loading").style.display="none";
        document.getElementById("all-Content-Change-Own").style.display="block";

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



    #all-Content-Change-Own
    {
        width: 100%;
        height: 100%;
        position: relative;
        display: none;
    }


    #Home_ID_Text_Input
    {
        width: 320px;
        font-size: 16px;
        padding: 6px 10px 6px 10px;
        border-radius: 20px;
        border: none;
        outline: none;
        text-align: center;
        border: 1px solid #CCC;
        background: #FFFFFF;
        direction: rtl;
    }


    #Home_ID_Text_Input>option
    {
        text-align: center;
    }


    #Panle-Search-Submit-Button
    {
        width: 250px;
        font-size: 16px;
        padding: 10px 25px 10px 25px;
        border-radius: 20px;
        border: none;
        outline: none;
        text-align: center;
        background: #7CB342;
    }


    @media screen and(max-width: 724px)
    {
        #Home_ID_Text_Input,#Panle-Search-Submit-Button
        {
            width: 90% !important;
        }
    }


</style>
</body>
</html>

