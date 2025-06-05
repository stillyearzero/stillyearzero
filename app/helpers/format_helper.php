<?php

function getFormattedDate($date){

    $newDate = date_create($date);
    $formattedDate = date_format($newDate, "Y-m-d");

    return $formattedDate;
}

function getFormatedText($text){
    return nl2br($text);
}

function getFormattedShortText($text){
    $formattedText = nl2br($text);

    if (strlen($formattedText) > 50) {
        return trim(substr($formattedText, 0, 100)) . "... Read more";
    } 
    
    return $formattedText;
}