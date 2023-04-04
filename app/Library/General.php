<?php

namespace App\Library;
use Carbon\Carbon;

class General
{
    /**
     * @function used for checking logged in user has license expired or not.
     * @return bool
     */
    public function checkValidProductLicense($c_id = 0)
    {
        if($c_id != 0):
            $data = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client_product where c_id = {$c_id}");
            $license_exp_dt  = !empty($data[0]) ? $data[0]->cp_license_exp_dt : '';
            if (strtotime(Carbon::now()) > strtotime($license_exp_dt)):
                return false;
            else:
                return true;
            endif;
        else:
            return true;
        endif;
    }

    function sendSmsNew($data) {
        
        $url = "http://2factor.in/API/V1/fb5fd35d-eab0-11eb-8089-0200cd936042/SMS/".$data['MobileNumber']."/".$data['otp']."/OTPVerify";
        // OTP for Lifeplus Registration is {#var#}. 
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return json_decode($response,true);
    }
}