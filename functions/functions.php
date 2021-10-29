<?php














//SERVER
//-------------------------------------------------------------------------------SERVER------------------------------------//
class CMS_SERVER
{
    public static $SERVER_ADDRESS="127.0.0.1:8090";
    public static $SERVER_DB="Home_Done";
    public static $SERVER_USER="root";
    public static $SERVER_PASSWORD="";

    function GET_SERVER_ADDRESS()
    {
        return $this->SERVER_ADDRESS;
    }

    function GET_SERVER_DB()
    {
        return $this->SERVER_DB;
    }

    function GET_SERVER_USER()
    {
        return $this->SERVER_USER;
    }

    function GET_SERVER_PASSWORD()
    {
        return $this->SERVER_PASSWORD;
    }
}
//-------------------------------------------------------------------------------SERVER------------------------------------//
//SERVER





















//Public
//-------------------------------------------------------------------------------Public Functions------------------------------------//
function NOT_FOUND()
{
    header("location:Error/404.php");
}


function LOG_IN_PANLE()
{
    header("location:index.php");
}


function NEW_POST_NAME()
{
    $myfile = fopen("../uploads/image_POSTs/Upload_Name_Post.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/image_POSTs/Upload_Name_Post.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_ITEM_NAME()
{
    $myfile = fopen("../uploads/image_ITEMs/Upload_Name_Item.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/image_ITEMs/Upload_Name_Item.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_SUB_ITEM_NAME()
{
    $myfile = fopen("../uploads/image_SUB_ITEMs/Upload_Name_SUB_Item.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../uploads/image_SUB_ITEMs/Upload_Name_SUB_Item.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_UPLOAD_USER_IMAGE()
{
    $myfile = fopen("../../uploads/User/User_Counter.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../../uploads/User/User_Counter.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_UPLOAD_Home_IMAGE()
{
    $myfile = fopen("../../uploads/Home/Home_Counter.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../../uploads/Home/Home_Counter.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}


function NEW_UPLOAD_NATIONAL_CARD_IMAGE()
{
    $myfile = fopen("../../uploads/User/User_Counter.txt","r");
    $Val=fgets($myfile);
    fclose($myfile);

    $filew=fopen("../../uploads/User/User_Counter.txt","w");
    $Val_INT=(int)$Val;
    $Val_INT++;
    fwrite($filew,$Val_INT);
    fclose($filew);

    return $Val;
}



function Log_Persmission_To_Panle_1()
{
    $Permission=fopen("Permissions/Log_Panle.txt","w");
    fwrite($Permission,"1");
    fclose($Permission);
}


function Log_Persmission_To_Panle_0()
{

    $Permission=fopen("Permissions/Log_Panle.txt","r");
    $Val=fgets($Permission);
    fclose($Permission);

    $Permission=fopen("Permissions/Log_Panle.txt","w");
    fwrite($Permission,"0");
    fclose($Permission);


    return $Val;

}


function Get_All_Upload_Files()
{
    $Files="";

    $path = "../uploads/Files";

    $file=scandir($path);

    foreach ($file as $f)
    {
        if($f=="."||$f=="..")
            continue;
        $Files.=$f."~";
    }

    return $Files;

}


function HTML_Encrypt($value)
{
    $NEW_HTML=str_replace("<","!@##@!",$value);
    $NEW_HTML=str_replace(">","#@!!@#",$NEW_HTML);
    $NEW_HTML=str_replace("'","$$%%$$",$NEW_HTML);
    $NEW_HTML=str_replace("\n","",$NEW_HTML);
    $NEW_HTML=str_replace("\r","",$NEW_HTML);
    $NEW_HTML=str_replace("~","&*&&",$NEW_HTML);
    return $NEW_HTML;
}



function HTML_Decrypt($value)
{
    $NEW_HTML=str_replace("!@##@!","<",$value);
    $NEW_HTML=str_replace("#@!!@#",">",$NEW_HTML);
    $NEW_HTML=str_replace("$$%%$$","'",$NEW_HTML);
    return $NEW_HTML;
}


//Public
//-------------------------------------------------------------------------------Public Functions------------------------------------//




















//SELECT
//-------------------------------------------------------------------------------SELECT Functions------------------------------------//
function SELECT_BY_QUARY($SQL, $ROWS, $Spicial_Char)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;
    $rows=preg_split ("/\~/", $ROWS);
    $results="";

    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($SQL);

        if ($result->num_rows > 0)
        {

            while($row = $result->fetch_assoc())
            {


                if($Spicial_Char=="3")
                {
                    $Json=array();

                    for($a=0;$a<count($rows);$a++)
                        array_push($Json,$rows[$a]."~".$row[$rows[$a]]);

                    $results.=json_encode($Json);

                    $results=str_replace("~","\":\"",$results);

                    continue;
                }

                if($Spicial_Char=="1")
                    $results.="^";
                for($a=0;$a<count($rows);$a++)
                    $results.=($row[$rows[$a]]."~");
            }
        }
        else
        {
            // echo "0 results";
        }

        $conn->close();
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }

    return $results;

}
//-------------------------------------------------------------------------------SELECT Functions------------------------------------//
//SELECT

























//INSERT
//-------------------------------------------------------------------------------INSERT Functions------------------------------------//
//Insert New User Table Start
function INSERT_NEW_User($Name,$Family,$National_ID,$National_Card,$Phone,$Birth_Day,$User_Image,$Area,$City,$Job,$Address)
{

    $Result = false;

    $Rows=SELECT_BY_QUARY("SELECT Id FROM User WHERE National_Id='$National_ID' OR Phone='$Phone';","Id","1");
    $Rows=preg_split("/\^/",$Rows);

    echo count($Rows);

    if(count($Rows)<=1)
    {

        $servername = CMS_SERVER::$SERVER_ADDRESS;
        $username = CMS_SERVER::$SERVER_USER;
        $password = CMS_SERVER::$SERVER_PASSWORD;
        $dbname = CMS_SERVER::$SERVER_DB;

        $date = date('m/d/Y h:i:s a', time());

        try
        {
            $conn = new mysqli($servername, $username, $password, $dbname);

            mysqli_set_charset($conn, "utf8");

            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO `User`(`Name`, `Family`, `National_Id`, `National_Card`, `Phone`, `Birth_Day`, `User_Image`, `Area`, `City`, `Job`, `Address`, `User_Type`, `Enabled`,`Date`) VALUES ('$Name','$Family','$National_ID','$National_Card','$Phone','$Birth_Day','$User_Image','$Area','$City','$Job','$Address',3,0,'$date')";

            if ($conn->query($sql) === TRUE)
            {
                $Result = true;
            }
            else
            {
                $Result = false;
            }
        }
        catch (PDOException $e)
        {
            $Result = false;
        }

        $conn->close();

         

    }

    return $Result;

}
//Insert New User Table End











//Insert New Log History Table Start
function INSERT_NEW_History($User_Id)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    $Result=false;
    $date = date('m/d/Y', time());
    $Time=date('h:i:s a', time());


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `Log_History`(`User_Id`, `Date`, `Time`) VALUES ($User_Id,'$date','$Time')";

        if ($conn->query($sql) === TRUE)
        {
            $Result=true;
        }
        else
        {
            $Result=false;
        }
    }
    catch(PDOException $e)
    {
        $Result=false;

    }

    $conn->close();

     

    return $Result;
}
//Insert New Log History Table End











//Insert New Search History Table Start
function INSERT_NEW_Search_History($User_Id,$Search_Value)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    $Result=false;
    $date = date('m/d/Y h:i:s a', time());


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `Search_History`(`User_Id`, `Search_Value`, `Date`) VALUES ($User_Id,'$Search_Value','$date')";

        if ($conn->query($sql) === TRUE)
        {
            $Result=true;
        }
        else
        {
            $Result=false;
        }
    }
    catch(PDOException $e)
    {
        $Result=false;

    }

    $conn->close();

     

    return $Result;
}
//Insert New Search History Table End










//Insert New Home Table Start
function INSERT_NEW_Home($Title, $Year, $Tax_Code, $Meters, $Price_Money, $Image, $Area, $City, $Parking, $Anbar, $Type_Id, $Document_Image, $Address, $Enable_User, $Done_User_Id, $Start_Date, $Start_Time, $Is_Pay_Money)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    $Result=false;
    $date = date('m/d/Y', time());
    $time = date('h:i:s a', time());


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `Home`(`Title`, `Year`, `Tax_Code`, `Meters`, `Price_Money`, `Image`, `Area`, `City`, `Parking`, `Anbar`, `Type_Id`, `Document_Image`, `Address`, `Enable_User`, `Done_User_Id`, `Start_Date`, `Start_Time`, `Is_Pay_Money`) VALUES ('$Title','$Year','$Tax_Code','$Meters','$Price_Money','$Image','$Area','$City',$Parking,$Anbar,$Type_Id,'$Document_Image','$Address',$Enable_User,$Done_User_Id,'$date','$time','$Is_Pay_Money')";

        if ($conn->query($sql) === TRUE)
        {
            $Result=true;
        }
        else
        {
            $Result=false;
        }
    }
    catch(PDOException $e)
    {
        $Result=false;
    }

    $conn->close();

     

    return $Result;
}
//Insert New Home Table End










//Insert New History Table Start
function INSERT_NEW_Home_History($User_Id, $Home_Id, $Start_Date, $End_Date)
{

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    $Result=false;
    $date = date('m/d/Y h:i:s a', time());


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "INSERT INTO `History`(`User_Id`, `Home_Id`, `Start_Date`, `End_Date`) VALUES ($User_Id,$Home_Id,'$date',null)";


        if ($conn->query($sql) === TRUE)
        {
            $Result=true;
        }
        else
        {
            $Result=false;
        }
    }
    catch(PDOException $e)
    {
        $Result=false;
    }

    $conn->close();

     

    return $Result;
}
//Insert New History Table End
//-------------------------------------------------------------------------------INSERT Functions------------------------------------//
//INSERT























//UPDATE
//-------------------------------------------------------------------------------UPDATE Functions------------------------------------//

//UPDATE User Start
function UPDATE_USER($id,$Enabled,$Name,$Family,$Phone,$User_Image,$Birth_Day,$Area,$City,$Job,$Address,$National_Id,$National_Card,$User_Type,$Done_User_Id)
{

    $Result = false;

    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    $date = date('m/d/Y h:i:s a', time());


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn, "utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $UPDATE_Values="";

        if($Enabled!="")
        {
            $UPDATE_Values.="Enabled=$Enabled,";
        }
        else
        {
            $UPDATE_Values.="Enabled=0,";
        }


        if($Name!="")
        {
            $UPDATE_Values.=" Name='$Name',";
        }

        if($Family!="")
        {
            $UPDATE_Values.=" Family='$Family',";
        }

        if($Phone!="")
        {
            $UPDATE_Values.=" Phone='$Phone',";
        }

        if($User_Image!="")
        {
            $UPDATE_Values.=" User_Image='$User_Image',";
        }

        if($Birth_Day!="")
        {
            $UPDATE_Values.=" Birth_Day='$Birth_Day',";
        }

        if($Area!="")
        {
            $UPDATE_Values.=" Area='$Area',";
        }

        if($City!="")
        {
            $UPDATE_Values.=" City='$City',";
        }

        if($Job!="")
        {
            $UPDATE_Values.=" Job='$Job',";
        }

        if($Address!="")
        {
            $UPDATE_Values.=" Address='$Address',";
        }

        if($National_Id!="")
        {
            $UPDATE_Values.=" National_Id='$National_Id',";
        }

        if($National_Card!="")
        {
            $UPDATE_Values.=" National_Card='$National_Card',";
        }

        if($User_Type!="")
        {
            $UPDATE_Values.=" User_Type='$User_Type',";
        }

        if($Done_User_Id!="")
        {
            $UPDATE_Values.=" Done_User_Id='$Done_User_Id',";
        }


        $WHERE_VALUE=" WHERE ";

        if($id!="")
        {
            $WHERE_VALUE.="User.Id=".(($id!="")?$id:$_SESSION['User_Id_Home_Done']);
        }
        else
        {
            $WHERE_VALUE.="User.National_Id=".$_SESSION['Nantional_ID_Home_Done'];
        }


        $UPDATE_Values=substr($UPDATE_Values, 0, -1);

        $sql = "UPDATE User SET ".$UPDATE_Values." ".$WHERE_VALUE;



        if ($conn->query($sql) === TRUE)
        {
            $Result = true;
        }
        else
        {
            $Result = false;
        }
    }
    catch (PDOException $e)
    {
        $Result = false;
    }

    $conn->close();


    return $Result;

}
//UPDATE User End


//UPDATE Home Start
function UPDATE_Home($Id,$Title,$Year,$Tax_Code,$Meters,$Price_Money,$Image,$Area,$City,$Parking,$Anbar,$Type_Id,$Address)
{
    $servername = CMS_SERVER::$SERVER_ADDRESS;
    $username = CMS_SERVER::$SERVER_USER;
    $password = CMS_SERVER::$SERVER_PASSWORD;
    $dbname = CMS_SERVER::$SERVER_DB;


    $Result=false;
    $date = date('m/d/Y h:i:s a', time());


    try
    {
        $conn = new mysqli($servername, $username, $password, $dbname);

        mysqli_set_charset($conn,"utf8");

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        if($Image!="" || $Image !=null)
        {
            $Image=",Image='$Image'";
        }
        $sql = "UPDATE Home SET Title='$Title',Year='$Year',Tax_Code='$Tax_Code',Meters='$Meters',Price_Money='$Price_Money',Area='$Area'$Image,City='$City',Parking=$Parking,Anbar=$Anbar,Type_Id=$Type_Id,Address='$Address' WHERE Id=$Id;";


        if ($conn->query($sql) === TRUE)
        {
            $Result=true;
        }
        else
        {
            $Result=false;
        }
    }
    catch(PDOException $e)
    {
        $Result=false;
    }

    $conn->close();

     

    return $Result;
}
//UPDATE Home End




//Change Owner Start
function UPDATE_History($Home_Id,$Curent_User_Id,$New_User_Id)
{


    $date = date('m/d/Y h:i:s a', time());


    $R=INSERT_NEW_Home_History($New_User_Id,$Home_Id,$date,"");


    $Result=false;

    if($R || $R==1)
    {
        $servername = CMS_SERVER::$SERVER_ADDRESS;
        $username = CMS_SERVER::$SERVER_USER;
        $password = CMS_SERVER::$SERVER_PASSWORD;
        $dbname = CMS_SERVER::$SERVER_DB;
    
        try
        {
            $conn = new mysqli($servername, $username, $password, $dbname);
    
            mysqli_set_charset($conn,"utf8");
    
            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }
    
            $sql = "UPDATE History SET End_Date='$date' WHERE Home_Id=$Home_Id AND User_Id=$Curent_User_Id AND (End_Date IS NULL OR End_Date = '') AND User_Id!=$New_User_Id;";
    
            if ($conn->query($sql) === TRUE)
            {
    
                $Result=true;
            }
            else
            {
                $Result=false;
            }
        }
        catch(PDOException $e)
        {
            $Result=false;
        }
    
        $conn->close();
    
    }

    return $Result;
}
//Change Owner End

//-------------------------------------------------------------------------------UPDATE Functions------------------------------------//
//UPDATE























//SEO
//------------------------------------------------------------------------------SEO----------------------------------------------------//
function SITEMAP_GENRATOR()
{

    $Site_Map="<?xml version='1.0' encoding='UTF-8'?><urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>";

    $DATA=SELECT_BY_QUARY("SELECT * FROM contents;","title",1);

    $Title_Array=preg_split("/\~/",$DATA);

    for($i=0;$i<count($Title_Array);$i++)
    {
        $title=preg_replace("/\^/","",$Title_Array[$i]);
        $Site_Map.="<url><loc>http://masom-app.sorapp.ir/$title</loc></url>\r\n";
    }

    $Site_Map.="</urlset>";

    $file=fopen("../Sitemap/sitemap.xml","w");
    fwrite($file,$Site_Map);
    fclose($file);
}
//------------------------------------------------------------------------------SEO----------------------------------------------------//
//SEO













//Block User Start
function BlockUser()
{
    echo "<script> window.document.location.href='../Log-in.php'; </script>";
}
//Block User End








?>