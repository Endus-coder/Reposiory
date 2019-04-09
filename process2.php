<?php

session_start();




$questions =[ 
    [
        'question' => 'Как зовут собаку из простоквашино?',
        'answers' =>['Бобик', 'Робик', 'Шарик', 'Валик', 'Псарик'],
        'valid' => 'A',
        
    ],
    [
        'question' => 'Какой тип таблиц поддерживает транзакцию?',
        'answers' => ['MyIsam', 'Federated', 'Sphinx', 'InnoDb', 'Memory'],
        'valid' => 'B',
        
    ],
    [
        'question' => 'Как зовут поросенка из мультика Винни-Пух?',
        'answers' => ['Хрюша', 'Нюша', 'Пятачек', 'Винни', 'Степаша'],
        'valid' => 'A',
    
    ],   
    [
        'question' => 'Как называется массив со строчными индексами в php?',
        'answers' => ['Одномерный', 'Ассоциативный', 'Двумерный', 'Таких не бывает', 'Неоднородный'],
        'valid' => 'A',
        
    ],
    [
        'question' => 'Протокол передачи данных WEB?',
        'answers' => ['FTP', 'P2P', 'HTTP', 'SSH', 'SQL'],
        'valid' => 'A',
        
    ],       
    
    
    
];

$_SESSION['increment'] = isset($_SESSION['increment']) ? $_SESSION['increment'] : 0;   
$_SESSION['answerUser'] = isset($_SESSION['answerUser']) ? $_SESSION['answerUser'] : [];    





if($_SESSION['increment'] == count($questions)){
    $balls=0;
    foreach($questions as $k =>$val){
        if($questions[$k]['valid']==$_SESSION['answerUser'][$k]){
            $balls++;
            
        }
    }
   
    $textRequest = 'вы набрали ' . $balls . ' баллов' . '<script>$(\'#send\').addClass(\'hiden\');
    $(\'#restart\').removeClass(\'hiden\').addClass(\'block\');</script>'; 
    echo json_encode($textRequest, JSON_UNESCAPED_UNICODE);
    unset($_SESSION['increment']);
    unset($_SESSION['answerUser']);    
$_SESSION['textRequest']=$textRequest;



die();

}




if(isset($_POST['data'])){
    $_SESSION['answerUser'][$_SESSION['increment']]=$_POST['data'];  
    unset($_POST['data']);
    if($_SESSION['increment']!==count($questions)){
        
        $textRequest = $questions[$_SESSION['increment']]['question'] . '<br>' . 'A ' . $questions[$_SESSION['increment']]['answers'][0] . '<br>' . ' B ' . $questions[$_SESSION['increment']]['answers'][1] . '<br>' . ' C ' . $questions[$_SESSION['increment']]['answers'][2] . '<br>' . 'D ' . $questions[$_SESSION['increment']]['answers'][3] . '<br>'. ' E) ' . $questions[$_SESSION['increment']]['answers'][4] . '<br>'. '<br>'. "<input type=\"text\" id = \"bad\"  placeholder = \"Укажите вариант ответа\" name = getAnswer>";
        $_SESSION['increment']++;
        echo json_encode($textRequest, JSON_UNESCAPED_UNICODE);           
    }
   
}elseif(!isset($_POST['data'])){
    $textRequest = $questions[$_SESSION['increment']]['question'] . '<br>' . 'A ' . $questions[$_SESSION['increment']]['answers'][0] . '<br>' . ' B ' . $questions[$_SESSION['increment']]['answers'][1] . '<br>' . 'C ' . $questions[$_SESSION['increment']]['answers'][2] . '<br>' . 'D ' . $questions[$_SESSION['increment']]['answers'][3] . '<br>'. ' E) ' . $questions[$_SESSION['increment']]['answers'][4] . '<br>' . '<br>' . "<input type=\"text\" id = \"bad\"  placeholder = \"Укажите вариант ответа\" name = getAnswer>";
    echo json_encode($textRequest, JSON_UNESCAPED_UNICODE);

}



    





    








       
        
    


    
    










