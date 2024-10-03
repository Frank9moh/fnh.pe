<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* أنماط CSS إضافية لتحسين التصميم */
    body {
        direction: rtl; /* توجيه النصوص للعربية */
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .waiting-message {
        text-align: center;
    }
</style>
<title>𝓕𝓷𝓱</title>
</head>
<body>
<center>
<h1 class='mb-4'>𝓕𝓷𝓱</h1>
<div class="card animated fadeIn">
<div class="card-body">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="part" class="card-title"> ‎‌‎"المراجعة النهائية"‎‌‎‎‌‎ في اللغة الانجليزية </label> <br>
      <p class="card-text"> • الإختبار عبارة عن 10 اسئلة يتم اختيارهم بعشوائية من بنك أسئلة المراجعة النهائية لأفضل الكتب .<br>
    • إضغط علي زر انطلق ⚡ لكي يبدأ الإختبار .
    </p>
    <br>
    <input type="submit" name="submit" value="انطلق ⚡️"><br><br><br>
    <p class="card-text">
    ● أسرة 𝓕𝓷𝓱 تتمني لكم دوام التفوق ♥︎
    <br>
    🧑‍💻 المطور :《 Abdullah El-qary 》 
    </p>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // تحميل ملفات الأسئلة والإجابات المناسبة 

    // عرض الأسئلة
    echo "    <div class='waiting-message'><br><h1 class='mb-4'>جارٍ تحضير الاسئلة ...</h1><br><p class='mb-4'>لحظات ويبدأ الاختبار .</p><br><div class='spinner-border text-primary' role='status'><br><span class='visually-hidden'>Loading...</span><br></div><br></div><br></div><br><script> setTimeout(function() {window.location.href = 'quiz.php';}, 2000);</script>";
    
}
?>
</center>
</body>
</html>