<!-- exam_warning.php -->
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['examDetails'] = $_POST;
} else {
  header("Location: exam_form.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>هشدار | Mohammad Taha Gorji</title>
  <link rel="stylesheet" href="dark-openai-style.css">
  <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
  <script>
    function agreeAndStart() {
      window.location.href = 'exam.php';
    }
  </script>
</head>
<body>
  <header class="glass-header">
    <div class="container header-container">
      <a href="index.php" class="logo">Mohammad Taha Gorji</a>
    </div>
  </header>
  <main>
    <section class="container warning-section glass-card">
      <h1>هشدار</h1>
      <p>در صورتی که مرورگر را ترک کنید یا تلاش به تقلب داشته باشید، نمره شما صفر خواهد شد.<br>
      در صورت اتمام زمان، تنها پاسخ‌های داده شده امتیاز خواهند داشت.</p>
      <button class="button" onclick="agreeAndStart()">موفق می‌کنم</button>
    </section>
  </main>
  <footer class="footer glass-footer">
    <div class="container">
      <p>&copy; 2025 موسسه زبان Mohammad Taha Gorji. تمامی حقوق محفوظ است.</p>
      <div class="code-credit">Coded by Mohammad Taha Gorji</div>
    </div>
  </footer>
</body>
</html>
