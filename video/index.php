<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    $query = isset($_GET['query']) ? $_GET['query'] : '';
    $url = 'https://w27.my-cima.net/search.php?keywords=' . urlencode($query) . '&video-id=';

    // إجراء طلب GET إلى الموقع المستهدف
    $response = file_get_contents($url);

    if ($response === FALSE) {
        echo json_encode(['error' => 'حدث خطأ أثناء جلب البيانات']);
        exit;
    }

    // تحليل HTML
    $doc = new DOMDocument();
    @$doc->loadHTML($response);
    $xpath = new DOMXPath($doc);

    // استخراج بيانات الفيديو
    $videos = [];
    $nodes = $xpath->query('//li[contains(@class, "col-xs-6 col-sm-4 col-md-3")]');

    foreach ($nodes as $node) {
        $titleNode = $xpath->query('.//a[contains(@class, "ellipsis")]', $node)->item(0);
        $imgNode = $xpath->query('.//img', $node)->item(0);
        $durationNode = $xpath->query('.//span[contains(@class, "pm-label-duration")]', $node)->item(0);
        $linkNode = $xpath->query('.//a[contains(@href, "watch.php?vid=")]', $node)->item(0);

        $videos[] = [
            'title' => $titleNode ? $titleNode->getAttribute('title') : 'No title',
            'image' => $imgNode ? $imgNode->getAttribute('src') : 'No image',
            'duration' => $durationNode ? $durationNode->textContent : 'No duration',
            'link' => $linkNode ? $linkNode->getAttribute('href') : 'No link'
        ];
    }



//echo $xpath;
    echo json_encode($videos);
    
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البحث عن فيديوهات</title>
    <style>
        #loading {
            display: none;
            font-size: 20px;
            text-align: center;
            margin-top: 20px;
        }
        #error {
            display: none;
            color: red;
            font-size: 20px;
            text-align: center;
            margin-top: 20px;
        }
        .video-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .video-item img {
            width: 240px;
            height: 136px;
            object-fit: cover;
            object-position: 25% 55%;
        }
    </style>
</head>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>البحث عن فيديوهات</h1>
        <input type="text" id="search-query" placeholder="أدخل كلمات البحث">
        <button onclick="searchVideos()">بحث</button>
    </div>
    <div id="loading">جاري البحث...</div>
    <div id="error">حدث خطأ أثناء البحث. حاول مرة أخرى.</div>
    <div id="results" style="margin-top: 20px;"></div>

    <script>
        async function searchVideos() {
            const query = document.getElementById('search-query').value;
            const loadingDiv = document.getElementById('loading');
            const errorDiv = document.getElementById('error');
            const resultsDiv = document.getElementById('results');

            loadingDiv.style.display = 'block';
            errorDiv.style.display = 'none';
            resultsDiv.innerHTML = '';

            try {
                const response = await fetch(`index.php?query=${encodeURIComponent(query)}`);
                const data = await response.json();

                if (data.error) {
                    throw new Error(data.error);
                }

                if (data.length === 0) {
                    resultsDiv.innerHTML = '<p>لا توجد نتائج.</p>';
                } else {
                    data.forEach(video => {
                        const videoDiv = document.createElement('div');
                        videoDiv.className = 'video-item';

                        const title = document.createElement('h3');
                        title.innerText = video.title;
                        videoDiv.appendChild(title);

                        const img = document.createElement('img');
                        img.src = video.image;
                        img.alt = video.title;
                        videoDiv.appendChild(img);

                        const duration = document.createElement('p');
                        duration.innerText = `المدة: ${video.duration}`;
                        videoDiv.appendChild(duration);

                        const link = document.createElement('a');
                        link.href = `play.php?vid=${extractVid(video.link)}`; // تعديل الرابط هنا
                        link.innerText = 'مشاهدة الفيديو';
                        videoDiv.appendChild(link);

                        resultsDiv.appendChild(videoDiv);
                    });
                }
            } catch (error) {
                errorDiv.innerText = `حدث خطأ: ${error.message}`;
                errorDiv.style.display = 'block';
            } finally {
                loadingDiv.style.display = 'none';
            }
        }

        function extractVid(url) {
            const urlParams = new URLSearchParams(new URL(url).search);
            return urlParams.get('vid');
        }
    </script>
</body>
</html>