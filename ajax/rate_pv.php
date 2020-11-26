<?
    include('../home/config.php');
    $idco = getValue('idco','int','POST',0);
    $feelValue = getValue('feelValue','int','POST',0);
    $position = getValue('position','str','POST','');
    $description = getValue('description','str','POST','');
    $question = getValue('question','str','POST','');
    $answer = getValue('answer','str','POST','');
    $time = time();
    if($idco != 0 && $feelValue != 0 && $position != '' && $description != '' && $question != '' && $answer != ''){
        $data = [
            'usc_id' => $idco,
            'feel' => $feelValue,
            'position' => $position,
            'description' => $description,
            'questions' => $question,
            'answers' => $answer,
            'rate_time' => $time,
        ];
        add('tbl_rate_interview',$data);
        echo '1';
    }
?>