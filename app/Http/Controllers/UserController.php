<?php

namespace App\Http\Controllers;

use App\Models\User;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function handle(Request $request)
    {
        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);
        $config = [];
        $botman = BotManFactory::create($config);

        $botman->hears('Empezar', function (BotMan $bot) {
            $bot->ask('Por favor, ingresa tu nombre:', function ($answer, BotMan $bot) {
                $name = $answer->getText();
                $bot->ask('Ahora ingresa tu correo electrónico:', function ($answer, BotMan $bot) use ($name) {
                    $email = $answer->getText();
                    $bot->ask('Finalmente, ¿cuál es tu duda?', function ($answer, BotMan $bot) use ($name, $email) {
                        $question = $answer->getText();
                        // Almacenar en la base de datos
                        $user = new User();
                        $user->name = $name;
                        $user->email = $email;
                        $user->question = $question;
                        $user->save();

                        $bot->reply("¡Gracias, $name! Hemos guardado tu información y duda. Nos pondremos en contacto contigo pronto.");
                    });
                });
            });
        });

        $botman->fallback(function (BotMan $bot) {
            $bot->reply('Por favor, escribe "Empezar" para comenzar el proceso.');
        });

        $botman->listen();
    }

    public function tinker()
    {
        return view('tinker');
    }
}
