<?php

include "Header.php";




$Home_Id=$_REQUEST['Home_Id'];





$Result=SELECT_BY_QUARY("SELECT User.Id AS USER_ID,User.Name As USER_Name,User.Family AS USER_Family,User.Phone AS Phone FROM Home INNER JOIN User ON Home.Done_User_Id=User.Id WHERE Home.Id=$Home_Id;","USER_ID~USER_Name~USER_Family~Phone ","0");
$Result=preg_split("/\~/",$Result);




$MerchantID = '354d2a2c-9010-11e9-b02b-000c29344814'; //Required
$Amount = 10000; //Amount will be based on Toman - Required
$Description = 'نام : '.$Result[1]."  نام خانوادگی : ".$Result[2]; // Required
$Mobile = $Result[3]; // Optional
$Home_ID = $Home_Id; // Optional
$CallbackURL = 'localhost/Home%20Startup/Panle/Events/Pay-Check.php'; // Required

$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
    [
        'MerchantID' => $MerchantID,
        'Amount' => $Amount,
        'Description' => $Description,
        'Mobile' => $Mobile,
        'Home_ID'=>$Home_ID,
        'CallbackURL' => $CallbackURL,
    ]
);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100)
{
    Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
}
else
{
    echo'ERR: '.$result->Status;
}


?>