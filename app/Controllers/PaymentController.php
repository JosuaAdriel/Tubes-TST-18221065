<?php

namespace App\Controllers;

class PaymentController extends BaseController
{
    protected $paymentInfo;

    public function __construct()
    {
        $url = 'http://localhost:8080/paymentAPI/josua.sinabutar@gmail.com/5f4dcc3b5aa765d61d8327deb882cf99';
        $jsonString = file_get_contents($url);
        $jsonData = json_decode($jsonString, true);
        $this->paymentInfo = $jsonData['payment'];

        usort($this->paymentInfo, function ($a, $b) {
            return $a['paymentId'] - $b['paymentId'];
        });
    }

    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        $totalPaymentForAllTime = $this->getTotalPaymentForAllTime();

        $data = [
            'paymentInfo' => $this->paymentInfo,
            'totalPaymentForAllTime' => $totalPaymentForAllTime
        ];

        return view('layoutatas', $data).view('paymentview', $data).view('layoutbawah');
    }

    public function getTotalPaymentForAllTime()
    {
        $totalPayment = 0;

        foreach ($this->paymentInfo as $payment) {
            $totalPayment += (float) $payment['totalPrice'];
        }

        return $totalPayment;
    }
}

