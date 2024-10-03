<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>نتائج الاختبار</title>
<!-- تضمين Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- تضمين Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    /* أنماط CSS إضافية لتحسين التصميم */
    body {
        direction: rtl; /* توجيه النصوص للعربية */
        background-color: #f8f9fa; /* لون خلفية الصفحة */
    }
    .card {
        margin-bottom: 20px; /* تباعد بين الأسئلة */
        border: 1px solid #ced4da; /* حدود للبطاقة */
        border-radius: 10px; /* زوايا مستديرة */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* ظل للبطاقة */
    }
</style>
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-3 text-center">نتائج الاختبار</h1>

    <?php
    $ms = ["الأول","الثاني","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر"];
    // اقرأ أسئلة من ملف الأسئلة
    $questions = file('questions.txt', FILE_IGNORE_NEW_LINES);

    // اقرأ الإجابات المقدمة من المستخدم
    $userAnswers = $_POST['answer'];
 $startTime = $_POST["start_time"]; // وقت بدء الاختبار
    // اقرأ الإجابات الصحيحة من ملف الإجابات
    $correctAnswers = file('answers.txt', FILE_IGNORE_NEW_LINES);

    // عدد الأسئلة الصحيحة وغير الصحيحة
    $correctCount = 0;
    $incorrectCount = 0;

    // اعرض نتيجة كل سؤال
    foreach ($userAnswers as $key => $userAnswer) {
        $question = $questions[$key];
        $correctAnswer = explode('!', $correctAnswers[$key]);
        $correctIndex = intval(array_pop($correctAnswer)) - 1;
  $endTime = time();
        $timeTaken = $endTime - $startTime;
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">سؤال ' . $ms[$key] . '</h5>'; // Use $ms[$key] instead of $m
        echo '<p class="card-text">' . $question . '</p>';
        echo '<p class="card-text">إجابتك: ' . $userAnswer . '</p>';

        // Check answer correctness
        if ($userAnswer === $correctAnswer[$correctIndex]) {
            echo '<p class="card-text text-success"><i class="fas fa-check-circle"></i> الإجابة صحيحة</p>';
            $correctCount++;
        } else {
            echo '<p class="card-text text-danger"><i class="fas fa-times-circle"></i> الإجابة خاطئة. التصحيح: ' . $correctAnswer[$correctIndex] . '</p>';
            $incorrectCount++;
        }

        echo '</div>';
        echo '</div>';
    }

    // عرض عدد الأسئلة الصحيحة والخاطئة
    $totalQuestions = count($userAnswers);
    echo '<div class="alert alert-success text-center" role="alert">عدد الأسئلة الصحيحة: ' . $correctCount . '</div>';
    echo '<div class="alert alert-warning text-center" role="alert">عدد الأسئلة الخاطئة: ' . $incorrectCount . '</div>';
    echo '<center><p class="mt-3">زمن الاختبار: ' . gmdate("H:i:s", $timeTaken) . '</p></center>';

    // عرض تنبيه إذا لم يتم الإجابة على جميع الأسئلة
    if ($totalQuestions != 10) {
        echo '<div class="alert alert-warning text-center" role="alert">لم تقم بالإجابة على جميع الأسئلة بعد!</div>';
    } else {
        echo '<div class="alert alert-success text-center" role="alert">لقد انتهيت من الاختبار، شكرا لك!</div>';
    }
    ?>

</div>

<!-- تضمين Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>