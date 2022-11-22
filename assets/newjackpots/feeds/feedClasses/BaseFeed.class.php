<?php
namespace feedClasses;

class BaseFeed {

    protected $postData = null;
    protected $jsonJackpotUrl;
    protected $resultsJson;
    protected $replacementArray = array(' ', ',', '.');

    public function fetchResults($jsonData = null, $decode = true, $decodeFlag = true)
    {
        if (is_null($jsonData)) {
            $jsonData = $this->curlJackpot();
        } else {
            $this->resultsJson = $jsonData;
        }

        if ($decode) {
            $json = json_decode($jsonData, $decodeFlag);
            $this->resultsJson = $json;
        }

        return $json;
    }

    public function setPostData($data)
    {
        $this->postData = $data;

        return $this;
    }

    protected function curlJackpot()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->jsonJackpotUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING , "");

        if (isset($this->postData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postData);
        }

        $this->resultsJson = curl_exec($ch);

        curl_close($ch);

        return $this->resultsJson;
    }

}
