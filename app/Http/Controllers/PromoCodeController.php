<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function validatePromoCode(Request $request)
    {
        // Valida o input do código promocional
        $request->validate([
            'code' => 'required|string'
        ]);

        // Procura a existência do código promocional na base de dados
        $promoCode = PromoCode::where('code', $request->input('code'))->first();

        // Verifica a data de expiração do código promocional
        if ($promoCode && (!$promoCode->expires_at || $promoCode->expires_at >= now())) {
            return response()->json([
                'success' => true,
                'discount' => $promoCode->discount
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Código inválido ou expirado.'
        ]);
    }
}
