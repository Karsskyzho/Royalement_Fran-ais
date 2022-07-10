<?php

    namespace Library\API;

    class ApiGouv
    {
        protected string $baseUrl = "https://geo.api.gouv.fr";

        public function sendRequest(string $endpoint, string $code): ?array
        {
            $url = "$this->baseUrl.$endpoint/$code";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

            $resp = curl_exec($curl);
            $result = json_decode($resp, true);
            curl_close($curl);

            if (!$result) {
                return null;
            }
            return $result;
        }

        public function getRegion(string $code): ?array
        {
            return $this->sendRequest('/regions', $code);
        }

        public function getDepartement(string $code): ?array
        {
            return $this->sendRequest('/departements', $code);
        }

        public function getCity(string $code): ?array
        {
            return $this->sendRequest('/communes', $code);
        }
    }