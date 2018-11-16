<?php
define('API_KEY',"790807199:AAGR3Et95ozlDf2JHY1yD3w6_hPbWGMeM_M"); 

// تابع اصلی برای ارسال پیام در ربات
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot";
    $url .= API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,TRUE);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,  http_build_query($datas));
    $res = curl_exec($ch);
    $iserror =curl_error($ch);
    curl_close($ch);
    if($iserror){
        return false;
    }else{
        return true;
    }    
}
//----######------
//---------
$update = json_decode(file_get_contents('php://input'));
// گرفتن آیدی چت برای ارسال پیام متنی
$chat_id ="111898212";
// برای مشخص کردن پیام از طرف گروه اومده یا کاربر
$type = "private";
$update="hi";
// با این تابع هم می توانیدپیام ارسال کنید به 
//دلایل امنیتی از تابع بات استفاده کنید
file_get_contents("https://api.telegram.org/bot".API_KEY."/sendMessage?chat_id=".$chat_id."&text=hi");

bot('sendMessage',
   ['chat_id'=>$chat_id,
    'text'=>"این یک پیام متنی است"
   ]);

if($type == "private")
{
    // اگر کاربر باشد
    bot('sendMessage',
     ['chat_id'=>$chat_id,
      'text'=>"این یک متن برای کاربر هست"
     ]);
}
elseif($type == "group")
{
    // اگر گروه باشد
    bot('sendMessage',
    ['chat_id'=>$chat_id, 
     'text'=>"این یک متن برای گروه هست"
    ]);
}


?>