<?php

require_once "../faker/vendor/autoload.php";
require_once "db/db.php";

$faker = Faker\Factory::create('ru_RU');
//echo $faker->name.'<br>';
////должность
//echo $faker->date.'<br>';
//echo $faker->numberBetween(15000,200000).'<br>';

ini_set('max_execution_time', 9999999999);

$stmt = $connect->prepare("INSERT INTO `workers` (fio, `position`,date_recruitment,zp) VALUES (:fio, :position ,:date_recruitment ,:zp)");
$stmt->bindParam(':fio', $fio);
$stmt->bindParam(':position', $position);
$stmt->bindParam(':date_recruitment', $date_recruitment);
$stmt->bindParam(':zp', $zp);

//$stmt = $connect->prepare("DELETE FROM `workers`");
//$stmt->execute();


for ($i=0;$i<50000;$i++)
{
    $fio= $faker->name;
    if ($i<=30000)
    {
        $position = "junior";
    } elseif ($i>30000 && $i<=40000)
    {
        $position = "middle";
    } elseif ($i>40000 && $i<=45000)
    {
        $position = "senior";
    }elseif ($i>45000 && $i<=47500)
    {
        $position= "team_lead";
    }elseif ($i>47500)
    {
        $position = "project_manager";
    }
    $date_recruitment = $faker->date;
    $zp = $faker->numberBetween(15000,200000);
    $stmt->execute();

}