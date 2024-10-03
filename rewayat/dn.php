<?php
// URL للصفحة الأولى التي تريد استخراج البيانات منها
$url = 'https://www.scarehome.com/search/label/%D8%B1%D9%88%D8%A7%D9%8A%D8%A7%D8%AA%20%D8%B4%D9%8A%D9%82%D9%87?m=1';

// ملف JSON لتخزين البيانات
$jsonFile = 'novels.json';
$data = [];

// وظيفة لتحليل المحتوى واستخراج الروايات
function extractNovels($htmlContent) {
    global $data;
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($htmlContent);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);
    $posts = $xpath->query('//article[contains(@class, "post-amp")]');

    foreach ($posts as $post) {
        $titleNode = $xpath->query('.//h2[contains(@class, "rnav-title")]//a', $post)->item(0);
        $title = $titleNode ? $titleNode->nodeValue : 'غير معروف';
        $link = $titleNode ? $titleNode->getAttribute('href') : '#';
        $imgNode = $xpath->query('.//a[contains(@class, "Img-Holder")]//img', $post)->item(0);
        $imgSrc = $imgNode ? $imgNode->getAttribute('src') : '';
        $authorNode = $xpath->query('.//a[contains(@class, "author")]//span[contains(@class, "fn")]', $post)->item(0);
        $author = $authorNode ? $authorNode->nodeValue : 'غير معروف';
        $dateNode = $xpath->query('.//span[contains(@class, "Date")]//a', $post)->item(0);
        $date = $dateNode ? $dateNode->nodeValue : 'غير معروف';
        $shortContentNode = $xpath->query('.//div[contains(@class, "Short_content")]', $post)->item(0);
        $shortContent = $shortContentNode ? $shortContentNode->nodeValue : 'محتوى غير متوفر';

        $data[] = [
            'title' => $title,
            'link' => $link,
            'imgSrc' => $imgSrc,
            'author' => $author,
            'date' => $date,
            'shortContent' => $shortContent
        ];
    }
}

// تحميل الصفحة الأولى
$htmlContent = file_get_contents($url);
extractNovels($htmlContent);

// البحث عن روابط "اقرأ المزيد"
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($htmlContent);
libxml_clear_errors();
$xpath = new DOMXPath($dom);
$nextLinkNode = $xpath->query('//a[contains(text(), "اقرأ المزيد")]')->item(0);

while ($nextLinkNode) {
    $nextLink = $nextLinkNode->getAttribute('href');
    $htmlContent = file_get_contents($nextLink);
    extractNovels($htmlContent);
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($htmlContent);
    libxml_clear_errors();
    $xpath = new DOMXPath($dom);
    $nextLinkNode = $xpath->query('//a[contains(text(), "اقرأ المزيد")]')->item(0);
}

// حفظ البيانات في ملف JSON
file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT));

// عرض عدد الروايات التي تم الحصول عليها
echo 'عدد الروايات التي تم الحصول عليها: ' . count($data);
?>