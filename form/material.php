<?php 
header("Content-Type:text/html;charset=UTF-8"); 
// CSSが必要な場合はここで読み込み（パスに注意してください）
// @include('css/css.php'); 
?>
<?php
/**
 * フォームプログラム：ナインクラウド様用最適化版
 */

// このファイルの名前（自身のファイル名に合わせてください）
$script ="material.php";

// メールを送信するアドレス
$to = "info@naikura.com";

// 送信者欄に表示させるアドレス
$cc = "info@naikura.com";

// 送信されるメールのタイトル
$sbj = "【ナインクラウド】お問い合わせ・予約";

// 送信確認画面の表示(する=1, しない=0)
$chmail = 1;

// 1:送信後に自動的にジャンプ / 0:送信終了画面表示
$jpage = 1; 

// 送信後にジャンプするページ（サンクスページがある場合）
$next = "https://yurari-chiro.nine-cloud.jp/thanks/";

// 差出人は、送信者のメールアドレスにする(する=1, しない=0)
$from_add = 1;

// 差出人に送信内容確認メールを送る(送る=1, 送らない=0)
$remail = 1;

// 差出人に送信確認メールを送る場合のメールのタイトル
$resbj = "【ナインクラウド】お問い合わせ内容のご確認";

// 必須入力項目を設定する(する=1, しない=0)
$esse = 1;

// 必須入力項目(入力フォームで指定したname)
$eles = array('お名前', 'email', '電話番号');

$sendm = 0;
if (isset($_POST['eweb_set']) && $_POST['eweb_set'] == "eweb_submit") {
    $sendm = 1;
}

// 未入力項目のチェック
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

// -------------------------------------------------
// 管理者宛メール本文の作成
// -------------------------------------------------
$body = "「".$sbj."」の送信がありました \n\n";
$body .= "-------------------------------------------------\n\n";
foreach($_POST as $key => $var) {
    if($key == "eweb_set") continue;
    $body .= "[".$key."] ".$var."\n";
}
$body .= "\n-------------------------------------------------\n\n";
$body .= "送信日時：".date( "Y/m/d (D) H:i:s")."\n";
$body .= "ホスト：".gethostbyaddr($_SERVER['REMOTE_ADDR'])."\n\n";

// -------------------------------------------------
// 自動返信メール本文の作成
// -------------------------------------------------
if($remail == 1) {
    $rebody = "ナインクラウド\n";
    $rebody .= "お問い合わせ頂き誠に有難うございます。\n\n";
    $rebody .= "このメールは、送信された際にご入力いただいた\n";
    $rebody .= "E-mailアドレスへ自動送信させて頂いております。\n\n";
    $rebody .= "以下の内容で送信を受け付けました。\n";
    $rebody .= "担当者より折り返しご連絡させていただきますので、\n";
    $rebody .= "今しばらくお待ちいただけますようお願いいたします。\n\n";
    $rebody .= "-------------------------------------------------\n\n";
    foreach($_POST as $key => $var) {
        if($key == "eweb_set") continue;
        $rebody .= "[".$key."] ".$var."\n";
    }
    $rebody .= "\n-------------------------------------------------\n\n";
    $rebody .= "ナインクラウド\n";
    $rebody .= "TEL：098-955-6065\n";
    $rebody .= "info@naikura.com\n";
    $rebody .= "送信日時：".date( "Y/m/d (D) H:i:s")."\n";
    
    $reto = $_POST['email'];
    $reheader = "From: $cc\nReply-To: $cc\nContent-Type: text/plain;charset=UTF-8\nX-Mailer: PHP/".phpversion();
}

// -------------------------------------------------
// メールの送信処理
// -------------------------------------------------
$header = "Content-Type: text/plain;charset=UTF-8\nX-Mailer: PHP/".phpversion();
if($from_add == 1 && !empty($_POST['email'])) {
    $from = $_POST['email'];
    $header .= "\nFrom: $from\nReply-To: $from";
}

if($sendm == 1) {
    // メール送信実行
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
            $var_display = htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
            echo "<tr><td class=\"td02\">".htmlspecialchars($key, ENT_QUOTES, 'UTF-8')."</td><td class=\"td01\">".$var_display."</td></tr>\n";
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

// 完了画面の表示
if($jpage == 1) {
    header("Location: ".$next);
    exit;
} else {
    htmlHeader();
?>
    <p class="thankyou-message">
    お問い合わせありがとうございました。<br>
    送信は無事に終了しました。</p>
<?php 
    htmlFooter(); 
}

// -------------------------------------------------
// 共通レイアウト関数
// -------------------------------------------------
function htmlHeader() { ?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ確認</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
        body { font-family: "Helvetica Neue", Arial, "Hiragino Kaku Gothic ProN", "Hiragino Sans", Meiryo, sans-serif; color: #333; line-height: 1.6; background: #fff; margin: 0; padding: 0; }
        .form-wrapper { padding: 40px 20px; max-width: 700px; margin: auto; }
        h1 { text-align: center; font-size: 24px; color: #e67e22; margin-bottom: 30px; }
        .btn-wrapper-message { text-align: center; margin-bottom: 20px; font-weight: bold; }
        .table-wrapper { margin-bottom: 30px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
        .form-tbl { width: 100%; border-collapse: collapse; }
        .form-tbl td { border-bottom: 1px solid #ddd; padding: 15px; }
        .td02 { background: #f2f2f2; width: 30%; font-weight: bold; }
        .td01 { background: #fff; }
        
        /* スマホ用：表を縦並びにする */
        @media screen and (max-width: 600px) {
            .form-tbl td { display: block; width: 100%; box-sizing: border-box; }
            .td02 { border-bottom: none; padding-bottom: 5px; background: #f2f2f2; }
            .td01 { padding-top: 5px; }
        }

        .submit-btn-wrapper { text-align: center; gap: 15px; display: flex; flex-direction: column; align-items: center; }
        input[type="submit"], input[type="button"] { 
            width: 100%; max-width: 300px; padding: 15px; border-radius: 30px; border: none; font-size: 16px; cursor: pointer; transition: 0.3s; 
        }
        input[type="submit"] { background: #e67e22; color: #fff; font-weight: bold; }
        input[type="submit"]:hover { background: #d35400; }
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