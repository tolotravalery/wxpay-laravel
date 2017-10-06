<?php

namespace App\Http\Controllers;

use App\Payement;
use Illuminate\Http\Request;
use App\NativePay;
use App\Datauv;

class PayementController extends Controller
{
    public function add(Request $request){
        $nom= $request->input('first_name');
        $email=$request->input('email');
        $nbre_place=$request->input('nbre_place');
        $item_number=$request->input('item_number');
        $id_customer=$request->input('custom');
        $amount=$request->input('amount');
        $data=new Datauv();
        $data->nom= $nom;
        $data->email=$email;
        $data->id_customer=$id_customer;
        $data->nbre_place=$nbre_place;
        $data->item_number=$item_number;
        $data->amount=$amount;
        $data->save();
        return redirect(url('payment/wechat'));
    }
    public function wechat()
    {
        $data1=Datauv::orderBy('created_at', 'desc')->first();

        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(256);
        $renderer->setWidth(256);
        $writer = new \BaconQrCode\Writer($renderer);
        $image_name = strtotime('now');
        $notify = new NativePay();
        $payement = Payement::create();
        $url1 = $notify->GetPrePayUrl($payement->id);
        $writer->writeFile($url1, 'public/qr_code/' . $image_name . '.png');
        return view('qr-code')->with('image', $image_name)->with('data',$data1);
    }
}
