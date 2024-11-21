<?php
$content = "";
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
for ($i = 0; $i < count($array); $i++) {
    $content .= '<ul>';
    $content .= '<li style="list-style:none">';
    $content .= '質問' . $i + "1" . ':';
    $content .= $array[$i] . '<br>' . 'はい';
    $content .= '<input type="radio" name="' . $i . 'question" value="2">';
    $content .= 'いいえ';
    $content .= '<input type="radio" name="' . $i . 'question" value="1">';
    $content .= '</li>';
    $content .= '</ul>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/winmac.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header class="header">
        <ul class="lists">
            <li class="list-item"><a href="index.php">料理</a></li>
            <li class="list-item"><a href="winmac.php">Win/Mac</a></li>
            <li class="list-item"><a href="keiji.php">掲示板</a></li>
        </ul>
    </header>
    <h1 class="title">Win? Or Mac?</h1>
    </h1>
    <div class="contact-form">
        <form action="diagnosis.php" method="POST" id="answer">
            <table>
                <tr>
                    <th>ユーザーID：
                    <td class="table-data"><input class="input-form" type="text" name="userId"></td>
                    </th>
                </tr>
                <tr>
                    <th>お名前：
                    <td class="table-data"><input class="input-form" type="text" name="name"></td>
                    </th>
                </tr>
                <tr>
                    <th>メールアドレス：
                    <td class="table-data"><input class="input-form" type="text" name="mail"></td>
                    </th>
                </tr>
                <tr>
                    <th>年齢：
                    <td class="table-data">
                        <select class="input-form" name="age" id="">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="60">60</option>
                        </select></th>
                </tr>
                <tr>
                    <th>職業：
                    <td class="table-data">
                        <select class="input-form" name="genre" id="">
                            <option value="" disabled selected>職業を選択してください</option>
                            <option value="会社員">会社員</option>
                            <option value="社長">社長</option>
                            <option value="飲食店">飲食店</option>
                            <option value="医師">医師</option>
                            <option value="看護師">看護師</option>
                            <option value="エンジニア">エンジニア</option>
                            <option value="デザイナー">デザイナー</option>
                            <option value="教師">教師</option>
                            <option value="公務員">公務員</option>
                            <option value="学生">学生</option>
                            <option value="フリーランス">フリーランス</option>
                            <option value="主婦/主夫">主婦/主夫</option>
                            <option value="農家">農家</option>
                            <option value="漁師">漁師</option>
                            <option value="自営業">自営業</option>
                            <option value="無職">無職</option>
                        </select>
                    </td>
                    </th>
                </tr>
            </table>
            <label id="submitBtn">診断開始</label><br>
            <div class="toggleContent" style="display: none;">
                <?= $content; ?>
                <input type="submit" id="postBtn">
            </div>
            
        </form>
        </main>
        <script>
            $("#submitBtn").on("click", function() {
                $(".toggleContent").slideToggle(500);
                if ($(this).text() === "診断開始") {
                    $(this).text("閉じる");
                } else {
                    $(this).text("診断開始");
                }
            });
        </script>
</body>

</html>