<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body class="cyberpunk-bg">
    <div class="login-box">
      <h2>
      <?php
function validateUsername($name) {
  // ひらがな・カタカナ・漢字、20文字以内
  if (mb_strlen($name) > 20 || !preg_match('/^[ぁ-んァ-ヶ一-龥々ー]+$/u', $name)) {
    return "20文字以内で名前を入力してください。記号等は利用できません。";
  }
  return null;
}

function validateAddress($address) {
  // ひらがな・カタカナ・漢字・数字（全角・半角）・ハイフン、30文字以内
  if (mb_strlen($address) > 30 || !preg_match('/^[ぁ-んァ-ヶ一-龥々ー0-9０-９\-]+$/u', $address)) {
    return "30文字以内で住所を入力してください。記号等は利用できません。";
  }
  return null;
}

function validateEmail($email) {
  // メールアドレス形式 + 許可された記号のみ
  if (!preg_match('/^[a-zA-Z0-9._\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/', $email)) {
    return "正しいメールアドレス形式で入力してください。記号は.-_@のみ利用可能。";
  }
  return null;
}

$username = $_GET['username'] ?? '';
$useraddress = $_GET['useraddress'] ?? '';
$usermail = $_GET['usermail'] ?? '';

$errors = [
  'username' => validateUsername($username),
  'useraddress' => validateAddress($useraddress),
  'usermail' => validateEmail($usermail),
];

// エラーがあれば表示
if ($errors['username'] || $errors['useraddress'] || $errors['usermail']) {
  if ($errors['username']) echo htmlspecialchars($errors['username'], ENT_QUOTES, 'UTF-8') . "<br>";
  if ($errors['useraddress']) echo htmlspecialchars($errors['useraddress'], ENT_QUOTES, 'UTF-8') . "<br>";
  if ($errors['usermail']) echo htmlspecialchars($errors['usermail'], ENT_QUOTES, 'UTF-8') . "<br>";
} else {
  echo "あなたが入力した値<br>";
  echo "名前：" . htmlspecialchars($username, ENT_QUOTES, 'UTF-8') . "<br>";
  echo "住所：" . htmlspecialchars($useraddress, ENT_QUOTES, 'UTF-8') . "<br>";
  echo "メールアドレス：" . htmlspecialchars($usermail, ENT_QUOTES, 'UTF-8');
}
?>
    </h2>
    </div>
  </body>
</html>
