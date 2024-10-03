<?php
if (isset($_GET['url'])) {
    $url = escapeshellarg($_GET['url']);
    $command = "python3 read.py $url";
    $output = shell_exec($command);
    $data = json_decode($output, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novel Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .content {
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($data)): ?>
            <?php if (isset($data['error'])): ?>
                <p>Error: <?php echo htmlspecialchars($data['error']); ?></p>
            <?php else: ?>
                <h1 class="title"><?php echo htmlspecialchars($data['title']); ?></h1>
                <?php if (!empty($data['image_url'])): ?>
                    <img src="<?php echo htmlspecialchars($data['image_url']); ?>" alt="Novel Image" class="image">
                <?php endif; ?>
                <div class="content">
                    <?php echo nl2br(htmlspecialchars($data['content'])); ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p>Loading...</p>
        <?php endif; ?>
    </div>
</body>
</html>