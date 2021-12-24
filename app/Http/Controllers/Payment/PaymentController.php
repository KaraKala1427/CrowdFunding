<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($id)
    {
        $fund = Publication::find($id);
        return view('pages.payment.main',compact('fund'));
    }
}
