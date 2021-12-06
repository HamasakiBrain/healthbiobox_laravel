<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;
use Curl\Curl;

class PaymentController extends Controller
{
    private $content;
    private $shopId;
    private $token;


    public function __construct()
    {
        $this->shopId = 839432;
        $this->token = "test_OAl_AVqYcn8f9H85zY68yI_-9j3mTt6Cnils4V3mSts";
    }

    public function create() {
        $client = new \YooKassa\Client();;
        $client->setAuth($this->shopId, $this->token);

        try {
            $idempotenceKey = uniqid('', true);
            $response = $client->createPayment(
                array(
                    'amount' => array(
                        'value' => '1000.00',
                        'currency' => 'RUB',
                    ),
                    'confirmation' => array(
                        'type' => 'redirect',
                        'locale' => 'ru_RU',
                        'return_url' => route('home'),
                    ),
                    'capture' => true,
                    'description' => 'Заказ №72',
                    'metadata' => array(
                        'orderNumber' => random_int(1000, 99999),
                        'account'  => 1
                    ),
                    'receipt' => array(
                        'customer' => array(
                            'full_name' => 'Ivanov Ivan Ivanovich',
                            'email' => 'amon_amonov@bk.ru',
                            'phone' => '79211234567',
                        ),
                        'items' => array(
                            array(
                                'description' => 'Переносное зарядное устройство Хувей',
                                'quantity' => '1.00',
                                'amount' => array(
                                    'value' => 1000,
                                    'currency' => 'RUB'
                                ),
                                'vat_code' => '2',
                                'payment_mode' => 'full_payment',
                                'payment_subject' => 'commodity',
                                'country_of_origin_code' => 'CN',
                                'customs_declaration_number' => '10714040/140917/0090376',
                                'excise' => '20.00',
                            ),
                        )
                    )
                ),
                $idempotenceKey
            );

            //получаем confirmationUrl для дальнейшего редиректа
            $confirmationUrl = $response->getConfirmation()->getConfirmationUrl();
            return redirect($confirmationUrl);
        } catch (\Exception $e) {
            $response = $e;
        }

        if (!empty($response)) {
            print_r($response);
        }
    }
    public function getContent($asResource = false)
    {
        if (false === $this->content || (true === $asResource && null !== $this->content)) {
            throw new \LogicException('getContent() can only be called once when using the resource return type.');
        }

        if (true === $asResource) {
            $this->content = false;

            return fopen('php://input', 'rb');
        }

        if (null === $this->content) {
            $this->content = file_get_contents('php://input');
        }

        return $this->content;
    }
    public function success(Request $request) {
        $source = file_get_contents('php://input', 'rb');
        dd($this->getContent(true));
        $requestBody = json_decode($source, true);
        Log::info('YOOKASSA', $requestBody);
    }
    public function notify() {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);
        try {
            $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
                ? new NotificationSucceeded($requestBody)
                : new NotificationWaitingForCapture($requestBody);
        } catch (Exception $e) {
            // Обработка ошибок при неверных данных
        }
        $payment = $notification->getObject();
        /*Ищем аккаунт с которого пополняют*/
        $user = User::find($payment['metadata']['account']);
        /*Ищем рефералку*/
        $ReferralOwnerBalance = User::find(Referral::where('referral_id', $user['id'])->first());
        if (!is_null($ReferralOwnerBalance)){
            $ReferralOwnerBalance = $ReferralOwnerBalance->user_id;
            $ReferralOwnerBalance->bonus_balance = $ReferralOwnerBalance->bonus_balance + $payment['amount']['value']*0.2;
            $ReferralOwnerBalance->save();
        }
        Log::info($payment['metadata']['account']);
        $user->balance = $user->balance + $payment['amount']['value'];
        $user->save();


        return response($payment);
    }

    /**
     * @throws \YooKassa\Common\Exceptions\NotFoundException
     * @throws \YooKassa\Common\Exceptions\ResponseProcessingException
     * @throws \YooKassa\Common\Exceptions\ApiException
     * @throws \YooKassa\Common\Exceptions\BadApiRequestException
     * @throws \YooKassa\Common\Exceptions\ExtensionNotFoundException
     * @throws \YooKassa\Common\Exceptions\InternalServerError
     * @throws \YooKassa\Common\Exceptions\ForbiddenException
     * @throws \YooKassa\Common\Exceptions\TooManyRequestsException
     * @throws \YooKassa\Common\Exceptions\UnauthorizedException
     */
    public function createPayment(Request $request){
        $client = new \YooKassa\Client();;
        $client->setAuth($this->shopId, $this->token);
        $response = $client->createPayment([
            'amount' => [
                'value' => (float) $request->amount,
                'currency' => 'RUB'
            ],
            'confirmation' => [
                'type' => 'redirect',
                'locale' => 'ru_RU',
                'return_url' => route('home'),
            ],
            'capture' => false,
            'description' => 'Заказ №'.random_int(1000, 999999),
            'metadata' => [
                'account'  => $request->account,
                'description' => $request->description,
            ],
        ], uniqid('payment_', true));
        \App\Models\Transaction::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'status' => $response->status,
            'description' => $request->description
        ]);
        return redirect()->away($response->getConfirmation()->getConfirmationUrl());
    }
}
