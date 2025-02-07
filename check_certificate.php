<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $searchQuery = trim($_POST['userName']);
  $searchQueryLower = mb_strtolower($searchQuery, 'UTF-8');
  $examFile = 'exam.json';
  $found = false;
  if (file_exists($examFile)) {
    $data = file_get_contents($examFile);
    $results = json_decode($data, true);
    foreach ($results as $result) {
      // دریافت نام و فامیل به صورت کوچک
      $fullNameLower = mb_strtolower($result['firstName'] . " " . $result['lastName'], 'UTF-8');
      // اگر ورودی فقط عدد باشد، جستجو براساس کد پیگیری انجام شود
      if (is_numeric($searchQuery)) {
        if ($result['trackingCode'] == $searchQuery) {
          $found = true;
        }
      } else {
        // جستجو براساس نام یا فامیل (case-insensitive)
        if (strpos($fullNameLower, $searchQueryLower) !== false) {
          $found = true;
        }
      }
      
      if ($found) {
        $certificateURL = "certificate.php?firstName=" . urlencode($result['firstName']) .
                          "&lastName=" . urlencode($result['lastName']) .
                          "&examType=" . urlencode($result['examType']) .
                          "&score=" . $result['score'] .
                          "&level=" . urlencode($result['certificateLevel']) .
                          "&trackingCode=" . $result['trackingCode'];
        echo "<!DOCTYPE html>
        <html lang='fa'>
        <head>
          <meta charset='UTF-8'>
          <title>مدرک یافت شد | Mohammad Taha Gorji</title>
          <link rel='stylesheet' href='dark-openai-style.css'>
          <link href='https://rsms.me/inter/inter.css' rel='stylesheet'>
        </head>
        <body>
          <header class='glass-header'>
            <div class='container header-container'>
              <a href='index.php' class='logo'>Mohammad Taha Gorji Bafa</a>
            </div>
          </header>
          <main>
            <section class='container glass-card'>
              <h1>مدرک یافت شد</h1>
              <p>نام: " . htmlspecialchars($result['firstName'] . " " . $result['lastName']) . "</p>
              <p>دوره: " . htmlspecialchars($result['examType']) . "</p>
              <p>نمره: " . $result['score'] . " از 60</p>
              <p>کد پیگیری: " . $result['trackingCode'] . "</p>
              <a href='" . $certificateURL . "' class='button' target='_blank'>نمایش و دانلود مدرک</a>
            </section>
          </main>
          <footer class='footer glass-footer'>
            <div class='container'>
              <p>&copy; 2025 موسسه زبان Mohammad Taha Gorji Bafa. تمامی حقوق محفوظ است.</p>
              <div class='code-credit'>Coded by Mohammad Taha Gorji</div>
            </div>
          </footer>
        </body>
        </html>";
        break;
      }
    }
  }
  if (!$found) {
    echo "<!DOCTYPE html>
    <html lang='fa'>
    <head>
      <meta charset='UTF-8'>
      <title>مدرک یافت نشد | Mohammad Taha Gorji Bafa</title>
      <link rel='stylesheet' href='dark-openai-style.css'>
      <link href='https://rsms.me/inter/inter.css' rel='stylesheet'>
    </head>
    <body>
      <header class='glass-header'>
        <div class='container header-container'>
          <a href='index.php' class='logo'>Mohammad Taha Gorji Bafa</a>
        </div>
      </header>
      <main>
        <section class='container glass-card'>
          <h1>متأسفانه مدرکی یافت نشد</h1>
          <p>لطفاً اطلاعات وارد شده را بررسی کنید.</p>
          <a href='index.php' class='button'>بازگشت به صفحه اصلی</a>
        </section>
      </main>
      <footer class='footer glass-footer'>
        <div class='container'>
          <p>&copy; 2025 موسسه زبان Mohammad Taha Gorji Bafa. تمامی حقوق محفوظ است.</p>
          <div class='code-credit'>Coded by Mohammad Taha Gorji</div>
        </div>
      </footer>
    </body>
    </html>";
  }
} else {
  header("Location: index.php");
}
?>
