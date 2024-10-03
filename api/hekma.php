<?php

// Function to make HTTP GET request
function get_web_page($url, $cookies, $headers) {
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'GET',
            'cookies' => $cookies,
            'header'  => $headers
        )
    );
    $context  = stream_context_create($options);
    return file_get_contents($url, false, $context);
}

// URL to scrape
$url = 'https://kalemtayeb.com/';

// Cookies and headers
$cookies = "PHPSESSID=ec3d6370c0494c8cbc70a9cd13f92223; __utma=145625134.1951742619.1709804393.1709804393.1709804393.1; __utmc=145625134; __utmz=145625134.1709804393.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided); __utmt=1; __utmb=145625134.17.10.1709804393";
$headers = "authority: kalemtayeb.com\r\n".
           "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7\r\n".
           "accept-language: ar-AE,ar-EG;q=0.9,ar;q=0.8,en-GB;q=0.7,en;q=0.6,en-US;q=0.5\r\n".
           "referer: https://kalemtayeb.com/favs/764\r\n".
           "sec-ch-ua: \"Not_A Brand\";v=\"8\", \"Chromium\";v=\"120\"\r\n".
           "sec-ch-ua-mobile: ?0\r\n".
           "sec-ch-ua-platform: \"Android\"\r\n".
           "sec-fetch-dest: document\r\n".
           "sec-fetch-mode: navigate\r\n".
           "sec-fetch-site: same-origin\r\n".
           "sec-fetch-user: ?1\r\n".
           "upgrade-insecure-requests: 1\r\n".
           "user-agent: Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36";

// Get the web page content
$response = get_web_page($url, $cookies, $headers);

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
        echo trim($p_element->textContent) . "\n";
    } else {
        echo $random_phrase . ": Associated text not found.\n";
    }
} else {
    echo $random_phrase . ": Not found in the response.\n";
}

?>
