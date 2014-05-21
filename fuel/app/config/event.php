<?php

return array(
    'fuelphp' => array(
        'app_created' => function()
            {
                // After FuelPHP initialised
            },
        'request_created' => function()
            {
                // After Request forged
                if (file_exists(APPPATH.'tmp/down'))
                {
                    $data = array(
                        'code' => '',
                        'title' => '',
                        'content' => '',
                    );
                    // Set a HTTP 503 output header
                    Response::forge(render('common/maintenance', $data), 503)->send(true);
                    exit;
                }
            },
        'request_started' => function()
            {
                // Request is requested
            },
        'controller_started' => function()
            {
                // Before controllers before() method called
            },
        'controller_finished' => function()
            {
                // After controllers after() method called
            },
        'response_created' => function()
            {
                // After Response forged
            },
        'request_finished' => function()
            {
                // Request is complete and Response received
            },
        'shutdown' => function()
            {
                // Output has been send out
            },
    ),
);