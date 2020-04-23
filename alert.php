<?php

     function set_alert($type = "message", $content = ""){
            switch($type){
               case "message":
                     $_SESSION['message']=$content;
                 break;
                 case "error":
                     $_SESSION['error']=$content;
                 break;
                 case "info":
                     $_SESSION['info']=$content;
                 break;
                 default:
                 $_SESSION['message'] = $content;
            break;
           }
     }

     //calling out all the functions together
     function print_alert(){
        $type = ['message','info','error'];
        //making the colours dynamic and specific to th kind of message displayed
        $color = ['green', 'grey', 'red'];
        for($i=0; $i< count($type); $i++){
            if(isset($_SESSION[$type[$i]]) && !empty($_SESSION[$type[$i]])){
                echo "<span style='color:".$color[$i]."'>".$_SESSION[$type[$i]]."</span>";
                session_destroy();
            } 
        }
        
    }

   
?>