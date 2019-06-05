<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Libern\QRCodeReader\QRCodeReader;
class QRController extends Controller
{
            public function index(){
            //    generating QR Code with simple qr code library (simplesoftwareio/simple-qrcode)
               $image = \QrCode::format('png')
               ->size(200)
                ->generate('Mujeeb');

                return response($image)->header('Content-type','image/png');

            
            }

            public function read(){
                $QRCodeReader = new QRCodeReader();
                $qrcode_text = $QRCodeReader->decode("http://localhost/qr.png");
                echo $qrcode_text;

            }
}
