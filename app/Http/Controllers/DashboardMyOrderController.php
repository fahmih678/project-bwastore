<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TransactionDetail;
use App\Transaction;

class DashboardMyOrderController extends Controller
{
    public function index()
    {
        $pendingOrder = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction
                    ->where('users_id', Auth::user()->id)
                    ->where('transaction_status', 'PENDING');
            })->get();
        $shippingOrder = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction
                    ->where('users_id', Auth::user()->id)
                    ->where('shipping_status', 'SHIPPING');
            })->get();
        $successOrder = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction
                    ->where('users_id', Auth::user()->id)
                    ->where('shipping_status', 'SUCCESS');
            })->get();

        return view('pages.dashboard-myorder', [
            'pendingOrder' => $pendingOrder,
            'shippingOrder' => $shippingOrder,
            'successOrder' => $successOrder
        ]);
    }

    public function detail(Request $request, $id)
    {
        $myorder = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('users_id', Auth::user()->id);
            })
            ->where('transaction_id', $id)
            ->get();

        $transaction = Transaction::find($id);


        return view('pages.dashboard-myorder-detail', [
            'myorder' => $myorder,
            'transaction' => $transaction
        ]);
    }
}
