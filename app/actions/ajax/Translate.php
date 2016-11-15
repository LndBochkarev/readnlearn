<?php

class Translate extends AbstractAjaxAction {

    public function execute() {


        //$random = rand(0, 100);
        //echo $random;

        $text = filter_input(INPUT_GET, 'text', FILTER_SANITIZE_STRING);


        $postFields = [
            'key' => $this->registry['translator_key'],
            'text' => $text,
            'lang' => 'en-ru',
            'format' => 'plain',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->registry['translator_url']);
        //curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);

        curl_exec($ch);

        curl_close($ch);
    }

}
