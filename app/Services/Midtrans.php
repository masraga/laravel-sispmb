<?php

namespace App\Services;

class Midtrans
{
  public function __construct()
  {
    \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
    \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
    \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
    \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
  }

  public function generateToken(array $payload = [])
  {
    $payload = [
      'transaction_details' => [
        'order_id'     => $payload["order_id"],
        'gross_amount' => $payload["amount"],
      ],
      'customer_details' => [
        'first_name' => $payload["customerName"],
        'email'      => $payload["customerEmail"],
      ],
      'item_details' => [
        [
          'id' => $payload["order_id"],
          'price'         => $payload["amount"],
          'quantity'      => 1,
          'name'          => $payload["itemName"],
          'merchant_name' => "koderpedia",
        ],
      ],
      "callbacks" => [
        "finish" => config("services.midtrans.finish_url")
      ],
      [
        "credit_card" => [
          "secure" => true
        ]
      ],
      "expiry" => [
        "unit" => "minutes",
        "duration" => 60
      ]
    ];

    $snapToken = \Midtrans\Snap::createTransaction($payload)->redirect_url;
    return $snapToken;
  }

  public function getNotif()
  {
    return new \Midtrans\Notification();
  }
}
