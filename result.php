<?php
session_start();
if (!isset($_SESSION['examDetails'])) {
  header("Location: exam_form.php");
  exit;
}
$examDetails = $_SESSION['examDetails'];
$score = isset($_POST['score']) ? $_POST['score'] : 0;
$answers = isset($_POST['answers']) ? json_decode($_POST['answers'], true) : [];

// تعیین سطح مدرک بر اساس نمره
$certificateLevel = "";
if ($score > 30) {
  if ($score > 45) {
    $certificateLevel = "پیشرفته";
  } else {
    $certificateLevel = "متوسط";
  }
}

// تولید کد پیگیری تصادفی (حداقل 5 رقمی)
$trackingCode = rand(10000, 99999);

// ساخت آرایه نتیجه
$result = [
  'firstName'    => $examDetails['firstName'],
  'lastName'     => $examDetails['lastName'],
  'age'          => $examDetails['age'],
  'job'          => $examDetails['job'],
  'education'    => $examDetails['education'],
  'motivation'   => $examDetails['motivation'],
  'examType'     => $examDetails['examType'],
  'score'        => $score,
  'certificateLevel' => $certificateLevel,
  'trackingCode' => $trackingCode,
  'answers'      => $answers,
  'timestamp'    => date('Y-m-d H:i:s')
];

$examFile = 'exam.json';
if (file_exists($examFile)) {
  $jsonData = file_get_contents($examFile);
  $examResults = json_decode($jsonData, true);
  if (!is_array($examResults)) {
    $examResults = [];
  }
} else {
  $examResults = [];
}
$examResults[] = $result;
file_put_contents($examFile, json_encode($examResults, JSON_PRETTY_PRINT));

// ساخت URL مدرک، ارسال پارامتر trackingCode نیز
$certUrl = "certificate.php?firstName=" . urlencode($examDetails['firstName']) .
           "&lastName=" . urlencode($examDetails['lastName']) .
           "&examType=" . urlencode($examDetails['examType']) .
           "&score=" . $score .
           "&level=" . urlencode($certificateLevel) .
           "&trackingCode=" . $trackingCode;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>نتیجه امتحان | Mohammad Taha Gorji</title>
  <link rel="stylesheet" href="dark-openai-style.css">
  <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
  <script>
    function downloadCertificate() {
      // اگر کاربر مدرک را دارد، هم مدرک را در تب جدید باز می‌کند و هم فایل HTML آن را دانلود می‌کند
      window.open("<?php echo $certUrl; ?>", "_blank");
      var link = document.createElement("a");
      link.href = "<?php echo $certUrl; ?>&download=1";
      link.download = "certificate.html";
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
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
    <section class="container result-section glass-card">
      <h1>نتیجه امتحان</h1>
      <p>نام: <?php echo htmlspecialchars($examDetails['firstName'] . " " . $examDetails['lastName']); ?></p>
      <p>نوع آزمون: <?php echo htmlspecialchars($examDetails['examType']); ?></p>
      <p>نمره شما: <?php echo $score; ?> از 60</p>
      <p>کد پیگیری شما: <?php echo $trackingCode; ?></p>
      <h2>جزئیات پاسخ‌ها</h2>
      <ul>
        <?php foreach ($answers as $ans): ?>
          <li>
            <strong>سوال:</strong> <?php echo htmlspecialchars($ans['question']); ?><br>
            <strong>پاسخ شما:</strong> <?php echo htmlspecialchars($ans['selected']); ?> – 
            <strong>پاسخ صحیح:</strong> <?php echo htmlspecialchars($ans['correct']); ?> – 
            <strong>نمره:</strong> <?php echo $ans['obtained']; ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <?php if ($score > 30) { ?>
        <p style="font-weight:bold;">مدرک شما: <?php echo $certificateLevel; ?></p>
        <a href="#" class="button" onclick="downloadCertificate()">دانلود مدرک</a>
      <?php } else { ?>
        <p style="color:#e60073; font-weight:bold;">متأسفانه شما نمره کافی برای دریافت مدرک را کسب نکرده‌اید.</p>
      <?php } ?>
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
