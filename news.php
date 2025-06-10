<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>News & Diary</title>
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
      <span class="navbar-brand">News and Diary</span>
      <a href="diary.php" class="btn btn-outline-light ms-auto">日報</a>
    </div>
  </nav>

 

  <!-- 天気予報 -->
  <div class="info-bar text-center">
    🌤️ 天気予報：雨 20ー24℃
  </div>

   <!-- 日経指数 -->
  <div class="info-card mt-3">
    <h5>📈 日経平均</h5>
    <p>日経平均株価：32,400.15（+1.12%）</p>
  </div>

  <!-- 為替 -->
  <div class="info-card mt-3">
    <h5>💱 為替</h5>
    <p>1 ドル = 144.94 円</p>
  </div>

  <!-- ニュース表示 -->
  <div class="mt-4">
    <div class="blog-post row align-items-center">
      <div class="col-md-5">
        <img src="https://source.unsplash.com/600x400/?nature" alt="例文です！">
      </div>
      <div class="col-md-7">
        <h3>例文です！</h3>
        <p>例文です！</p>
      </div>
    </div>
    <div class="blog-post row align-items-center">
      <div class="col-md-5">
        <img src="https://source.unsplash.com/600x400/?city" alt="例文です！">
      </div>
      <div class="col-md-7">
        <h3>例文です！</h3>
        <p>例文です！</p>
      </div>
    </div>
  </div>

</div>
</body>
</html>
