<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use SoulDoit\SetEnv\Env;

class FormController extends Controller
{
    public function form_test()
    {
        return view('form');
    }

    public function form_test_update(Request $request)
    {
        // dd($request);
        // For LAravel 8 only
        // Artisan::call("env:set MAIL_HOST=" . $request->mail_host);

        // $envFile = app()->environmentFilePath();
        // $str = file_get_contents($envFile);
        // dd($str);

        // For Laravel 10 and above
        $envService = new Env();
        $envService->set("MAIL_MAILER", $request->mail_mailer);
        $envService->set("MAIL_HOST", $request->mail_host);
        $envService->set("MAIL_PORT", $request->mail_port);
        $envService->set("MAIL_USERNAME", $request->mail_username);
        $envService->set("MAIL_PASSWORD", $request->mail_password);
        $envService->set("MAIL_ENCRYPTION", $request->mail_encryption);
        // $envService->set("MY_APP_NAME", "My Laravel Application");

        // php artisan souldoit:set-env "MY_APP_NAME=My Laravel Application"

        return redirect()->back()->with('success', 'ENV updated successfully');
    }
}
