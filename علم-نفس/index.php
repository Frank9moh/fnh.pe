


<!DOCTYPE html>
<html lang="ar">
<head>
	<title>𝓕𝓷𝓱</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css1/util.css">
	<link rel="stylesheet" type="text/css" href="../css1/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!--===============================================================================================-->
<!-- تضمين Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- تضمين Animate.css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<!-- تضمين SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<!-- تضمين jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    /* أنماط CSS إضافية لتحسين التصميم */
    body {
        direction: rtl; /* توجيه النصوص للعربية */
        
    }
    
    .waiting-message {
        text-align: center;
        width: 100%;
        height: 100%;
    }
    #notificationn {
            position: fixed;
            top: -100px; /* ابدأ خارج الشاشة */
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 0, 0, 0.7); /* لون أحمر باهت وشبه شفاف */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            animation: slideDown 1s forwards, fadeOut 1s forwards 5s; /* تأثير النزول والتلاشي */
        }
        #notificationn h1 {
            font-size: 50px;
            color: white; /* لون القلب أبيض ليظهر بوضوح على الخلفية الحمراء */
            margin: 0;
            margin-right: 10px;
        }
        #notificationn p {
            font-size: 20px;
            margin: 0;
            color: white; /* لون النص أبيض ليظهر بوضوح على الخلفية الحمراء */
        }
        #notificationn a {
            color: yellow; /* لون الرابط أصفر ليكون بارزاً */
            text-decoration: none;
            font-weight: bold;
        }
        @keyframes slideDown {
            from { top: -100px; opacity: 0; } /* ابدأ خارج الشاشة */
            to { top: 20px; opacity: 1; } /* انزل إلى داخل الشاشة */
        }
        @keyframes fadeOut {
            0% { opacity: 1; }
            80% { opacity: 1; }
            100% { opacity: 0; }
        }
</style>
</head>
<body>
	<center>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<span class="login100-form-title" style="font-size:60px;">
						𝓕𝓷𝓱
						</span>
<br><br><br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="part"  style="font-size:40px;"> ‎‌‎"المراجعة النهائية"‎‌‎‎‌‎ في علم النفس والاجتماع</label> <br><br>
      <p style="font-size:30px;"> • الإختبار عبارة عن 10 اسئلة يتم اختيارهم بعشوائية من بنك أسئلة المراجعة النهائية لأفضل الكتب .<br>
    • إضغط علي زر  انطلق ⚡ لكي يبدأ الإختبار .
    </p>
    <br>
    
    
    <div class="container-login100-form-btn">
						
						<input class="login100-form-btn" type="submit" name="submit" value="انطلق ⚡️">
						
					</div>
<br><br>
					
<div class="login100-pic js-tilt" data-tilt>
					<h1><p  style="font-size:28px; width:100%; height:100%;">    ● أسرة 𝓕𝓷𝓱 تتمني لكم دوام التفوق ♥︎
    <br>
    🧑‍💻 المطور :《 Abdullah El-qary 》 
    </p>
		</h1>			
					
					
				</div>
    

    
    
    
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // تحميل ملفات الأسئلة والإجابات المناسبة 

    // عرض الأسئلة
    echo "  <style>form{display: none;} </style>  <div class='waiting-message'><br><h1  style='font-size:50px;'>جارٍ تحضير الاسئلة ...</h1><br><p style='font-size:30px;'>لحظات ويبدأ الاختبار .</p><br><div class='spinner-border text-primary' role='status'><br><span class='visually-hidden'>Loading...</span><br></div><br></div><br></div><br><script> setTimeout(function() {window.location.href = 'quiz.php';}, 2000);</script>";
    
}
?>
            






			</div>
		</div>
	</div>
	
	</center>

<!-- تضمين SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        window.onload = function() {
            var notificationn = document.createElement('div');
            notificationn.id = 'notificationn';

            // تحديد ملف JSON المناسب بناءً على الوقت
            var currentTime = new Date().toLocaleString('en-US', {timeZone: 'Africa/Cairo', hour12: false}).split(',')[1].split(':')[0]; // الحصول على الساعة الحالية في القاهرة
            var zekrFile;
            if (currentTime < 12) {
                zekrFile = 's.json';
            } else {
                zekrFile = 'm.json';
            }

            // تحميل ملف JSON واستخدام الذكر العشوائي
            fetch(zekrFile)
                .then(response => response.json())
                .then(data => {
                    var randomZekrIndex = Math.floor(Math.random() * data.content.length);
                    var randomZekr = data.content[randomZekrIndex].zekr;

                    notificationn.innerHTML = `
                        <h1>😊</h1>
                        <p>${randomZekr}</p>
                    `;
                    document.body.appendChild(notificationn);

                    setTimeout(function() {
                        notificationn.style.display = 'none';
                    }, 7000); // 5 ثوانٍ
                });
        };
        
        

    </script>

<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>




