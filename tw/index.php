<?php
require_once "db/db.php";
require_once "workers/junior.php";
require_once "workers/middle.php";
require_once "workers/senior.php";
require_once "workers/team_lead.php";
require_once "workers/project_manager.php";
$workers = $connect->query("SELECT * FROM `workers`");
$workers = $workers->fetchAll(PDO::FETCH_ASSOC);

$juniors = array();
$middles = array();
$seniors = array();
$team_leads = array();
$prs = array();

foreach ($workers as $worker)
{
switch ($worker['position'])
{
case "junior":
   $new_jun = new junior($worker['id'],$worker['fio'],$worker['date_recruitment'],$worker['zp']);
   array_push($juniors,$new_jun);
   break;
case "middle":
   $new_mid = new middle($worker['id'],$worker['fio'],$worker['date_recruitment'],$worker['zp']);
   array_push($middles,$new_mid);
   break;
case "senior":
   $new_sen = new senior($worker['id'],$worker['fio'],$worker['date_recruitment'],$worker['zp']);
   array_push($seniors,$new_sen);
   break;
case "team_lead":
   $new_lead = new team_lead($worker['id'],$worker['fio'],$worker['date_recruitment'],$worker['zp']);
   array_push($team_leads,$new_lead);
   break;
case "project_manager":
   $new_pm = new project_manager($worker['id'],$worker['fio'],$worker['date_recruitment'],$worker['zp']);
   array_push($prs,$new_pm);
   break;
}
}

    $tree = project_manager::getTree($juniors,$middles,$seniors,$team_leads,$prs);
    project_manager::printTree($tree);



