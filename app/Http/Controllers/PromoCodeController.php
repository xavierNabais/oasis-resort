<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Valida o código promocional.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatePromoCode(Request $request)
    {
        // Valida o input do código promocional
        $request->validate([
            'code' => 'required|string'
        ]);

        // Busca o código promocional no banco de dados
        $promoCode = PromoCode::where('code', $request->input('code'))->first();

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
