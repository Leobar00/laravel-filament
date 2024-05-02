<?php
// app/Http/Controllers/OpenAIController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenAIController extends Controller
{
    public function askOpenAI(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api.openai.com/v1/engines/davinci-codex/completions', [
            'headers' => [
                'Authorization' => 'Bearer ',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'prompt' => $request->input('prompt'),
                'max_tokens' => 150,
            ],
        ]);

        $output = json_decode($response->getBody()->getContents(), true);

        return view('openai-response', ['response' => $output['choices'][0]['text']]);
    }
}

