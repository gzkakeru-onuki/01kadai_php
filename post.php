<?php
// POSTデータの取得
$userId = $_POST["userId"];
$name = $_POST["name"];
$mail = $_POST["mail"];
$age = $_POST["age"];
$genre = $_POST["genre"];
$food = $_POST["food"];

// データを連想配列として保存
$formpost_array = [
    'userId' => $userId,
    'name' => $name,
    'mail' => $mail, 
    'age' => $age,
    'genre' => $genre,
    'food' => $food
];

$filedir = "data.json";

// 既存データの読み込みまたは初期化
if (file_exists($filedir)) {
    $existingData = json_decode(file_get_contents($filedir), true);
    if (!is_array($existingData)) {
        $existingData = [];
    }
//ファイルが存在していなかったら初期化
} else {
    $existingData = [];
}

// 新しいデータを追加
$existingData[] = $formpost_array;

// JSON形式で保存
file_put_contents($filedir, json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));//JSONを綺麗に整形して、日本語もエンコードするようにする　しないと、表示されない。。。なぜ？
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/diagnosis.css">
    <title>送信後画面</title>
</head>echo "# 01kadai_php" >> README.md

<body>
<header class="header">
        <ul class="lists">
            <li class="list-item"><a href="index.php">料理</a></li>
            <li class="list-item"><a href="winmac.php">Win/Mac</a></li>
            <li class="list-item"><a href="keiji.php">掲示板</a></li>
        </ul>
    </header>
    <h1 class="title">情報が登録されました。</h1>
    <div class="result"><a class="result-link" href="result.php">詳細を表示</a></div>
</body>

</html>