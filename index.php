<!-- index.php -->
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>موسسه زبان Mohammad Taha Gorji</title>
  <link rel="stylesheet" href="dark-openai-style.css">
  <script src="dark-openai-script.js" defer></script>
  <!-- بارگذاری فونت Inter -->
  <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
</head>
<body>
  <header class="glass-header">
    <div class="container header-container">
      <a href="index.php" class="logo">Mohammad Taha Gorji</a>
      <nav>
        <ul>
          <li><a href="exam_form.php">شروع امتحان</a></li>
          <li><a href="check_certificate.php">پیگیری مدرک</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <section class="hero">
      <div class="hero-content glass-card">
        <h1>به موسسه زبان Mohammad Taha Gorji خوش آمدید</h1>
        <p>امتحان معتبر و جذاب BAFA </p>
        <p>امتحان هیچگونه هزینه ای ندارد</p>
        <p>در این بخش می توانید آزمون را شروع کنید یا مدارک را پیگیری نمایید</p>
        <div class="hero-buttons">
          <a href="exam_form.php" class="button">شروع امتحان</a>
          <button class="button" onclick="showCertificateModal()">پیگیری مدرک</button>
        </div>
      </div>
    </section>
  </main>
  
  <!-- مدال پیگیری مدرک -->
  <div id="certificateModal" class="modal">
    <div class="modal-content glass-card">
      <span class="close" onclick="closeCertificateModal()">&times;</span>
      <h2>پیگیری مدرک</h2>
      <form id="certificateForm" method="post" action="check_certificate.php">
        <input type="text" name="userName" placeholder="نام کاربری" required>
        <button type="submit" class="button">پیگیری</button>
      </form>
    </div>
  </div>
  
  <footer class="footer glass-footer">
    <div class="container">
      <p>&copy; 2025 موسسه زبان Mohammad Taha Gorji. تمامی حقوق محفوظ است.</p>
      <div class="code-credit">Coded by Mohammad Taha Gorji</div>
    </div>
  </footer>
</body>
</html>
