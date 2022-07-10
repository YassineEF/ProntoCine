<?php
abstract class Model
{
    public $curl;
    protected $data;

    // protected function __construct()
    // {
    // }
    // $page ? "&page=" . $page :  ""
    public function getData($curl, $option = [])
    {
        $this->curl = curl_init(getenv('API_BASEURL').$curl."?api_key=".getenv('API_KEY')."&language=en&" . http_build_query($option));
        //set Curl option
        curl_setopt_array($this->curl, [
            CURLOPT_SSL_VERIFYPEER => false,
            // CURLOPT_CAINFO => ROOT . 'config/cert.cer',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 1
        ]);
        //execute curl and stock the data in data
        $this->data = curl_exec($this->curl);
        //close  curl
        curl_close($this->curl);
        //check if data are false or not
        if ($this->data == false) {
            curl_error($this->curl);
        } else {
             $this->data = json_decode($this->data, true);
        }
        return $this->data;
    }
}
