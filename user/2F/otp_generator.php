<?php
function generateOTP($length = 6) {
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= mt_rand(0, 9);
    }
    echo $otp;
    return $otp;
}
//$generatedOTP = generateOTP();
//echo "Returned OTP: $generatedOTP<br>"; // Display the returned OTP
?>
