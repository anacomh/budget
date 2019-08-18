<?php

    //Autoload classes
    spl_autoload_register(function($class_name){

        //Check for class file in library folder
        if(file_exists('library/'.$class_name.'.php')){

            include('library/'.$class_name.'.php');

        //Check for class file in controllers folder
        }else if(file_exists('mvc/controllers/'.$class_name.'.php')){

            include('mvc/controllers/'.$class_name.'.php');


        //Check for class file in modeles folder
        }else if(file_exists('mvc/models/'.$class_name.'.php')){

            include('mvc/models/'.$class_name.'.php');

        //Stop application and throw error
        }else{

            die('Class '.$class_name.' does not exist.');

        }

    });

 ?>
