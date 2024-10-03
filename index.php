<?php
$password = "UlraFNH"; // Password
// قم بتعيين مدة الجلسة إلى 24 ساعة (86400 ثانية)
ini_set('session.gc_maxlifetime', 86400);
// Define an array of allowed passwords
$allowed_passwords = array("Frank", "UlraFNH", "menna","hager12","aya","B002","FNH-0V","Ahmed+08","Ali_6","v12z","x6tf","mad66p","raf442","has820","3oohc","حياة كريمة","حياة كريمه","حياه كريمه","حياه كريمة","الادهم","الأدهم","sha3ban","c"); // Add your desired passwords here
(!isset($_SESSION) ? session_start() : $uselessvar = true);



// Simple configuration.
$tolen = 64; // Token Length (default is 64)
$nobrute = false; // Enable/Disable Anti-Brute-Force Feature.

// Anti-Brute-Force Settings.
$brutecount = 10; // Number of tries before temporarily banned.
$maxbrutecount = 20; // Number of tries before permanently banned.
$brutetimeout = 5; // Time length of temporary ban (5*60 = 5 mins; 6*60 = 6 mins.. so on...).

$max_execution_time = (int)$brutetimeout + 1;
ini_set('max_execution_time', $max_execution_time); // this fixes a fatal bug in PHP.

if (isset($_SESSION['failed-attempts'])) {

	if ($_SESSION['failed-attempts'] >= $brutecount && $_SESSION['failed-attempts'] <= $maxbrutecount) {

		echo "Temporarily banned. Please wait " . (string)$brutetimeout . " seconds.";

		ob_end_flush();

		flush();
		sleep($brutetimeout);

	} else if ($_SESSION['failed-attempts'] >= $maxbrutecount) {

		die("Permanently banned due to too many failed attempts.");

	}

}


function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
	$str = '';
	$max = mb_strlen($keyspace, '8bit') - 1;
	for ($i = 0; $i < $length; ++$i) {
		$str .= $keyspace[random_int(0, $max)];
	}
	return $str;
	/*
	Usage:
	$a = random_str(32);
	$b = random_str(8, 'abcdefghijklmnopqrstuvwxyz');
	*/
}


if (isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	echo "Logged out successful.";
} 

if (isset($_SESSION['one-page'])) {
	if ($_SESSION['one-page'] == base64_encode($_SESSION['token'].sha1($password))) {

		(!isset($_SESSION['failed-attempts']) ? $_SESSION['failed-attempts'] = 1 : $_SESSION['failed-attempts'] = 1);
?>

<?php
include_once("main.html");
?>

<?php
		die();
	}
}

if (isset($_POST['password'])) {
    $pass = $_POST['password'];
    if (in_array($pass, $allowed_passwords)) { // Check if the entered password is in the array of allowed passwords
        // Rest of your code here...
		// (tolen == 64 ? $_SESSION['token'] = random_str(64) : $_SESSION['token'] = random_str(tolen));
		$_SESSION['token'] = random_str($tolen);
		$_SESSION['one-page'] = base64_encode($_SESSION['token'].sha1($password)); // not the best encryption/hashing, but it POST's the job done.
		$self = $_SERVER['PHP_SELF'];
		header("Location: $self");
	} else {
		$file_content = file_get_contents('f.txt');
echo $file_content;

		if ($nobrute == true) {

			(!isset($_SESSION['failed-attempts']) ? $_SESSION['failed-attempts'] = 1 : $_SESSION['failed-attempts']++);

			if ($_SESSION['failed-attempts'] < $brutecount) {
				// echo "<br />" . $brutecount - $attempts . " requests left before temp-ban.";

				(($_SESSION['failed-attempts'] == 10) ? header("Location: PHP_SELF") : $useless = true);
				
				echo ($brutecount + 1) - ($_SESSION['failed-attempts'] + 1)." requests left before temp-ban.";
			} else if ($_SESSION['failed-attempts'] < $maxbrutecount) {
				// echo "<br />" . $maxbrutecount - $attempts . " requests left before perma-ban.";

				echo $maxbrutecount - $_SESSION['failed-attempts']." requests left before perma-ban.";
			}

			echo "<br /><strong style='color: red;'>Failed Attempts: " . $_SESSION['failed-attempts'] . "</strong>";

		} else if ($nobrute == false) {
			// anti-brute-force system disabled/
			(!isset($_SESSION['failed-attempts']) ? $_SESSION['failed-attempts'] = 1 : $_SESSION['failed-attempts'] = 1);

		}
	}
}
?>

<?php
include_once("login.html");
?>
