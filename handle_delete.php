<?php

  // 資料庫
  require_once('./conn.php');

  require_once("./check_login.php");
  require_once("./check_comm_owner.php");

  if ($is_login && $nickname === $membercheck_row['name']) {

    $stmt = $conn->prepare("DELETE FROM comments WHERE `id`=? or `parents_id`=?");
    $stmt->bind_param("ss", $_POST['id'], $_POST['id']);
    $stmt->execute();
    $result = 'true';

  } else {
    $result = 'false';
  }
  echo json_encode($result);
?>