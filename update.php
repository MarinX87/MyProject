<?php
//更新機能

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $id = $_POST['id'];
  $content = trim($_POST['content']);

  if ($id && $content) 
  {
    $sql  = "UPDATE diaries SET content = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$content, $id]);
  }
}

header("Location: diary.php");
exit();
?>
