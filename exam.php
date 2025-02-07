<!-- exam.php -->
<?php
session_start();
if (!isset($_SESSION['examDetails'])) {
  header("Location: exam_form.php");
  exit;
}
$examType = $_SESSION['examDetails']['examType'];

$questionsData = file_get_contents('question.json');
$allQuestions = json_decode($questionsData, true);

$normal = array_filter($allQuestions, function($q) use ($examType) {
  return $q['examType'] === $examType && $q['level'] === 'normal';
});
$medium = array_filter($allQuestions, function($q) use ($examType) {
  return $q['examType'] === $examType && $q['level'] === 'medium';
});
$advanced = array_filter($allQuestions, function($q) use ($examType) {
  return $q['examType'] === $examType && $q['level'] === 'advanced';
});
shuffle($normal);
shuffle($medium);
shuffle($advanced);
$selectedNormal = array_slice($normal, 0, 10);
$selectedMedium = array_slice($medium, 0, 10);
$selectedAdvanced = array_slice($advanced, 0, 10);
$selectedQuestions = array_merge($selectedNormal, $selectedMedium, $selectedAdvanced);
$selectedQuestions = array_values($selectedQuestions);
?>
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>امتحان | Mohammad Taha Gorji</title>
  <link rel="stylesheet" href="dark-openai-style.css">
  <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
  <script>
    var questions = <?php echo json_encode($selectedQuestions); ?>;
    var currentQuestionIndex = 0;
    var score = 0;
    var answers = [];
    
    function showQuestion(index) {
      if (index >= questions.length) {
        submitExam();
        return;
      }
      var question = questions[index];
      document.getElementById("questionText").innerText = question.question;
      document.getElementById("questionLevel").innerText = "سطح: " + question.level;
      var optionsContainer = document.getElementById("options");
      optionsContainer.innerHTML = "";
      question.options.forEach(function(option) {
        var btn = document.createElement("button");
        btn.innerText = option;
        btn.className = "optionButton";
        btn.onclick = function() { answerQuestion(index, option, question.correctAnswer, question.level); };
        optionsContainer.appendChild(btn);
      });
    }
    
    function answerQuestion(index, selected, correct, level) {
      var points = (level === "normal" ? 1 : (level === "medium" ? 2 : 3));
      var buttons = document.getElementsByClassName("optionButton");
      for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
        if (buttons[i].innerText === correct) {
          buttons[i].classList.add("correct");
        }
      }
      var obtained = 0;
      if (selected === correct) {
        score += points;
        obtained = points;
      }
      answers.push({
        question: questions[index].question,
        selected: selected,
        correct: correct,
        level: level,
        points: points,
        obtained: obtained
      });
      setTimeout(function() {
        currentQuestionIndex++;
        showQuestion(currentQuestionIndex);
      }, 1500);
    }
    
    function submitExam() {
      var form = document.createElement("form");
      form.method = "post";
      form.action = "result.php";
      var scoreInput = document.createElement("input");
      scoreInput.type = "hidden";
      scoreInput.name = "score";
      scoreInput.value = score;
      form.appendChild(scoreInput);
      var answersInput = document.createElement("input");
      answersInput.type = "hidden";
      answersInput.name = "answers";
      answersInput.value = JSON.stringify(answers);
      form.appendChild(answersInput);
      document.body.appendChild(form);
      form.submit();
    }
    
    window.onload = function() {
      showQuestion(currentQuestionIndex);
    };
  </script>
</head>
<body>
  <header class="glass-header">
    <div class="container header-container">
      <a href="index.php" class="logo">Mohammad Taha Gorji</a>
    </div>
  </header>
  <main>
    <section class="container exam-section glass-card">
      <h1>امتحان</h1>
      <p id="questionLevel"></p>
      <p id="questionText"></p>
      <div id="options"></div>
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
