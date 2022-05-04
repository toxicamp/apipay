<?php

namespace App\Http\Controllers\Payments;

use App\Core\Response\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use App\Service\EasypayHelper;
use App\Service\Entity\EasypayEntity;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{

    use ResponseTrait;

    /**
     * @var EasypayHelper
     */

    private $easypayHelper;

    /**
     * @var PaymentRepository
     */
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository, EasypayHelper $easypayHelper)
    {

        $this->paymentRepository = $paymentRepository;
        $this->easypayHelper = $easypayHelper;

    }

    public function createPayment(Request $request)
    {


        try {

            $data = [
                'user_id' => 1,
                'amount' => $request->post('amount')
            ];

            $result = $this->paymentRepository->save($data);

            return $this->successResponse(
                ['hash' => $result],
                Response::HTTP_OK
            );

        } catch (\Exception $e) {

            return $this->errorResponse(
                [
                    "error" => $e->getMessage()
                ],
                Response::HTTP_BAD_REQUEST
            );


        }


    }

    public function getPayment(Request $request)
    {
        return Payment::where('user_id', $request->user()->id)->first();

        //непонятно,что здесь написано!
        // Сергей разберись пожалуйста,что ты здесь написал)

        try {

            $data = [
                'user_id' => 1,
                'hash' => $request->get('hash')
            ];



            $result = $this->paymentRepository->findByHash($data);
            $this->easypayHelper->getToken();

            return $this->successResponse(
                [$result],
                Response::HTTP_OK
            );

        } catch (\Exception $e) {

            return $this->errorResponse(
                [
                    "error" => $e->getMessage()
                ],
                Response::HTTP_BAD_REQUEST
            );


        }


    }

    public function createWallets(Request $request)
    {
        $payments = $request->user()->payments()->get();

        if ($payments->count() >= 0 && $payments->count() <= 8) {
            $this->easypayHelper->getToken();

            $this->easypayHelper->loginAuth();
            $wallets = $this->easypayHelper->getWallets();

            $payment = new Payment();
            $payment->saveWallets($wallets, $request->user()->id);

            if (count($wallets)>=8)
            {
                return ['error'=>'У вас уже создано восемь кошельков '];
            }

            $wallet = $this->easypayHelper->createWallet($request->get('name'));

            $result = $payment->where('user_id',$request->user()->id)->get();
            return $result->last()->toArray();
        }

        return ['error'=>'У вас уже создано восемь кошельков'];
    }

    public function getWallets(Request $request)
    {
        $payments = $request->user()->payments()->get();

        if ($payments->count() >= 0 && $payments->count() <= 8) {
            $this->easypayHelper->getToken();

            $this->easypayHelper->loginAuth();
            $wallets = $this->easypayHelper->getWallets();

            $payment = new Payment();
            $payment->saveWallets($wallets, $request->user()->id);

            $result = $payment->where('user_id',$request->user()->id)->get();

            return $result;
        }

        return $payments;
    }
}
