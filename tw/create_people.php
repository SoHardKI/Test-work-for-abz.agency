<?php

require_once "../faker/vendor/autoload.php";
require_once "db/db.php";

$faker = Faker\Factory::create('ru_RU');
ini_set('max_execution_time', 9999999999);

$stmt = $connect->prepare("INSERT INTO `workers` (`id`, fio, `position`, parent_id, date_recruitment, zp) VALUES (:id, :fio, :position , :parent_id,:date_recruitment ,:zp)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':fio', $fio);
$stmt->bindParam(':position', $position);
$stmt->bindParam(':parent_id', $parent_id);
$stmt->bindParam(':date_recruitment', $date_recruitment);
$stmt->bindParam(':zp', $zp);

for($i=0;$i<50000;$i++)
{
    $id = $i;
    $fio= $faker->name;
    if($i<=2500)
    {
        $position = "project_manager";
        $parent_id = 0;
    } elseif ($i>2500 && $i<=5000)
    {
        $position= "team_lead";
        $parent_id = $faker->numberBetween(0,2500);
    } elseif ($i>5000 && $i <= 10000)
    {
        $position = "senior";
        $parent_id = $faker->numberBetween(2500,5000);
    } elseif ($i>10000 && $i<= 20000)
    {
        $position = "middle";
        $parent_id = $faker->numberBetween(5000,10000);

    } elseif ($i >20000)
    {
        $position = "junior";
        $parent_id = $faker->numberBetween(10000,20000);
    }
    $date_recruitment = $faker->date;
    $zp = $faker->numberBetween(15000,200000);
    $stmt->execute();
}
