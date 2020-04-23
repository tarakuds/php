<?php
    function generate_token(){
        $token = "";
        $alphabets = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","A","B","C","D","E","F","G","I","J","K"];
        for($i = 0; $i < 15; $i++){
        
          $index = mt_rand(0,count($alphabets)-1);
          $token .= $alphabets[$index];
        }
        return $token;
    }

    function find_token($mail=""){
        $allUserToken = scandir("db/token/");
    

        $countAllUserToken = count($allUsersToken);
    
        for($counter=0; $counter< $countAllUserToken; $counter++){
            $currentTokenfile=$allUsersToken[$counter];
    
            if($currentTokenfile == $mail.".json"){
                $tokenContent= file_get_contents("db/token/".$currentTokenfile);
    
                $tokenObject = json_decode($tokenContents);
                $tokenFromDB = $tokenObject ->token;
    
                return $tokenObject;
            } 
        }
        return false;
    }
?>