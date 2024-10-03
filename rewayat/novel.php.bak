<?php
// التحقق من وجود الرابط في طلب GET
if (!isset($_GET['url']) || empty($_GET['url'])) {
    die('URL is required.');
}

$url = $_GET['url'];

// إعداد cURL
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8",
    "Accept-Language: en-US,en;q=0.9,ar;q=0.8",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
    "Upgrade-Insecure-Requests: 1"
));

// الحصول على محتوى الصفحة
$html_content = curl_exec($ch);

// التحقق من نجاح العملية
if (curl_errno($ch)) {
    die('Failed to fetch content: ' . curl_error($ch));
}

curl_close($ch);

// تعطيل الأكواد الجافاسكريبت المضمنة
$pattern = '/<script\b[^>]*>(.*?)<\/script>/s';
$filtered_content = preg_replace($pattern, '', $html_content);

// تحليل المحتوى باستخدام DOMDocument
$doc = new DOMDocument();
@$doc->loadHTML($filtered_content);

$title = '';
$image = '';
$content = '';

// استخراج العنوان
$title_tags = $doc->getElementsByTagName('title');
if ($title_tags->length > 0) {
    $title = $title_tags->item(0)->textContent;
}

// استخراج الصورة
$meta_tags = $doc->getElementsByTagName('meta');
foreach ($meta_tags as $meta) {
    if ($meta->getAttribute('property') === 'og:image') {
        $image = $meta->getAttribute('content');
    }
}

// استخراج محتوى الرواية
$paragraph_list = $doc->getElementById('paragraph-list');
if ($paragraph_list) {
    $content = $doc->saveHTML($paragraph_list);
} else {
    $content = 'لم يتم العثور على المحتوى.';
}

// عرض المحتوى
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }
        .novel {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: left;
        }
        .novel img {
            max-width: 100%;
            height: auto;
        }
        .novel h2 {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <?php if ($image): ?>
        <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>">
    <?php endif; ?>
    <div class="novel">
        <?php echo $content; ?>
    </div>
    <footer>
        <p>© جميع الحقوق محفوظة.</p>
    </footer>
</body>
</html>