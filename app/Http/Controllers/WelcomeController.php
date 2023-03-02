<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class WelcomeController extends Controller
{
    private $openAi;

    public function __construct(){
        $this->openAi = new OpenAi(env('OPENAI_API_KEY'));
    }

    public function __invoke() : mixed
    {
        $complete =  $this->openAi->completion([
            'model' => 'text-davinci-002',
            'prompt' => 'How are you?',
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);

        dd(json_decode($complete));
    }
}
