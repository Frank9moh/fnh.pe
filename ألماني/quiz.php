<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>𝓕𝓷𝓱</title>
<!-- تضمين Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- تضمين Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- تضمين Animate.css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<!-- تضمين SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<!-- تضمين jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="styles.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-3 text-center"> ‎‌‎"المراجعة النهائية"‎‌‎‎‌‎ في اللغة الألمانية</h1>

    <form action="submit.php" method="post" onsubmit="return validateForm();">
        <?php
        $ms = ["الأول","الثاني","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر"];
        // اقرأ أسئلة من ملف الأسئلة
        $questions = file('questions.txt', FILE_IGNORE_NEW_LINES);

        // عدد الأسئلة
        $numQuestions = count($questions);

        // اختيار 10 أسئلة عشوائيًا
        $randomQuestionsIndexes = array_rand($questions, 10);

        // عرض الأسئلة العشوائية
        $combinedArray = array_combine($randomQuestionsIndexes, $ms);
        foreach ($combinedArray as $index => $m) {
            echo '<div class="card animated fadeIn">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">السؤال ' . $m . '</h5>';
            echo '<p class="card-text">' . $questions[$index] . '</p>';
            // اقرأ الإجابات من ملف الإجابات
            $answers = file('answers.txt', FILE_IGNORE_NEW_LINES);
            $choices = explode('!', $answers[$index]);
            $correctIndex = intval(array_pop($choices)) - 1;
            // عرض الإجابات كخيارات
            foreach ($choices as $key => $choice) {
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="radio" name="answer[' . $index . ']" id="q' . $index . 'choice' . ($key+1) . '" value="' . $choice . '" onclick="updateAnsweredQuestionsCount();">';
                echo '<label class="form-check-label" for="q' . $index . 'choice' . ($key+1) . '">' . $choice . '</label>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
        <input type="hidden" name="start_time" value="<?php echo time(); ?>">
        <center><button type="submit" class="btn btn-primary mt-3">تصحيح الإختبار</button></center><br><br>
    </form>
</div>

<!-- تضمين SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var numQuestions = <?php echo $numQuestions; ?>;
    var answeredQuestionsCount = 0;

    function updateAnsweredQuestionsCount() {
        answeredQuestionsCount = document.querySelectorAll('input[type="radio"]:checked').length;
    }

    function validateForm() {
        if (answeredQuestionsCount < 10) {
            Swal.fire({
                title: 'تنبيه',
                text: 'يجب الإجابة على جميع الأسئلة قبل تصحيح الاختبار.',
                icon: 'warning',
                confirmButtonText: 'حسنًا'
            });

            // تأخير إخفاء الرسالة
            setTimeout(function() {
                Swal.close();
            }, 5000);

            // تحريك الصفحة إلى الجزء الذي لم يتم الرد عليه
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });

            return false;
        }
        return true;
    }
</script>

</body>
</html>