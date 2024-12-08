<?php

$sayisal_dogru = $_POST["sayisaltrue"];
$sayisal_yanlis = $_POST["sayisalfalse"];
$sozel_dogru = $_POST["sozeltrue"];
$sozel_yanlis =$_POST["sozelfalse"];
$basaripuan = $_POST["html_obp"];
$alani = $_POST["alan"];
$tarih = $_POST["html_tarih"];

if (empty($basaripuan))
{
    echo "OBP alanini bos biraktiginizdan puaniniz hesaplanamamistir.";
    exit;
}

settype($sayisal_dogru,"integer");
settype($sayisal_yanlis,"integer");
settype($sozel_dogru,"integer");
settype($sozel_yanlis,"integer");
settype($basaripuan,"integer");

$say_net = $sayisal_dogru - ($sayisal_yanlis/4);
$soz_net = $sozel_dogru - ($sozel_yanlis/4);

if ($tarih == "evet")
{
    $obp = $basaripuan * 0.30;
}
else if ($tarih == "hayir")
{
    $obp = $basaripuan * 0.60;
}

if ($alani == "say")
{
    $ek_puan = 250;
    $say_katsayi= 3;
    $soz_katsayi = 0.6;
    $esit_katsayi = 1.8;
}
else if ($alani =="soz")
{
    $ek_puan = 120;
    $say_katsayi = 0.6;
    $soz_katsayi = 3;
    $esit_katsayi = 1.8;
}
else if ($alani == "esit")
{
    $ek_puan = 222;
    $say_katsayi = 1.8;
    $soz_katsayi = 1.8;
}
switch($alani)
{
    case "say":
        echo "Alaniniz:Sayisal"; break;
    case "soz":
        echo "Alaniniz:Sozel"; break;
    case "esit":
        echo "Alaniniz:Esit Agirlik"; break; 
}
echo "<br>";
echo "Sayisal netiniz: ". $say_net ."<br>";
echo "Sozel netiniz: ". $soz_net;


$dgs_puan = ($say_net * $say_katsayi) + ($soz_net * $soz_katsayi) + $obp + $ek_puan;

echo "<br>"."DGS Puanınız:"." ".$dgs_puan ;

;






