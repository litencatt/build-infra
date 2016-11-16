<?php

$link = mysqli_connect('localhost', 'root', 'password');
if (!$link) {
    die("データベースに接続できません:" . mysql_error());
}
$errors = array();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = null;
    if(!isset($_POST['name']) || !strlen($_POST['name'])) {
        $errors['name'] = 'Please input name.';
    }else if (strlen($_POST['name']) > 40 ){
        $errors['name'] = 'Please input name under 40 chars.';
    }else {
        $name = $_POST['name'];
    }

    if(!isset($_POST['name']) || !strlen($_POST['name'])) {
        $errors['comment'] = 'Please input one phrase.';
    } else if (strlen($_POST['comment']) > 200 ) {
        $errors['comment'] = 'Please input one phrase.';
    } else {
        $comment = $_POST['comment'];
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO `post' (`name`, `comment`, `created_at`) VALUES('"
            .mysql_real_escape_string($name) . "','"
            .mysql_real_escape_string($comment) . "','"
            .date('Y-m-d H:i:s') . "')";
        mysqli_query($sql, $link);
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1 -transitional.dtd">
<html>
<head>
  <title>ひとこと掲示板</title>
</head>
<body>
  <h1>ひとこと掲示板</h1>
  <form action="bbs.php" method="post">
    名前：<input type="text" name="name" /><br />
    一言：<input type="text" name="comment" size="60" /><br />
  <input type="submit" name="submit" value="送信" />
  </form>
</body>
</html>
