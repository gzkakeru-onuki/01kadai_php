<?php
$dataFile = "bbs.dat";
$newData = "";

//CSRF対策

session_start();

function setToken()
{
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION["token"] = $token;
}

function checkToken()
{
    if (empty($_SESSION["token"]) || ($_SESSION["token"] != $_POST["token"])) {
        echo "不正なPOSTが行われました!";
        exit;
    }
}

//XSS
function h($s)
{
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

if (
    $_SERVER['REQUEST_METHOD'] == "POST" &&
    isset($_POST["message"]) &&
    isset($_POST["user"])


) {
    checkToken();
    $message = $_POST["message"];
    $user = $_POST["user"];
    $uid =$_SESSION["uid"];

    $message = str_replace("\t", ' ', $message);
    $user = str_replace("\t", ' ', $user);

    $postedAt = date("Y-m-d H:i:s");

    if ($message !== "") {
        $user = ($user === "") ? "なな氏さん@お腹いっぱい" : $user;

        $newData = $message . "\t" . $user . "\t" . $postedAt . "\n";

        file_put_contents($dataFile, $newData, FILE_APPEND); //fileappendは末尾に追記するようにするオプション
    }
} else {
    setToken();
}

$posts = file($dataFile, FILE_IGNORE_NEW_LINES); //最後の改行を取り去ってくれる
$posts = array_reverse($posts);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板アプリ</title>
    <link rel="stylesheet" href="css/keiji.css">
</head>

<body>
    <header class="header">
        <ul class="lists">
            <li class="list-item"><a href="index.php">料理</a></li>
            <li class="list-item"><a href="winmac.php">Win/Mac</a></li>
            <li class="list-item"><a href="keiji.php">掲示板</a></li>
        </ul>
    </header>
    <h1>2<span style="font-size:5px; color:red;">キ</span>ちゃんねる</h1>
    <form action="" method="post">
        <input type="text" name="message" placeholder="投稿内容"><br>
        <input type="text" name="user" placeholder="ユーザー名"><br>
        <input type="submit" value="投稿する">
        <input type="hidden" name="token" value="<?= h($_SESSION["token"]); ?>">
    </form>
    <h2>投稿一覧(<?= count($posts); ?>件)</h2>
    <ul>
        <?php if (count($posts)) : ?>
            <?php foreach ($posts as $post) : ?>
                <?php list($message, $user, $postedAt) = explode("\t", $post); ?>
                <li style="list-style: none; border-bottom:1px solid slategray;"><?= h($user); ?><br><?= h($postedAt); ?><br><?= h($message); ?></li><br>
            <?php endforeach; ?>
        <?php else : ?>
            <li>まだ投稿はありません</li>
        <?php endif; ?>
    </ul>
</body>

</html>