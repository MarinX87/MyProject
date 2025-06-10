<?php
//日報機能

require 'config.php';

//検索機能
$keyword = $_GET['q'] ?? '';
if ($keyword) 
{
  $sql  = "SELECT * FROM diaries WHERE content LIKE ? ORDER BY id DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['%' . $keyword . '%']);
  $entries = $stmt->fetchAll();
} 
else 
{
  $entries = $pdo->query("SELECT * FROM diaries ORDER BY id DESC")->fetchAll();
}

//コメント機能
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $content = trim($_POST['content']);
  if ($content) 
  {
    $sql = "INSERT INTO diaries (content) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$content]);
    header("Location: diary.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Diary</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .navbar-brand { font-size: 2rem; font-weight: bold; letter-spacing: 2px; }
    .info-bar, .info-card 
    {
      background: linear-gradient(to right, #6dd5fa, #2980b9);
      color: white; padding: 0.75rem 1rem; border-radius: 0.5rem;
      margin-top: 1rem;
    }
    .info-card 
    {
      background: white; color: black; border-left: 5px solid #198754;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }
    .blog-post img { max-width: 100%; border-radius: 8px; }
    .blog-post 
    {
      background: white; border-radius: 0.5rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      padding: 1rem; margin-bottom: 1.5rem;
    }
  </style>
</head>
<body>

<!--タイトル 文字-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Diary</span>
    <a href="news.php" class="btn btn-outline-light ms-auto">News</a>
  </div>
</nav>

<!--検索機能-->
  <form method="get" class="mb-4">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="何探したい..." value="<?= htmlspecialchars($keyword) ?>">
      <button class="btn btn-outline-secondary" type="submit">検索</button>
    </div>
  </form>

<!--コメント機能-->
  <?php if ($keyword): ?>
    <p class="text-muted">🔍 キーワード： “<strong><?= htmlspecialchars($keyword) ?></strong>”の結果は：</p>
  <?php endif; ?>

  <?php if (!$keyword): ?>
  <form method="post" class="mb-4">
    <textarea class="form-control mb-2" name="content" rows="3" placeholder="メモ・日報を書いてください..."></textarea>
    <button class="btn btn-primary">提出</button>
  </form>
  <?php endif; ?>

<!--コメント表示-->
  <?php foreach ($entries as $entry): ?>
    <form action="update.php" method="post" class="border rounded p-3 mb-3 bg-white shadow-sm">
      <input type="hidden" name="id" value="<?= $entry['id'] ?>">
      <textarea name="content" rows="3" class="form-control mb-2"><?= htmlspecialchars($entry['content']) ?></textarea>
      <div class="d-flex justify-content-between">
        <small class="text-muted">時間：<?= $entry['created_at'] ?></small>
        <div>
          <button class="btn btn-success btn-sm">更新</button>
          <a href="delete.php?id=<?= $entry['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('削除しますか？');">削除</a>
        </div>
      </div>
    </form>
  <?php endforeach; ?>
</div>
</body>
</html>
