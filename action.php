<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["TYPE"] == "feedback") {
    // Получаем данные из формы
    $title = $_POST["TITLE"]; 
    $name = $_POST["NAME"];
    $phone = $_POST["PHONE"];
    $page = $_POST["PAGE"];
  $email = $_POST["EMAIL"];
  $comment = $_POST["COMMENT"];
	
  $ip = $_SERVER["REMOTE_ADDR"];

    $queryUrl = 'https://maridiz.bitrix24.ru/rest/100/2s51lutqypblekbx/crm.lead.add.json';
    // Формируем параметры для создания лида в переменной $queryData
    $queryData = [
        'fields' => [
            'TITLE' => $title,
            'NAME' => $name,
            'SOURCE_ID' => 'WEB',
            'PHONE' => [['VALUE' => $phone, 'VALUE_TYPE' => 'WORK']],
     		 "EMAIL" => [['VALUE' => $email, 'VALUE_TYPE' => 'WORK']],
            'COMMENTS' => $comment,
            'ASSIGNED_BY_ID' => 9,
      		'UTM_SOURCE' => $_POST["UTM_SOURCE"],
			'UTM_MEDIUM' => $_POST["UTM_MEDIUM"],
			'UTM_CAMPAIGN' => $_POST["UTM_CAMPAIGN"],
			'UTM_TERM' => $_POST["UTM_TERM"],
			'UTM_CONTENT' => $_POST["UTM_CONTENT"],
        ],
        'params' => ['REGISTER_SONET_EVENT' => 'Y'], // уведомить о лиде
    ];
    // Обращаемся к Битрикс24 при помощи функции curl_exec
    $curl = curl_init($queryUrl);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($queryData));
    curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 5);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_MAXREDIRS, 5);

    $response = curl_exec($curl);
    $error = curl_error($curl);
    $response_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    curl_close($curl);

    $fileContent = $response;
    $filePath = "response.txt";
    file_put_contents($filePath, $fileContent);

    if ($error) {
        error_log("cURL error: $error");
    } elseif ($response_code != 201) {
        error_log("cURL error: HTTP $response_code");
    }


    // Tg Send

    $token = "1361280197:AAE27RG92C3E8HhC4Yc0-_MHXEpxGWwnKZA";
    $text = "<b>$title</b>\n$name\n$phone\n$comment";
    $getQuery = array(
        "chat_id" 	=> "-4143263217",
        "text"  	=> $text,
        "parse_mode" => "html"
    );
    $ch = curl_init("https://api.telegram.org/bot". $token ."/sendMessage?" . http_build_query($getQuery));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $resultQuery = curl_exec($ch);
    curl_close($ch);
}

$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
exit();
?>