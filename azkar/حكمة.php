<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مُــرتَقـَــــون | إبني جنتك</title>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Amiri', serif;
            background-color: #222;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            text-align: right;
            direction: rtl;
            width: 100%;
            box-sizing: border-box;
            margin: auto;
        }

        h1 {
            color: #ff9800;
            text-align: center;
            font-size: 2rem;
        }

        .dua-container {
            background-color: #555;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            position: relative;
        }

        .icons {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .icons i {
            color: #ff9800;
            margin-left: 10px;
            cursor: pointer;
        }

        .footer {
            text-align: center;
            color: #ccc;
            font-size: 1.4rem;
            background-color: #333;
            padding: 10px 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
            width: 50%;
            max-width: 800px;
            margin: 20px auto 0;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>حــكــمــة الــقـــــارئ ✍ </h1>

        <div class="dua-container">
            <div class="icons">
                <i class="fas fa-sync-alt" onclick="location.reload()"></i>
            </div>
            <div id="response">
                <p id="duaContent">جاري التحميل...</p>
            </div>
        </div>

        <center>
            <div class="footer">
                مُــرتَقـَــــون | إبني جنتك
            </div>
        </center>
    </div>

    <script>
        // Function to fetch dua content on page load
        window.onload = function() {
            fetchDua();
        };

        // Function to fetch dua content
        function fetchDua() {
            // Use PHP to fetch dua content and update #duaContent
            <?php
            // Function to make HTTP GET request in PHP
            function get_web_page($url, $headers) {
                $options = array(
                    'http' => array(
                        'header' => $headers,
                        'method' => 'GET'
                    )
                );
                $context = stream_context_create($options);
                return file_get_contents($url, false, $context);
            }

            // URL to scrape
            $url = 'https://kalemtayeb.com/';

            // Headers
            $headers = "authority: kalemtayeb.com\r\n" .
                       "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7\r\n" .
                       "accept-language: ar-AE,ar-EG;q=0.9,ar;q=0.8,en-GB;q=0.7,en;q=0.6,en-US;q=0.5\r\n" .
                       "referer: https://kalemtayeb.com/favs/764\r\n" .
                       "sec-ch-ua: \"Not_A Brand\";v=\"8\", \"Chromium\";v=\"120\"\r\n" .
                       "sec-ch-ua-mobile: ?0\r\n" .
                       "sec-ch-ua-platform: \"Android\"\r\n" .
                       "sec-fetch-dest: document\r\n" .
                       "sec-fetch-mode: navigate\r\n" .
                       "sec-fetch-site: same-origin\r\n" .
                       "sec-fetch-user: ?1\r\n" .
                       "upgrade-insecure-requests: 1\r\n" .
                       "user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36";

            // Get the web page content
            $response = get_web_page($url, $headers);

            // Load the HTML content into a DOMDocument
            $doc = new DOMDocument();
            @$doc->loadHTML($response);
            $xpath = new DOMXPath($doc);

            // Find all elements containing the desired text
            $desired_phrases = array('حكمــة');
            $random_phrase = $desired_phrases[array_rand($desired_phrases)];

            // Find the element containing the random phrase
            $hikma_element = $xpath->query("//a[contains(text(), '$random_phrase')]")->item(0);

            if ($hikma_element) {
                // Find the nearest paragraph element to the anchor tag containing the phrase
                $p_element = $hikma_element->parentNode->nextSibling;
                // Loop through the next sibling elements until a paragraph element is found
                while ($p_element && $p_element->nodeName != 'p') {
                    $p_element = $p_element->nextSibling;
                }

                if ($p_element) {
                    // Print the random phrase and associated text
                    echo "document.getElementById('duaContent').textContent = '" . trim($p_element->textContent) . "';";
                } else {
                    echo "document.getElementById('duaContent').textContent = '$random_phrase: Associated text not found.';";
                }
            } else {
                echo "document.getElementById('duaContent').textContent = '$random_phrase: Not found in the response.';";
            }
            ?>
        }
    </script>

</body>
</html>