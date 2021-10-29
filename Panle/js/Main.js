var Ajax=0;

function Clear()
{



    if(Ajax==1)
    {
        var History = document.getElementById("History_iFrame");
        History.src = "History.php";

        var Profile = document.getElementById("Profile_iFrame");
        Profile.src = "Profile.php";

        var Edit_Data = document.getElementById("Change_Home");
        Edit_Data.src = "Change_Owner_Start.php";

        var New_Home = document.getElementById("New_Home");
        New_Home.src = "New_Home.php";

        Ajax=0;
    }


    var Home=document.getElementById("Panle-Search");
    var Profile=document.getElementById("Panle-Profile");
    var New_House=document.getElementById("Panle-Add-New-Home");
    var Change_House=document.getElementById("Panle-Edit-Home");
    var Search=document.getElementById("Panle-Search");
    var History=document.getElementById("Panle-History");
    var New_User=document.getElementById("Panle-Active-New-User");
    var New_Admin=document.getElementById("Panle-Add-New-Manager");

    var Panles=[Home,Profile,New_House,Change_House,New_User,New_Admin,Search,History];


    for(var i=0;i<Panles.length;i++)
    {
        try
        {
            Panles[i].style.display = "none";
        }
        catch (e)
        {

        }
    }

}







function On_CLICK_History(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }

    document.getElementById("Panle-History").style.display="block";
    Ajax=1;
}



function On_CLICK_Profile(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }
    document.getElementById("Panle-Profile").style.display="block";
    Ajax=1;
}



function On_CLICK_New(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }
    document.getElementById("Panle-Add-New-Home").style.display="block";
    Ajax=1;
}



function On_CLICK_Change(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }
    document.getElementById("Panle-Edit-Home").style.display="block";
    Ajax=1;
}



function On_CLICK_NEW_User(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }
    document.getElementById("Panle-Active-New-User").style.display="block";
}



function On_CLICK_NEW_Admin(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }
    document.getElementById("Panle-Add-New-Manager").style.display="block";
}



function On_CLICK_SEARCH(e)
{
    try
    {
        Clear();
    }
    catch (e)
    {

    }
    document.getElementById("Panle-Search").style.display="block";
}


//Dialog Functions Start//
function Close_Dialog(e)
{
    document.getElementById("Dialogs").style.display="none";
    document.getElementById("Diable-User-Dialog-Context-Inside").src="";
}


function Add_New_Manager(e,Value)
{
    document.getElementById("Dialogs").style.display="block";
    document.getElementById("Diable-User-Dialog-Context-Inside").src="Get_All_Selected_Managers.php?Search="+Value;
}


function Get_A_Disable_User_Func(e,index)
{
    document.getElementById("Dialogs").style.display="block";
    document.getElementById("Diable-User-Dialog-Context-Inside").src="User-Enable-Profile.php?ID="+index;
}


function Get_A_Home_Profile(e,Value)
{
    document.getElementById("Dialogs").style.display="block";
    document.getElementById("Diable-User-Dialog-Context-Inside").src="Search_Result_Home.php?Search="+Value;
}
//Dialog Functions End//