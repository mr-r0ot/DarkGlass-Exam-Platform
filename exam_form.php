<!-- exam_form.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>شروع امتحان | Mohammad Taha Gorji</title>
  <link rel="stylesheet" href="dark-openai-style.css">
  <script src="dark-openai-script.js" defer></script>
  <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
</head>
<body>
  <header class="glass-header">
    <div class="container header-container">
      <a href="index.php" class="logo">Mohammad Taha Gorji</a>
      <nav>
        <ul>
          <li><a href="index.php">صفحه اصلی</a></li>
          <li><a href="check_certificate.php">پیگیری مدرک</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section class="container form-section glass-card">
      <h1>شروع امتحان</h1>
      <form id="examDetailsForm" action="exam_warning.php" method="post">
        <label for="examType">نوع آزمون:</label>
        <select name="examType" style="color:#222222" id="examType" required onchange="changeLanguage()">
          <option value="">انتخاب کنید</option>
          <option value="english">زبان انگلیسی</option>
          <option value="german">زبان آلمانی</option>
          <option value="french">زبان فرانسوی</option>
          <option value="spanish">زبان اسپانیایی</option>
          <option value="chortake">آزمون چرتکه</option>
          <option value="computer">آزمون کامپیوتر</option>
        </select>
        <label for="firstName">نام:</label>
        <input type="text" name="firstName" id="firstName" placeholder="نام" required>
        <label for="lastName">نام خانوادگی:</label>
        <input type="text" name="lastName" id="lastName" placeholder="نام خانوادگی" required>
        <label for="age">سن:</label>
        <input type="number" name="age" id="age" placeholder="سن" required>
        <label for="job">شغل:</label>
        <input type="text" name="job" id="job" placeholder="شغل" required>
        <label for="education">سطح تحصیلات:</label>
        <input type="text" name="education" id="education" placeholder="سطح تحصیلات" required>
        <label for="motivation">انگیزه از امتحان دادن:</label>
        <textarea name="motivation" id="motivation" placeholder="انگیزه" required></textarea>
        <button type="submit" class="button">ادامه</button>
      </form>
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
