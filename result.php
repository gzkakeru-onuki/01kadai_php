<?php
$filedir = "data.json";
$json = file_get_contents($filedir);
$dataArray = json_decode($json, true);
$lists = "";
if (is_array($dataArray)) {
    foreach ($dataArray as $item) {
        $lists .= "
        <li style='background-color:whitesmoke; border-radius:8px; margin-bottom:10px; padding:10px; width:500px; list-style:none;'> 
        ユーザーID:" . htmlspecialchars($item["userId"]) . "<br>" .
            "名前:" . htmlspecialchars($item["name"]) . "<br>" .
            "年齢:" . htmlspecialchars($item["age"]) . "<br>" .
            "ジャンル:" . htmlspecialchars($item["genre"]) . "<br>" .
            "料理名:" . htmlspecialchars($item["food"]) .
            "</li>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/result.css">
</head>

<body>
    <header class="header">
        <ul class="lists">
            <li class="list-item"><a href="index.php">料理</a></li>
            <li class="list-item"><a href="winmac.php">Win/Mac</a></li>
            <li class="list-item"><a href="keiji.php">掲示板</a></li>
        </ul>
    </header>
    <ul id="result-list"><?= $lists; ?></ul>
</body>

</html>