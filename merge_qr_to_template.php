<?php
$id = $_GET['id'] ?? 0;
if (!$id) {
    die("❌ No ID provided.");
}

$backgroundPath = 'img/QRTEMP.png';
$qrPath = "qr/user_$id.png";
$outputPath = "merged/merged_user_$id.png";

// Validate QR file exists
if (!file_exists($qrPath)) {
    die("❌ QR not found for ID $id.");
}

// Load images
$background = imagecreatefrompng($backgroundPath);
$qr = imagecreatefrompng($qrPath);

// Resize QR to 190x190
$qrTargetSize = 190;
$qrResized = imagecreatetruecolor($qrTargetSize, $qrTargetSize);
imagealphablending($qrResized, false);
imagesavealpha($qrResized, true);
imagecopyresampled(
    $qrResized,
    $qr,
    0, 0, 0, 0,
    $qrTargetSize, $qrTargetSize,
    imagesx($qr), imagesy($qr)
);

// Place QR on template at X=700, Y=200
$targetX = 700;
$targetY = 200;
imagecopy($background, $qrResized, $targetX, $targetY, 0, 0, $qrTargetSize, $qrTargetSize);

// Add ID text below QR
$textColor = imagecolorallocate($background, 0, 0, 0); // Black color
$fontPath = __DIR__ . '/arial.ttf'; // Optional: TTF font

// Place text below the QR image
$textX = $targetX + 30; // Adjust to center text
$textY = $targetY + $qrTargetSize + 25;

if (file_exists($fontPath)) {
    imagettftext($background, 18, 0, $textX, $textY, $textColor, $fontPath, "ID = $id");
} else {
    imagestring($background, 5, $textX, $textY - 10, "ID = $id", $textColor);
}

// Save output
if (!is_dir('merged')) {
    mkdir('merged');
}
imagepng($background, $outputPath);

// Display the image
header('Content-Type: image/png');
readfile($outputPath);
exit;
?>
