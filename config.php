<?php

/// Alle informatie die nodig is voor het inloggen in de database en die word doorgegeven aan de server
/// Gegevens worden bewaard in de main sub directory omdat deze puliek bereikbaar is voor de applicatie maar niet makelijk te bereiken is voor buitenstaanders of hackers.


$user = 'Cursist7';
$databaseName = 'Cursist7';
// anders Tania, hier geven we ook de databasenaam mee
$host = "mysql:host=164.132.193.60:3306;dbname=$databaseName";
$password = 'Cursist_CLRMY6VO7';
$options = array(
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );