<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header('Location: index.php');
    exit;
}

// Get the specialization counts from the session
$specializationCounts = $_SESSION['specialization_counts'] ?? [
    'software_engineering' => 0,
    'artificial_intelligence' => 0,
    'network_engineering' => 0,
    'information_systems' => 0,
];

// Determine the suggested specialization
$suggestedSpecialization = array_search(max($specializationCounts), $specializationCounts);

// Map specialization keys to Arabic names
$specializationNames = [
    'software_engineering' => 'هندسة البرمجيات',
    'artificial_intelligence' => 'الذكاء الاصطناعي',
    'network_engineering' => 'هندسة الشبكات',
    'information_systems' => 'نظم المعلومات',
];

// Get the Arabic name of the suggested specialization
$suggestedSpecializationName = $specializationNames[$suggestedSpecialization] ?? 'غير محدد';

// Clear the session data
unset($_SESSION['responses']);
unset($_SESSION['specialization_counts']);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تم الانتهاء</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="completion-container">
        <img src="Logo.png" alt="شعار الصفحة">
        <h2>Computerized Choice Compass</h2>

        <h1>تم الانتهاء من الاستبيانات!</h1>
        <p>شكرًا لك على المشاركة. بناءً على إجاباتك، نوصي بالتخصص التالي:</p>
        <center><h2><?php echo $suggestedSpecializationName; ?></h2></center>
		</br>

        <!-- Navigation Buttons -->
        <center >
            <a href="contact_us.php" ><button >تواصل معنا</button></a> 
			</br>
			</br>
           <a href="computer_specializations.php" > <button style="width:200px;">التخصصات في سوق العمل</button></a>
        </center>

        <p>يمكنك <a href="logout.php">تسجيل الخروج</a> أو <a href="welcome.php">العودة إلى الصفحة الرئيسية</a>.</p>
    </div>
</body>
</html>
