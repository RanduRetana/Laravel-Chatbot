<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $botman->listen();
    }

    public function askName(BotMan $bot)
    {
        $bot->ask('Hola! Por favor, dime tu nombre:', function (Answer $answer) use ($bot) {
            $bot->reply('Hola, ' . $answer->getText() . '.');
            $this->askEmail($bot);
        });
    }

    public function askEmail(BotMan $bot)
    {
        $bot->ask('¿Cuál es tu correo electrónico?', function (Answer $answer) use ($bot) {
            // Validación básica del correo electrónico
            if (filter_var($answer->getText(), FILTER_VALIDATE_EMAIL)) {
                $bot->reply('Gracias, he guardado tu correo: ' . $answer->getText() . '.');
                $this->askDoubt($bot);
            } else {
                $bot->reply('Por favor, ingresa un correo electrónico válido.');
                $this->askEmail($bot);
            }
        });
    }

    public function askDoubt(BotMan $bot)
    {
        $bot->ask('Por favor, describe tu duda:', function (Answer $answer) use ($bot) {
            $bot->reply('Gracias por compartir tu duda. Pronto nos pondremos en contacto contigo para ayudarte.');
        });
    }
}
