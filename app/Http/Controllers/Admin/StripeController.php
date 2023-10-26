<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\WebResponses;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function connectAccount(Request $request)
    {
        $user = User::find(Auth::id());
        $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

        //if acc not connected
        if(is_null($user->stripe_account_id)) {
            $expressAccount = $stripe->accounts->create(['type' => 'express']);
            $user->stripe_account_id = $expressAccount->id;
            $user->save();
        }

        $account_link = $stripe->accountLinks->create([
            'account' => $user->stripe_account_id,
            'refresh_url' => route('payouts'),
            'return_url' => route('payouts'),
            'type' => 'account_onboarding',
        ]);

        return redirect($account_link->url);
    }
}
