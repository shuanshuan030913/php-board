<?php

  // 資料庫
  require_once('./conn.php');

  // $nickname
  require_once("./check_login.php");

  if (empty($_POST['context'])) {
    die('沒有輸入留言');
  }

  $context = htmlspecialchars($_POST['context'], ENT_QUOTES, 'utf-8');

  if ($is_login) {
    $stmt = $conn->prepare("INSERT INTO comments (name, context, parents_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nickname, $context, $_POST['parents_id']);
    $stmt->execute();
    $result = 'true';

  } else {
    $result = 'false';
  }
  echo json_encode($result);
?>