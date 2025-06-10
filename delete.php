<?php
//削除機能

require 'config.php';

if (isset($_GET['id'])) 
{
  $id = $_GET['id'];
  $sql = "DELETE FROM diaries WHERE id = ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
}

header("Location: diary.php");
exit();
?>
