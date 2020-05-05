<?php

    /**
     * @Author: Ufuk OZDEMIR
     * @Created: 5.05.2020 15:53
     * @Project: google-api-php-client-2.4.1
     * @Web: https://www.ufukozdemir.website/
     * @Mail: ufuk.ozdemir1990@gmail.com
     * @Phone: +90 (532) 131 73 07
     */

    class Analytics {

        /**
         * @var Google_Service_Analytics
         */
        private $analytics;

        /**
         * @var string
         */
        private $view_id = 'xxxxxxx';

        /**
         * Google constructor.
         */
        public function __construct ()
        {
            require __DIR__ . '/vendor/autoload.php';
            $client = new Google_Client();
            try {
                $client->setAuthConfig(__DIR__ . '/your.json');
                $client->setScopes('https://www.googleapis.com/auth/analytics.readonly');
                $this->analytics = new Google_Service_Analytics($client);
            } catch (Google_Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }

        /**
         * @return false|string
         */
        public function view ()
        {
            $chart = $this->analytics->data_ga->get(
                'ga:' . $this->view_id,
                '30daysAgo',
                'today',
                'ga:sessions, ga:pageviews',
                array('dimensions' => 'ga:date')
            );

            $data = array();
            foreach ($chart->getRows() as $row => $item) {
                $data[$row]['label'] = date('d.m.Y', strtotime($item[0]));
                $data[$row]['y'] = $item[1];
            }
            return json_encode($data, JSON_NUMERIC_CHECK);
        }

        /**
         * @return false|string
         */
        public function session ()
        {
            $chart = $this->analytics->data_ga->get(
                'ga:' . $this->view_id,
                '30daysAgo',
                'today',
                'ga:sessions, ga:pageviews',
                array('dimensions' => 'ga:date')
            );

            $data = array();
            foreach ($chart->getRows() as $row => $item) {
                $data[$row]['label'] = date('d.m.Y', strtotime($item[0]));
                $data[$row]['y'] = $item[2];
            }
            return json_encode($data, JSON_NUMERIC_CHECK);
        }

        /**
         * @return false|string
         */
        public function device ()
        {
            $chart = $this->analytics->data_ga->get(
                'ga:' . $this->view_id,
                '30daysAgo',
                'today',
                'ga:users',
                array(
                    'dimensions' => 'ga:deviceCategory',
                    'sort' => '-ga:users'
                )
            );

            $data = array();
            foreach ($chart->getRows() as $row => $item) {
                $data[$row]['label'] = ucfirst($item[0]);
                $data[$row]['y'] = $item[1];
            }
            return json_encode($data, JSON_NUMERIC_CHECK);
        }

        /**
         * @return false|string
         */
        public function browser ()
        {
            $chart = $this->analytics->data_ga->get(
                'ga:' . $this->view_id,
                '30daysAgo',
                'today',
                'ga:users',
                array(
                    'dimensions' => 'ga:browser',
                    'sort' => '-ga:users',
                    'max-results' => '5'
                )
            );

            $data = array();
            foreach ($chart->getRows() as $row => $item) {
                $data[$row]['label'] = ucfirst($item[0]);
                $data[$row]['y'] = $item[1];
            }
            return json_encode($data, JSON_NUMERIC_CHECK);
        }

        /**
         * @return false|string
         */
        public function traffic ()
        {
            $chart = $this->analytics->data_ga->get(
                'ga:' . $this->view_id,
                '30daysAgo',
                'today',
                'ga:users',
                array(
                    'dimensions' => 'ga:socialNetwork, ga:fullReferrer',
                    'sort' => '-ga:users',
                    'max-results' => '5'
                )
            );

            $data = array();
            foreach ($chart->getRows() as $row => $item) {
                $data[$row]['label'] = ucfirst($item[1]);
                $data[$row]['y'] = $item[2];
            }
            return json_encode($data, JSON_NUMERIC_CHECK);
        }

    }