<?php
/**
 * Manager which going to be extended in all managers
 */
class Manager
{
  protected function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=jesite2;charset=utf8', 'user', 'user123#',  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
  }
}
