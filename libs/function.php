<?php
 /**
 * Created by PhpStorm.
 * User: Luiz Mário
 * Date: 18/07/2015
 * Time: 18:33
 */

    function tString($string){
        return  addslashes(htmlentities(utf8_decode(trim($string))));
    }