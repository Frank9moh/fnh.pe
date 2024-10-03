<!DOCTYPE html>
<html lang="ar">
<head>
	<title>𝓕𝓷𝓱</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css1/util.css">
	<link rel="stylesheet" type="text/css" href="css1/main.css">
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
   
    
     .notification {
            background-color: #f44336; /* لون الخلفية */
            color: white; /* لون النص */
            text-align: center; /* محاذاة النص بالوسط */
            padding: 20px; /* تباعد داخلي */
            position: fixed; /* ثابت في الأعلى */
            width: 100%; /* العرض */
            z-index: 1000; /* تحديد الطبقة */
            top: 0; /* الإرتفاع بالنسبة للشاشة */
            display: none; /* إخفاء الشريط بشكل افتراضي */
            animation: slideDown 0.5s ease; /* تحديد تأثير الظهور */
        }

        /* تأثير الانزلاق لأسفل */
        @keyframes slideDown {
            from {
                top: -50px; /* الإرتفاع بالنسبة للشاشة */
            }
            to {
                top: 0; /* الإرتفاع بالنسبة للشاشة */
            }
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
            animation: slideDown 1s forwards, fadeOut 1s forwards 6s; /* تأثير النزول والتلاشي */
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
        
.banner-container {

position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      overflow: hidden;
      background-color: #007bff;
      color: white;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      animation: fadeOut 12s forwards; /* تم تعديل هذا السطر */
    }

    .banner-text {
      display: inline-block;
      white-space: nowrap;
      animation: scrollText 14s linear infinite, fadeIn 4s;
      font-size: 1.2em;
    }

    .banner-text a {
      color: yellow;
      font-weight: bold;
      text-decoration: underline;
    }

    @keyframes scrollText {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(100%);
      }
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    @keyframes fadeOut {
      0% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        opacity: 0;
      }
    }
</style>
</head>
<body>
<!-- شريط الإشعار -->
    <div class="notification" id="notification">
        يجب اختيار مادة أولاً.
    </div>
	<center>
	<div class="limiter">
		<div class="container-login100">
		<div class="banner-container">
    <div class="banner-text">يمكنك الحصول علي كتاب المفاهيم ومعاينته من <a href="https://moe.gov.eg/openbook/Concepts/science/index.html#p=1"> هــــــــنــــــــا </a>!</div>
  </div>
			<div class="wrap-login100">
			
				<form class="login100-form validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
				  
    <span class="login100-form-title" style="font-size:60px;">
        𝓕𝓷𝓱
    </span>
    <br><br><br><br>
    <span class="login100-form-title" style="font-size:30px;">
        اختر المادة التي تريد مراجعتها 😊
    </span>
    <br><br>
    <div class="wrap-input100 validate-input" data-validate="إختار مادة الاول يا حب">
        <select name="part" id="part" class="input100">
            
    <option value="#">إختر مادة </option>
        <option value="عربي">اللغة العربية 🇪🇬 </option>
        <option value="إنجليزي">اللغة الإنجليزية 🇬🇧 </option>
        <option value="فرنساوي">اللغة الفرنسية 🇫🇷 </option>
        <option value="ألماني">اللغة الألمانية 🇩🇪 </option>
        <option value="فيزياء">فيزياء 💡 </option>
        <option value="كيمياء">كيمياء 🧪 </option>
        <option value="أحياء">احياء 🧬 </option>
        <option value="جيولوجيا">جيولوجيا 🌏 </option>
        <option value="جغرافيا">جغرافيا 🗺</option>
        <option value="تاريخ">تاريخ 🎞</option>
        <option value="فلسفة">فلسفة 🗣</option>
        <option value="علم-نفس">علم نفس واجتماع 👥️️</option>
        
        
        <!-- قم بإضافة المزيد من الخيارات حسب الحاجة -->
        </select>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-list" aria-hidden="true"></i>
        </span>
    </div>
    <br><br>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="button" name="submit" id="submitBtn">انطلق ⚡️</button>
    </div>
    <br><br>
    <div class="login100-pic js-tilt" data-tilt>
        <h1><p  style="font-size:28px; width:100%; height:100%;">♡ تم إضافة كل المواد عدا < الإيطالي فجارٍ تحضير بنك الأسئلة > . 🤍<br>
        ○ سيتم تحديث بنك الأسئلة اسبوعياً في كل مادة لنضمن لكم تجربة افضل . 😍
        <br>
        ● أسرة 𝓕𝓷𝓱 تتمني لكم دوام التفوق ♡
        <br>
        🧑‍💻 المطور :《 Abdullah El-qary 》 
        </p>
    </h1>            
    </div>
</form>

<div class="waiting-message" id="waitingMessage" style="display: none;">
    <br>
    <h1 style="font-size:50px;">من فضلك انتظر ...</h1>
    <br>
    <p style="font-size:40px;">سيتم تحويلك إلى الصفحة المطلوبة في وقت قصير.</p>
    <br>
    <div class="spinner-border text-primary" role="status">
        <br>
        <span class="visually-hidden">Loading...</span>
        <br>
    </div>
    <br>
</div>
	


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
                    }, 9000); // 5 ثوانٍ
                });
        };
        
        
          // انتظار تحميل الصفحة
        document.addEventListener("DOMContentLoaded", function() {
            // الحصول على العنصر الذي يحتوي على شريط الإشعار
            var notification = document.getElementById('notification');

            // الإظهار والإخفاء الآلي لشريط الإشعار
            function showNotification() {
                // إظهار شريط الإشعار
                notification.style.display = 'block';

                // إخفاء شريط الإشعار بعد 3 ثواني
                setTimeout(function() {
                    notification.style.display = 'none';
                }, 3000); // 3000 مللي ثانية = 3 ثواني
            }

            // التحقق من اختيار المستخدم قبل تحريك الزر
            var submitBtn = document.getElementById('submitBtn');
            var select = document.getElementById('part');

            submitBtn.addEventListener('click', function(event) {
                // تجنب تحميل الصفحة مرة أخرى
                event.preventDefault();

                // التحقق من اختيار المستخدم
                if (select.value === '#') {
                
                    // إظهار شريط الإشعار
                    showNotification();
                
                    // تحريك الزر
                    submitBtn.classList.add('bounce');
                    setTimeout(function() {
                        submitBtn.classList.remove('bounce');
                    }, 500);

           }else{
           
            // تحميل ملفات الأسئلة والإجابات المناسبة
        var part = select.value;
        // عرض الأسئلة
        // إظهار رسالة الانتظار وتحديث المحتوى
        // إخفاء عنصر النموذج بعد الضغط
document.querySelector('.login100-form').style.display = 'none';
var waitingMessage = document.getElementById('waitingMessage');
waitingMessage.style.display = 'block';
setTimeout(function() {
    window.location.href = '/' + part + '/index.php';
}, 2000);
           
    }
            
            
            });
        });
    </script>
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
		
		
	</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>



