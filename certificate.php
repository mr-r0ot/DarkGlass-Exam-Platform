<?php
$firstName = isset($_GET['firstName']) ? $_GET['firstName'] : 'نام';
$lastName  = isset($_GET['lastName']) ? $_GET['lastName'] : 'نام خانوادگی';
$examType  = isset($_GET['examType']) ? $_GET['examType'] : 'آزمون';
$score     = isset($_GET['score']) ? $_GET['score'] : '0';
$certLevel = isset($_GET['level']) ? $_GET['level'] : '';
$trackingCode = isset($_GET['trackingCode']) ? $_GET['trackingCode'] : '';

// اگر نمره کمتر یا مساوی 30 باشد، مدرک نمایش داده نشود.
if ($score <= 30) {
  echo "شما نمره کافی برای دریافت مدرک را کسب نکرده‌اید.";
  exit;
}

// در صورت درخواست دانلود، هدرها تنظیم می‌شوند.
if (isset($_GET['download']) && $_GET['download'] == 1) {
  header('Content-Type: text/html');
  header('Content-Disposition: attachment; filename="certificate.html"');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate of Achievement</title>
  <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      background-color: #121212;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #e0e0e0;
    }
    .certificate {
      position: relative;
      width: 800px;
      max-width: 90vw;
      height: 600px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
      text-align: center;
      overflow: hidden;
    }
    .certificate::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0));
      border-radius: 20px;
      z-index: 0;
    }
    .certificate * {
      position: relative;
      z-index: 1;
    }
    .certificate h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: #ffffff;
    }
    .certificate p {
      font-size: 1.2rem;
      margin: 10px 0;
    }
    .certificate .recipient {
      font-size: 2rem;
      font-weight: bold;
      margin: 20px 0;
      color: #bb86fc;
    }
    .certificate .score {
      font-size: 1.5rem;
      color: #03dac6;
    }
    .certificate .level {
      font-size: 1.3rem;
      font-weight: bold;
      margin-top: 10px;
      color: #03dac6;
    }
    .certificate .tracking {
      font-size: 1rem;
      margin-top: 10px;
      color: #03dac6;
    }
    .certificate .footer {
      margin-top: 40px;
      font-size: 0.9rem;
      color: #a0a0a0;
    }
    .follow-up {
      margin-top: 20px;
      font-size: 1rem;
    }
    .follow-up a {
      color: #03dac6;
      text-decoration: underline;
    }
    .code-credit {
      margin-top: 10px;
      font-size: 0.8rem;
      color: #888;
    }
  </style>
</head>
<body>
  <div class="certificate">
    <h1>Certificate of Achievement</h1>
    <p>This is to certify that</p>
    <p class="recipient"><?php echo htmlspecialchars($firstName . " " . $lastName); ?></p>
    <p>has successfully passed the Online Language Proficiency Exam</p>
    <p>with a score of</p>
    <p class="score"><?php echo htmlspecialchars($score); ?> / 60</p>
    <p>Your certificate level is:</p>
    <p class="level"><?php echo htmlspecialchars($certLevel); ?></p>
    <p>Your tracking code is:</p>
    <p class="tracking"><?php echo htmlspecialchars($trackingCode); ?></p>
    <p>We appreciate the dedication and effort shown in achieving this milestone.</p>
    <div class="footer">
      <p>Mohammad Taha Gorji International Language Institute</p>
      <p>Address: Tehran, Ahmad Abad Mostofi, Motahari St, No. 56</p>
      <p>Phone: 021-56713026</p>
    </div>
    <div class="follow-up">
      <p>For exam tracking, visit <a href="https://MohammadTahaGorji.ir/exam" target="_blank">https://MohammadTahaGorji.ir/exam</a></p>
    </div>
    <div class="code-credit">Coded by Mohammad Taha Gorji</div>
  </div>
</body>
</html>
