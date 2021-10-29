<?php include "Header.php"; ?>
<body>



    <div id="loading">

        <div>

            <center>

                <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

            </center>

        </div>

    </div>







    <?php


        if(isset($_REQUEST['User_Id'])&&isset($_REQUEST['Home_Id']))
        {
            UPDATE_History($_REQUEST['Home_Id'],$_SESSION['User_Id_Home_Done'],$_REQUEST['User_Id']);
        }
        else
        {
            // echo "<script>window.location.href='Change_Owner_Start.php';</script>";
        }

    ?>








    <div id="Response-Change-Owner">
        <div id="Response-Change-Owner-Inside">
            <center>
                <p>عملیات با موفقیت انجام شد</p>
            </center>
        </div>
    </div>










    <script>

        window.addEventListener("load",function (e)
        {

            document.getElementById("loading").style.display="none";
            document.getElementById("Response-Change-Owner").style.display="block";


            setInterval(function (e)
            {
                document.location.href="Change_Owner_Start.php";
            },2500);


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


        #Response-Change-Owner
        {
            width: 100%;
            height: 100%;
            position: relative;
        }


        #Response-Change-Owner-Inside
        {
            position: absolute;
            width: 100%;
            top: 45%;
        }


        p
        {
            font-size: 16px;
        }

    </style>


</body>
</html>