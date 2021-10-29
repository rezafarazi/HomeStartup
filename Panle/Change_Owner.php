<?php include "Header.php";?>
<body>



<div id="loading">

    <div>

        <center>

            <img src="https://niafam.com/uploads/assets/images/loading_blue.gif" width="250px">

        </center>

    </div>

</div>


<?php $Home_Id=$_REQUEST['Home_Id']; ?>


<div id="all-Content-Change-Own">

    <div id="Change-Own-Center-Panle">

        <center>

            <img src="../GUI/img/Color.png">

            <form method="post" action="End_Done_Change_Owner.php?Home_Id=<?php echo $Home_Id;?>">

                <input type="text" name="Own_Code" placeholder="کد کاربری کاربر مورد نظر">

                <br>

                <br>

                <div id="Grid-Buttons-Event">

                    <input type="submit" id="Submit-Btn" value="اعمال تغییرات">

                    <input type="button" id="Submit-Btn" value="انصراف" style="background: #F00" onclick="onclick_Cancel(this)">

                </div>

            </form>

        </center>

    </div>

</div>



<script>

    window.addEventListener("load",function (e) {

        document.getElementById("loading").style.display="none";
        document.getElementById("all-Content-Change-Own").style.display="block";

    });


    function onclick_Cancel(e)
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



    #all-Content-Change-Own
    {
        width: 100%;
        height: 100%;
        position: relative;
        display: none;
    }


    #Change-Own-Center-Panle
    {
        width: 100%;
        position: absolute;
        top: 25%;
    }


    #Change-Own-Center-Panle>center>img
    {
        width: 55px;
        padding: 25px;
    }


    #Change-Own-Center-Panle>center>form>input,#Grid-Buttons-Event>input
    {
        width: 50%;
        outline: none;
        border: 1px solid #CCC;
        padding: 5px 8px 5px 8px;
        border-radius: 15px;
        font-size: 14px;
        text-align: center;
        height: 50px;
    }


    #Change-Own-Center-Panle>center>form>input::selection
    {
        background: #7CB342;
        color: #FFFFFF;
    }


    #Submit-Btn
    {
        background: #7CB342;
        color: #FFFFFF;
        cursor: pointer;
        width: 15% !important;
    }


    @media screen and (max-width: 724px)
    {
        #Change-Own-Center-Panle>center>form>input
        {
            width: 80%;
        }

        #Submit-Btn
        {
            width: 34% !important;
        }
    }

</style>
</body>
</html>

