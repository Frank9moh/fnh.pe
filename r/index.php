<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المحتوى</title>
</head>
<body>
    <div id="content">
        <?php
            
                // تحميل محتوى الصفحة
                $url = $_GET['url'];
                $html_content = file_get_contents($url);

                // تعطيل الأكواد الجافاسكريبت المضمنة
                $pattern = '/<script\b[^>]*>(.*?)<\/script>/s';
                $filtered_content = preg_replace($pattern, '', $html_content);

                // إظهار المحتوى بعد تعطيل الأكواد الجافاسكريبت المضمنة
                echo $filtered_content;
            
        ?>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="url">URL الصفحة:</label><br>
        <input type="text" id="url" name="url" value=""><br><br>
        <input type="submit" value="عرض المحتوى">
    </form>
</body>
</html>