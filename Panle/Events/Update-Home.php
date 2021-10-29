<div id="All-Content">
    <div id="All-Content-Inside">
        <center>
            <?php

                include "Header.php";

                if(isset($_POST['Home_Id'])&&isset($_POST['Title'])&&isset($_POST['Year'])&&isset($_POST['Tax_Code'])&&isset($_POST['Meters'])&&isset($_POST['Price_Money'])&&isset($_POST['Area'])&&isset($_POST['City'])&&isset($_POST['Parking'])&&isset($_POST['Anbar'])&&isset($_POST['Home_Type'])&&isset($_POST['Address']))
                {
                        $Id=$_POST['Home_Id'];
                        $Title=$_POST['Title'];
                        $Year=$_POST['Year'];
                        $Tax_Code=$_POST['Tax_Code'];
                        $Meters=$_POST['Meters'];
                        $Price_Money=$_POST['Price_Money'];



                        $Image="";
                        if(isset($_FILES['Image']['tmp_name']))
                        {
                            $Image=NEW_UPLOAD_Home_IMAGE().".jpg";
                            move_uploaded_file($_FILES['Image']['tmp_name'],"../../uploads/Home/".$Image);
                        }



                        $Area=$_POST['Area'];
                        $City=$_POST['City'];
                        $Parking=$_POST['Parking'];
                        $Anbar=$_POST['Anbar'];
                        $Home_Type=$_POST['Home_Type'];
                        $Address=$_POST['Address'];
                        $Result=UPDATE_Home($Id,$Title,$Year,$Tax_Code,$Meters,$Price_Money,$Image,$Area,$City,$Parking,$Anbar,$Home_Type,$Address);

                        if($Result==1 || $Result==true)
                        {
                            echo "<p>...عملیات با موفقیت انجام شد چند لحظه صبر کنید</p>";
                        }
                        else
                        {
                            echo "<p>...عملیات ناموفق لطفا چند لحظه دیگر دوباره تلاش کنید</p>";
                        }

                }
                else
                {
                    echo "<script> document.location.href='../Change_Owner_Start.php'; </script>";
                }

            ?>
        </center>
    </div>
</div>


<style>

#All-Content
{
    width:100%;
    height:100%;
    position:relative;
}


#All-Content-Inside
{
    width:100%;
    height:150px;
    position: absolute;
    top: 44%;
}


</style>



<script>

    setInterval(function ()
    {
        document.location.href='../Change_Owner_Start.php';
    },3000);

// setInterval(() =>
// {
//
// }, 3000);

</script>