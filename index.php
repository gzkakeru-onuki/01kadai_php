<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="header">
        <ul class="lists">
            <li class="list-item"><a href="index.php">料理</a></li>
            <li class="list-item"><a href="winmac.php">Win/Mac</a></li>
            <li class="list-item"><a href="keiji.php">掲示板</a></li>
        </ul>
    </header>
    <div class="container">
    <h1 class="title">好きな料理を教えてください</h1>
    <div class="contact-form">
        <form action="post.php" method="POST" id="answer">
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
                    <th>ジャンル：
                    <td class="table-data">
                        <select class="input-form" name="genre" id="">
                            <option value="日本料理">日本料理</option>
                            <option value="中華料理">中華料理</option>
                            <option value="イタリアン">イタリアン</option>
                            <option value="フレンチ">フレンチ</option>
                            <option value="タイ料理">タイ料理</option>
                        </select>
                    </td>
                    </th>
                </tr>
                <tr>
                    <th>料理：
                    <td class="table-data"><input class="input-form" type="text" name="food"></td>
                    </th>
                </tr>
            </table>
            <input type="submit" id="submitBtn">
        </form>
        </div>
</body>

</html>