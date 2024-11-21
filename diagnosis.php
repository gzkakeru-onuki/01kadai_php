<?php
// POSTデータの取得
$userId = $_POST["userId"];
$name = $_POST["name"];
$mail = $_POST["mail"];
$age = $_POST["age"];
$genre = $_POST["genre"];
$result = "";

//質問の生成
$array = [
    "PC買うなら、コスパよりデザイン？",
    "スタバでカタカタ、ッターン！！ってしたい？",
    "スマホはiphone?",
    "スティーブジョブスすき？",
    "エンジニアっぽいPC持ちたい？",
    "Windows使うの飽きた？",
    "軽さとパワフルさに惹かれる？",
    "IOSアプリ作成したい？",
    "Appleすき？",
    "りんごすき？"
];

$totalQuestions = count($array); //10
$totalScore = 0;

for ($i = 0; $i < $totalQuestions; $i++) {
    $key = $i . 'question';
    if (isset($_POST[$key])) {
        $totalScore += (int)$_POST[$key];
    }
}

//点数に応じた判定
if ($totalScore >= 16) {
    $result = "Mac向きです！今すぐ買ってください！";
} elseif ($totalScore >= 12 && $totalScore <= 15) {
    $result = "どちらでも大丈夫だと思われます。バランス型ですね。";
} else {
    $result = "迷わずWindowsでいいと思います...";
}

// データを連想配列として保存
$formpost_array = [
    'userId' => $userId,
    'name' => $name,
    'mail' => $mail,
    'age' => $age,
    'genre' => $genre,
    'type' => $result,
];

//ファイル名
$filedir = "diagnosis.json";

// 既存データの読み込みまたは初期化
if (file_exists($filedir)) {
    $existingData = json_decode(file_get_contents($filedir), true);
    if (!is_array($existingData)) {
        //ファイルがからだったら初期化
        $existingData = [];
    }

    //ファイルが存在していなかったら初期化
} else {
    $existingData = [];
}

// 新しいデータを追加
$existingData[] = $formpost_array;

// JSON形式で保存
file_put_contents($filedir, json_encode($existingData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)); //JSONを綺麗に整形して、日本語もエンコードするようにする　しないと、表示されない。。。なぜ？
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/diagnosis.css">
    <title>診断画面</title>
</head>

<body>
    <header class="header">
        <ul class="lists">
            <li class="list-item"><a href="index.php">料理</a></li>
            <li class="list-item"><a href="winmac.php">Win/Mac</a></li>
            <li class="list-item"><a href="keiji.php">掲示板</a></li>
        </ul>
    </header>
    <h1 class="title">診断が完了しました！</h1>
    <div class="result"><a class="result-link" href="scan.php">診断内容を確認する</a></div>

</body>

</html>