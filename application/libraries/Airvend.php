<?php

class Airvend {

    public function CallVTU($amount, $network, $username, $pass, $refid, $phone) {
        $url = "http://api.airvendng.net/vtu/?username={$username}&password={$pass}&networkid={$network}&amount={$amount}&type=1&msisdn={$phone}&ref={$refid}";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            //CURLOPT_ENCODING => "",
            //CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "connection: Keep-Alive",
            // "content-type: text/html",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $obj = json_decode($json);
        if(is_object($obj)){
            if($obj->ResponseCode ==0){
                return TRUE;
            }
        }

        return FALSE;
    }

    public function Balance($username, $pass) {
        $url = "http://api.airvendng.net/vtu/balance.php?username={$username}&password={$pass}";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            //CURLOPT_ENCODING => "",
            //CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "connection: Keep-Alive",
            // "content-type: text/html",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $obj = json_decode($json);

        if(is_object($obj)){
            return $obj->Balance;
//           return $obj->BalanceResponse->Balance;
        }

        return FALSE;
    }

}
