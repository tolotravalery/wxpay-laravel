<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayementController extends Controller
{
    public function wechat()
    {
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(256);
        $renderer->setWidth(256);
        $writer = new \BaconQrCode\Writer($renderer);
        $image_name = strtotime('now');
        $writer->writeFile('Hello World!', 'public/qr_code/' . $image_name . '.png');
        return view('qr-code')->with('image', $image_name);
    }
}
