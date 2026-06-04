<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Timeweb AI Agent Configuration
    |--------------------------------------------------------------------------
    */

    'agent_id' => env('TIMEWEB_AGENT_ID'),
    'api_token' => env('TIMEWEB_API_TOKEN'),
    'api_url' => env('TIMEWEB_API_URL', 'https://api.timeweb.cloud/api/v1/cloud-ai/agents'),
];
