<?php
// config/hdfc.php

return [
    'HDFC' => [
        'API_KEY' => 'B045A3211BA4E2DA64A14D2A59C8DB',
        'MERCHANT_ID' => 'SG880',
        'PAYMENT_PAGE_CLIENT_ID' => 'hdfcmaster',
        'BASE_URL' => 'https://smartgatewayuat.hdfcbank.com',
        'ENABLE_LOGGING' => true,
        'LOGGING_PATH' => LOGS . 'PaymentHandler.log',
        'RESPONSE_KEY' => '6CD433AAB4C4F95918F69DD3582503',
        'CA_PATH' => WWW_ROOT.'cacert-2023-12-12.pem'
    ]
];
