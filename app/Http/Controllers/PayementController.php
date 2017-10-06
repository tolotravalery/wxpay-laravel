<?php

namespace App\Http\Controllers;

use App\Payement;
use Illuminate\Http\Request;
use App\NativePay;

class PayementController extends Controller
{
    public function wechat()
    {
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(256);
        $renderer->setWidth(256);
        $writer = new \BaconQrCode\Writer($renderer);
        $image_name = strtotime('now');
        $notify = new NativePay();
        $payement = Payement::create();
        $url1 = $notify->GetPrePayUrl($payement->id);
        $writer->writeFile($url1, 'public/qr_code/' . $image_name . '.png');
        return view('qr-code')->with('image', $image_name);
    }
}
