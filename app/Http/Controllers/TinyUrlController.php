<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TinyUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Uuid;
use Config;

class TinyUrlController extends Controller {

    private $timeToCacheUrl = 20;

    public function redirectTo($hash) {
        $url = Cache::get($hash, null);
        if ($url) {
            return Redirect::to($url);
        }

        $tinyUrl = TinyUrl::where('hash', $hash)->first();
        if (!$tinyUrl) {
            return view("not-found");
        }
        $url = $tinyUrl->original;
        Cache::put($hash, $url, $this->timeToCacheUrl);
        return Redirect::to($url);
    }

    public function generate(Request $request) {

        $request->validate([
            'url' => 'required|starts_with:http://,https://',
        ]);

        $hash = Uuid::uuid4()->toString();
        $tinyUrl = new TinyUrl();
        $tinyUrl->original = $request->url;
        $tinyUrl->hash = $hash;
        $tinyUrl->save();

        $baseLinkTinyUrl = config("app.baseLinkTinyUrl");
        $finalUrl = "$baseLinkTinyUrl$hash";
        return view('tiny-url', [ 'finalUrl' => $finalUrl]);
    }

}