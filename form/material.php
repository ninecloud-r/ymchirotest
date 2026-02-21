<?php 
/**
 * フォームプログラム：整体院てくてく様専用・スパム対策強化版
 */

// --- 1. スパム対策（送信ボタンが押された瞬間に実行） ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // A. ハニーポットチェック（隠しフィールドに入力があればボット）
    if (!empty($_POST['trap_field'])) {
        die("スパムの疑いがあるため送信をブロックしました。");
    }

    // B. 日本語（ひらがな）チェック：
    // お問い合わせ内容が「入力されている場合のみ」、ひらがなチェックを行う
    $comment = isset($_POST['お問い合わせ内容']) ? $_POST['お問い合わせ内容'] : '';
    if (!empty($comment)) { // ← ここを修正：中身がある時だけチェック
        if (!preg_match('/[ぁ-ん]/u', $comment)) {
            die("エラー：お問い合わせ内容は日本語（ひらがな）で入力してください。");
        }
    }
}

header("Content-Type:text/html;charset=UTF-8"); 
?>
<?php

// --- 2. 基本設定 ---

// このファイルの名前
$script ="material.php";

// 管理者がメールを受け取るアドレス（てくてく様のアドレス）
$to = "tekutekuseitai@gmail.com";

// 送信者欄（From）や返信先に表示させる管理者アドレス
$cc = "tekutekuseitai@gmail.com";

// 送信されるメールのタイトル
$sbj = "【整体院てくてく】お問い合わせ・予約";

// 送信確認画面の表示(する=1, しない=0)
$chmail = 1;

// 1:送信後に自動的にジャンプ / 0:送信終了画面表示
$jpage = 1; 

// 送信後にジャンプするページ（サイトのURLを動的に取得）
// $_SERVER['HTTP_HOST'] を使うことで、どのドメインでも "/thanks/" へ飛ばせます
$protocol = (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') ? 'http://' : 'https://';
$next = $protocol . $_SERVER['HTTP_HOST'] . "/thanks/";

// 差出人は、送信者のメールアドレスにする(する=1, しない=0)
$from_add = 1;

// 差出人（お客様）に自動返信メールを送る(送る=1, 送らない=0)
$remail = 1;

// 自動返信メールのタイトル
$resbj = "【整体院てくてく】お問い合わせ内容のご確認";

// 必須入力項目を設定する(する=1, しない=0)
$esse = 1;

// 必須入力項目のname
$eles = array('お名前', 'email', '電話番号');


// --- 3. メールの送信・確認処理 ---

$sendm = 0;
if (isset($_POST['eweb_set']) && $_POST['eweb_set'] == "eweb_submit") {
    $sendm = 1;
}

// 必須項目チェック
$errm = "";
if($esse == 1 && !isset($_POST['eweb_set'])) {
    $flag = 0;
    foreach($eles as $val) {
        if(empty($_POST[$val])) {
            $errm .= "<div class='error'>「".$val."」は必須入力項目です</div>\n";
            $flag = 1;
        }
    }
    
    if($flag == 1){
        htmlHeader();
        echo $errm;
        echo '<div class="submit-btn-wrapper"><input type="button" value="戻る" onClick="history.back()"></div>';
        htmlFooter();
        exit(0);
    }
}

// 管理者宛メール本文
$body = "「".$sbj."」の送信がありました \n\n";
$body .= "-------------------------------------------------\n\n";
foreach($_POST as $key => $var) {
    if($key == "eweb_set" || $key == "trap_field") continue; // 内部用フィールドは除外
    $body .= "[".$key."] ".$var."\n";
}
$body .= "\n-------------------------------------------------\n\n";
$body .= "送信日時：".date( "Y/m/d (D) H:i:s")."\n";
$body .= "ホスト：".gethostbyaddr($_SERVER['REMOTE_ADDR'])."\n\n";

// お客様宛・自動返信メール本文
if($remail == 1) {
    $rebody = "整体院てくてく です。\n";
    $rebody .= "お問い合わせ頂き、誠に有難うございます。\n\n";
    $rebody .= "このメールは、ご入力いただいたメールアドレスへ\n";
    $rebody .= "自動送信させて頂いております。\n\n";
    $rebody .= "以下の内容で送信を受け付けました。\n";
    $rebody .= "内容を確認の上、改めてご連絡させていただきますので、\n";
    $rebody .= "今しばらくお待ちいただけますようお願いいたします。\n\n";
    $rebody .= "-------------------------------------------------\n\n";
    foreach($_POST as $key => $var) {
        if($key == "eweb_set" || $key == "trap_field") continue;
        $rebody .= "[".$key."] ".$var."\n";
    }
    $rebody .= "\n-------------------------------------------------\n\n";
    $rebody .= "【整体院てくてく】\n";
    $rebody .= "TEL：046-204-8003\n";
    $rebody .= "Email：tekutekuseitai@gmail.com\n";
    $rebody .= "送信日時：".date( "Y/m/d (D) H:i:s")."\n";
    
    $reto = $_POST['email'];
    $reheader = "From: $cc\nReply-To: $cc\nContent-Type: text/plain;charset=UTF-8\nX-Mailer: PHP/".phpversion();
}

// 送信処理
$header = "Content-Type: text/plain;charset=UTF-8\nX-Mailer: PHP/".phpversion();
if($from_add == 1 && !empty($_POST['email'])) {
    $from = $_POST['email'];
    $header .= "\nFrom: $from\nReply-To: $from";
}

if($sendm == 1) {
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    mail($to, $sbj, $body, $header);
    if($remail == 1) { 
        mail($reto, $resbj, $rebody, $reheader); 
    }
}
else { 
    // 確認画面の表示
    htmlHeader();
?>
    <p class="btn-wrapper-message">以下の内容で間違いがなければ、「送信する」ボタンを押してください。</p>
    <form action="<?php echo $script; ?>" method="POST">
    <div class="table-wrapper">
        <table class="form-tbl">
        <?php
        foreach($_POST as $key => $var) {
            if($key == "trap_field") continue; // ハニーポットは表示しない
            $var_display = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
            echo "<tr><td class=\"td02\">".htmlspecialchars($key, ENT_QUOTES, 'UTF-8')."</td><td class=\"td01\">".nl2br($var_display)."</td></tr>\n";
            echo '<input type="hidden" name="'.htmlspecialchars($key, ENT_QUOTES, 'UTF-8').'" value="'.$var_display.'">';
        }
        ?>
        </table>
    </div>
    <div class="submit-btn-wrapper">
        <input type="hidden" name="eweb_set" value="eweb_submit">
        <input type="submit" value="送信する">
        <input type="button" value="前画面に戻る" onClick="history.back()">
    </div>
    </form>
<?php 
    htmlFooter(); 
    exit;
} 

// 完了画面
if($jpage == 1) {
    header("Location: ".$next);
    exit;
} else {
    htmlHeader();
?>
    <p class="thankyou-message">お問い合わせありがとうございました。</p>
<?php 
    htmlFooter(); 
}

// 共通レイアウト
function htmlHeader() { ?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ確認 | 整体院てくてく</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
        body { font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif; color: #333; line-height: 1.6; background: #fff; margin: 0; padding: 0; }
        .form-wrapper { padding: 40px 20px; max-width: 700px; margin: auto; }
        .btn-wrapper-message { text-align: center; margin-bottom: 20px; font-weight: bold; }
        .table-wrapper { margin-bottom: 30px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
        .form-tbl { width: 100%; border-collapse: collapse; }
        .form-tbl td { border-bottom: 1px solid #ddd; padding: 15px; }
        .td02 { background: #fdfbf6; width: 30%; font-weight: bold; color: #66270a; }
        .td01 { background: #fff; }
        @media screen and (max-width: 600px) {
            .form-tbl td { display: block; width: 100%; box-sizing: border-box; }
            .td02 { border-bottom: none; padding-bottom: 5px; }
            .td01 { padding-top: 5px; }
        }
        .submit-btn-wrapper { text-align: center; gap: 15px; display: flex; flex-direction: column; align-items: center; }
        input[type="submit"], input[type="button"] { width: 100%; max-width: 300px; padding: 15px; border-radius: 30px; border: none; font-size: 16px; cursor: pointer; transition: 0.3s; }
        input[type="submit"] { background: #66270a; color: #fff; font-weight: bold; }
        input[type="submit"]:hover { background: #3d1d08; }
        input[type="button"] { background: #bdc3c7; color: #fff; }
        .error { color: #e74c3c; font-weight: bold; text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="form-wrapper">
<?php } 

function htmlFooter() { ?>
</div>
</body>
</html>
<?php } ?>