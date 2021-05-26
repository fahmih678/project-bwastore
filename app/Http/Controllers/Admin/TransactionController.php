<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TransactionDetail;


class TransactionController extends Controller
{
    public function index()
    {
        $dibayar = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('transaction_status', 'SUCCESS');
            })
            ->where('shipping_status', 'PENDING')
            ->get();
        $dikirim = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->where('shipping_status', 'SHIPPING')
            ->get();
        $diterima = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->where('shipping_status', 'SUCCESS')
            ->get();

        return view('pages.admin.transaction.index', [
            'dibayar' => $dibayar,
            'dikirim' => $dikirim,
            'diterima' => $diterima
        ]);
    }

    public function detail(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->findOrFail($id);

        return view('pages.admin.transaction.detail', [
            'transaction' => $transaction
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return redirect()->route('pages.admin.transaction.detail', $id);
    }
}
