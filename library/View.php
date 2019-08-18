<?php


    class View{

        public function __construct($template,$data,$header='header',$footer='footer'){

            if( !file_exists("mvc/views/".$template."View.php") ){
                die("View $template does not exist.");
            }

            if(is_array($data)){
                extract($data);
            }

            include("mvc/views/".$header."View.php");
            include("mvc/views/".$template."View.php");
            include("mvc/views/".$footer."View.php");


        }

    }

?>
