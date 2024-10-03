<?php
// الحصول على قيمة المتغير vid من URL
$vid = isset($_GET['vid']) ? $_GET['vid'] : '';

if (!empty($vid)) {
    // الرابط الذي نريد جلب البيانات منه
    $url = "https://w27.my-cima.net/play.php?vid=" . $vid;

    // إرسال طلب HTTP لجلب المحتوى
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $html = curl_exec($ch);
    curl_close($ch);

    // التحقق من نجاح جلب المحتوى
    if ($html === false) {
        die('فشل في جلب المحتوى.');
    }

    // تحليل HTML باستخدام DOMDocument
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // الحصول على العناصر التي تحتوي على روابط الفيديو
    $xpath = new DOMXPath($dom);
    $nodes = $xpath->query("//ul[@class='list_servers list_embedded col-sec']/li");

    // تخزين الروابط والأيقونات
    $links = [];
    $icons = [];
    $serverNames = [];
    foreach ($nodes as $node) {
        $dataEmbed = $node->getAttribute('data-embed');
        preg_match("/src='([^']+)'/", $dataEmbed, $matches);
        if (isset($matches[1])) {
            $links[] = $matches[1];
        }
        $iconNode = $xpath->query('.//img', $node)->item(0);
        $iconSrc = $iconNode ? $iconNode->getAttribute('src') : 'path/to/default-icon.png';
        $icons[] = $iconSrc;
        $serverNames[] = $node->getAttribute('data-name'); // الحصول على اسم السيرفر
    }

    // عرض الروابط
    if (!empty($links)) {
        $primaryLink = $links[0]; // استخدام أول رابط كسيرفر أساسي
        echo '<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهدة الفيديو</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .video-link {
            margin-bottom: 20px;
        }
        .servers {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        .server-item {
            width: 100px;
            text-align: center;
        }
        .server-item img {
            width: 80px;
            height: 45px;
            object-fit: cover;
            border-radius: 4px;
        }
        .server-item p {
            margin: 5px 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>مشاهدة الفيديو</h1>
        <div class="video-link">
            <p>يمكنك مشاهدة الفيديو عبر الرابط التالي:</p>
            <a href="' . htmlspecialchars($primaryLink) . '" target="_blank">فتح الفيديو في نافذة جديدة</a>
        </div>
        <div class="servers">';
        
        foreach ($links as $index => $link) {
            if ($index > 0) { // تخطي السيرفر الأساسي
                echo '<div class="server-item">
                    <a href="' . htmlspecialchars($link) . '" target="_blank">
                        <img src="' . htmlspecialchars($icons[$index]) . '" alt="Server ' . ($index + 1) . '">
                        <p>' . htmlspecialchars($serverNames[$index]) . '</p>
                    </a>
                </div>';
            }
        }

        echo '</div>
    </div>
</body>
</html>';
    } else {
        echo "لم يتم العثور على روابط.";
    }
} else {
    echo "لم يتم توفير قيمة vid.";
}
?>