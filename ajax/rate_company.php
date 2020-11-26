<?
    include('../home/config.php');

    $id = getValue('id','int','POST',0);
    $countStar = getValue('countStar','int','POST',0);
    $staff = getValue('staff','int','POST',0);
    $rate_com = getValue('rate_com','str','POST','');
    $strong = getValue('strong','str','POST','');
    $weakness = getValue('weakness','str','POST','');
    $help_com = getValue('help_com','str','POST','');
    $advice = getValue('advice','str','POST','');
    $culture_company = getValue('culture_company','int','POST',0);
    $welfare = getValue('welfare','int','POST',0);
    $boss = getValue('boss','int','POST',0);
    $office = getValue('office','int','POST',0);
    $promotion_opportunities = getValue('promotion_opportunities','int','POST',0);
    $recommend = getValue('recommend','int','POST',0);
    $work_environment = getValue('work_environment','int','POST',0);
    $forBoss = getValue('forBoss','int','POST',0);
    $time = time();
    if($rate_com != '' && $strong != '' && $weakness != ''){
        $data = [
            'usc_id'                    => $id,
            'countStar'                 => $countStar,
            'staff'                     => $staff,
            'rate_com'                  => $rate_com,
            'strong'                    => $strong,
            'weakness'                  => $weakness,
            'help_com'                  => $help_com,
            'advice'                    => $advice,
            'culture_company'           => $culture_company,
            'welfare'                   => $welfare,
            'boss'                      => $boss,
            'office'                    => $office,
            'promotion_opportunities'   => $promotion_opportunities,
            'recommend'                 => $recommend,
            'work_environment'          => $work_environment,
            'forBoss'                   => $forBoss,
            'rate_time'                 => $time
        ];
        add('tbl_rate_company',$data);
        echo '1';
    }
?>