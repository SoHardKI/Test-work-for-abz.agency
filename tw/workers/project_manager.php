<?php

class project_manager
{
    public $id;
    public $fio;
    public $date_recruitment;
    public $zp;
    public $team_leads = array();

    public function __construct($id,$fio,$date_recruitment,$zp)
    {
        $this->id = $id;
        $this->fio = $fio;
        $this->date_recruitment = $date_recruitment;
        $this->zp = $zp;


    }

    public static function getTree($juniors,$middles,$seniors,$team_leads,$prs)
    {
        for($i=0;$i<count($juniors);++$i)
        {
            for($j=0;$j<count($middles);++$j)
            {
                if($juniors[$i]->parent_id == $middles[$j]->id)
                {
                    array_push($middles[$j]->juniors,$juniors[$i]);
                    break;
                }
            }
        }

        for($i=0;$i<count($middles);++$i)
        {
            for($j=0;$j<count($seniors);++$j)
            {
                if($middles[$i]->parent_id == $seniors[$j]->id)
                {
                    array_push($seniors[$j]->middles,$middles[$i]);
                    break;
                }
            }
        }

        for($i=0;$i<count($seniors);++$i)
        {
            for($j=0;$j<count($team_leads);++$j)
            {
                if($seniors[$i]->parent_id == $team_leads[$j]->id)
                {
                    array_push($team_leads[$j]->seniors,$seniors[$i]);
                    break;
                }
            }
        }

        for($i=0;$i<count($team_leads);++$i)
        {
            for($j=0;$j<count($prs);++$j)
            {
                if($team_leads[$i]->parent_id == $prs[$j]->id)
                {
                    array_push($prs[$j]->team_leads,$team_leads[$i]);
                    break;
                }
            }
        }



//        for($j=0;$j<count($juniors);++$j)
//        {
//            for ($i=0;$i<count($middles);++$i)
//            {
//                array_push($middles[$i]->juniors,$juniors[$j]);
//                $j++;
//                if($j == count($juniors)) break;
//
//            }
//        }

//        for($j=0;$j<count($middles);++$j)
//        {
//            for ($i=0;$i<count($seniors);++$i)
//            {
//                array_push($seniors[$i]->middles,$middles[$j]);
//                $j++;
//                if($j == count($middles)) break;
//
//            }
//        }
//
//        for($j=0;$j<count($seniors);++$j)
//        {
//            for ($i=0;$i<count($team_leads);++$i)
//            {
//                array_push($team_leads[$i]->seniors,$seniors[$j]);
//                $j++;
//                if($j == count($seniors)) break;
//
//            }
//        }
//
//        for($j=0;$j<count($team_leads);++$j)
//        {
//            for ($i=0;$i<count($prs);++$i)
//            {
//                array_push($prs[$i]->team_leads,$team_leads[$j]);
//                $j++;
//                if($j == count($team_leads)) break;
//
//            }
//        }

        return $prs;
    }

    public static function printTree($tree)
    {
        echo '<ul>';
        for($i=0;$i<count($tree);++$i)
        {
            echo  '<li>';
            echo   " Должность: ";
            echo get_class($tree[$i]) . '<br>';
            echo "ФИО: ";
            echo $tree[$i]->fio. '<br>';
            echo "Дата приёма на работу: ";
            echo $tree[$i]->date_recruitment . '<br>';
            echo "Зарплата: ";
            echo $tree[$i]->zp;
            echo '</li>';

            echo '<ul>';
            for($j=0;$j<count($tree[$i]->team_leads);++$j)
            {
                echo  '<li>' ;
                echo " Должность: ";
                echo get_class($tree[$i]->team_leads[$j]) . '<br>';
                echo "ФИО: ";
                echo $tree[$i]->team_leads[$j]->fio . '<br>';
                echo "Дата приёма на работу: ";
                echo $tree[$i]->team_leads[$j]->date_recruitment . '<br>';
                echo "Зарплата: ";
                echo $tree[$i]->team_leads[$j]->zp;
                echo '</li>';

                echo '<ul>';
                for($h=0;$h<count($tree[$i]->team_leads[$j]->seniors);++$h)
                {
                    echo  '<li>' ;
                    echo " Должность: ";
                    echo get_class($tree[$i]->team_leads[$j]->seniors[$h]) . '<br>';
                    echo "ФИО: ";
                    echo $tree[$i]->team_leads[$j]->seniors[$h]->fio . '<br>';
                    echo "Дата приёма на работу: ";
                    echo $tree[$i]->team_leads[$j]->seniors[$h]->date_recruitment . '<br>';
                    echo "Зарплата: ";
                    echo $tree[$i]->team_leads[$j]->seniors[$h]->zp;
                    echo '</li>';

                    echo '<ul>';
                    for ($k=0;$k<count($tree[$i]->team_leads[$j]->seniors[$h]->middles);++$k)
                    {
                        echo  '<li>' ;
                        echo " Должность: ";
                        echo get_class($tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]) . '<br>';
                        echo "ФИО: ";
                        echo $tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->fio . '<br>';
                        echo "Дата приёма на работу: ";
                        echo $tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->date_recruitment . '<br>';
                        echo "Зарплата: ";
                        echo $tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->zp;
                        echo '</li>';

                        echo '<ul>';
                        for($l=0;$l<count($tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->juniors);++$l)
                        {
                            echo  '<li>' ;
                            echo " Должность: ";
                            echo get_class($tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->juniors[$l]) . '<br>';
                            echo "ФИО: ";
                            echo $tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->juniors[$l]->fio . '<br>';
                            echo "Дата приёма на работу: ";
                            echo $tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->juniors[$l]->date_recruitment . '<br>';
                            echo "Зарплата: ";
                            echo $tree[$i]->team_leads[$j]->seniors[$h]->middles[$k]->juniors[$l]->zp;
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    echo '</ul>';
                }
                echo '</ul>';
            }
            echo '</ul>';
        }
        echo '</ul>';
    }

}

?>
