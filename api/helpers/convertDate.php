<?php

function convertDate($dateTime) {
    // Преобразуем строку даты в объект DateTime
    $date = new DateTime($dateTime);
    // Форматируем дату в нужный формат
    return $date->format('d.m.y H:i');
}
?>