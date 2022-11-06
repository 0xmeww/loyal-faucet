<?php
echo "[!] Tools ini berfungsi untuk mengambil faucet pada loyal-testnet \n";
echo "[*] Jika response sudah mencapai batas. silahkan tekan ctrl + C\n";
echo "[?] Masukan address wallet loyal anda : ( contoh : loyal1kkjqytsnegs8q7d2cezx7flj5jluw0dawys5dd )\n";
$wallet = trim(fgets(STDIN));

function faucet($wallet,$i){
$body = '{
        "address": "'.$wallet.'",
        "coins": [
          "1000000ulyl"
        ]
      }';
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://faucet.joinloyal.io/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

$headers = array();
$headers[] = 'Host: faucet.joinloyal.io';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:106.0) Gecko/20100101 Firefox/106.0';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
//$headers[] = 'Accept-Encoding: gzip, deflate';
$headers[] = 'Referer: https://faucet.joinloyal.io/';
$headers[] = 'Content-Type: application/json';
//$headers[] = 'Content-Length: 99';
$headers[] = 'Origin: https://faucet.joinloyal.io';
$headers[] = 'Connection: close';
$headers[] = 'Cookie: amp_fef1e8=0e8ac9cc-6e0e-4a93-a62c-2e95b10e5104R...1gh6povb7.1gh6povb7.g.2.i; _ga=GA1.2.407771471.1667687241; _gid=GA1.2.665881097.1667687241; __cuid=5171dda362af4088b709f78880099ae1';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if ($result == "{}"){
    echo "(Y) Berhasil mendapatkan. \n";
} else {
    echo "(X) Sudah mencapai maksimal. \n";
    }
}

$jumlah = 100;
for($i=1;$i<$jumlah;$i++){
    echo " **** PROSES MENGAMBIL SALDO FAUCET **** \n";
    $liat = faucet($wallet,$i);
}
?>
