<?php include "Header.php"; ?>

<body>
<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>


















<div id="Show_Selected_Users">


    <?php

        $Search=$_REQUEST['Search'];
        $Users=SELECT_BY_QUARY("SELECT Id,Name,Family,User_Image FROM User WHERE (Name LIKE '%$Search%' OR Family LIKE '%$Search%' OR National_Id LIKE '%$Search%' OR Phone LIKE '%$Search%' OR Area LIKE '%$Search%' OR City LIKE '%$Search%' OR Job LIKE '%$Search%' OR Address LIKE '%$Search%' OR Done_User_Id LIKE '%$Search%') AND (Enabled=1);","Id~Name~Family~User_Image","1");
        $Users=preg_split("/\^/",$Users);

        if(count($Users)<=1)
        {
            echo "<script>document.location.href='../Error/Empty.php';</script>";
        }

    ?>


    <div id="Main-Content-Select-Users">

        <?php

        for($i=1;$i<count($Users);$i++)
        {

            $User=preg_split("/\~/",$Users[$i]);

        ?>

            <a href="Add_New_Manager.php?User=<?php echo $User[0]; ?>">
                <div class="User">
                    <center>
                        <img src="../uploads/User/<?php echo $User[3]; ?>"/>
                        <br>
                        <p><?php echo $User[2]." - ".$User[1]; ?></p>
                    </center>
                </div>
            </a>


        <?php

        }

        ?>

    </div>


</div>




















<script>

    window.addEventListener("load",function (e)
    {

        document.getElementById("loading").style.display="none";
        document.getElementById("Show_Selected_Users").style.display="block";

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



    #Show_Selected_Users
    {
        width: 100%;
        height: 100%;
        position: relative;
        display: none;
        direction: rtl;
    }


    #Main-Content-Select-Users
    {
        width: 100%;
        height: 100%;
        display: table;
    }


    #Main-Content-Select-Users>a
    {
        display: -webkit-inline-flex;
    }


    .User
    {
        width: 180px;
        height: 180px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        border-radius: 5px;
        margin: 10px;
    }


    .User>center>img
    {
        width: 110px;
        height: 110px;
        border-radius: 500%;
        margin: 8px;
    }


    .User>center>p
    {
        margin-top: 8px;
        color: #2F2F2F;
    }


    @media screen and (max-width: 724px)
    {

        .User
        {
            width: 100%;
        }

        #Main-Content-Select-Users>a
        {
            width: 100%;
        }
    }

</style>


</body>
</html>

