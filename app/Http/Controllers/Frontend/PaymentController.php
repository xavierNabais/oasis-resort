<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // Obter a chave pública do Stripe do arquivo de configuração
        $stripePublicKey = Config::get('services.stripe.key');
        
        $roomId = $request->input('room_id');
        $room = Room::find($roomId);
        
        // Validar se o room foi encontrado
        if (!$room) {
            abort(404, 'Room not found');
        }
    
        // Obter os valores do formulário de reserva
        $dateRange = $request->input('date_range'); 
        $number_of_guests = $request->input('number_of_guests');
        $totalPrice = $request->input('total_price');
        
        // Parse o date_range para check_in e check_out se necessário
        $dates = explode(' to ', $dateRange);
        $checkIn = $dates[0] ?? null;
        $checkOut = $dates[1] ?? null;
        
        // Retornar a view com as informações necessárias
        return view('frontend.payment.index', compact('room', 'number_of_guests', 'stripePublicKey', 'checkIn', 'checkOut', 'totalPrice'));
    }

    public function process(Request $request)
    {
        Log::info('Método process() foi chamado.');
        Log::info('Dados recebidos do formulário:', $request->all());
    
        $request->validate([
            'stripeToken' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'number_of_guests' => 'required|numeric',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
            'total_price' => 'required|numeric',
        ]);
    
        Log::info('Validação do formulário passou.');
    
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        try {
            Log::info('Iniciando a criação do pagamento com Stripe.');
    
            $charge = Charge::create([
                'amount' => $request->input('total_price') * 100,
                'currency' => 'usd',
                'description' => 'Room Reservation Payment',
                'source' => $request->input('stripeToken'),
            ]);
    
            Log::info('Pagamento criado com sucesso:', ['charge' => $charge]);
    
            // Criar a reserva
            $reservation = new Reservation();
            $reservation->room_id = $request->input('room_id');
            $reservation->check_in = $request->input('check_in');
            $reservation->check_out = $request->input('check_out');
            $reservation->number_of_guests = $request->input('number_of_guests');
            $reservation->client_id = auth()->id();
            $reservation->total_price = $request->input('total_price');
            $reservation->save();
    
            Log::info('Reserva criada com sucesso:', ['reservation' => $reservation]);

            // Registrar o pagamento
            $payment = new Payment();
            $payment->reservation_id = $reservation->id;
            $payment->stripe_charge_id = $charge->id;
            $payment->amount = $request->input('total_price');
            $payment->currency = 'usd';
            $payment->save();
    
            Log::info('Pagamento registrado com sucesso:', ['payment' => $payment]);
    
            return redirect()->route('payment.success', [
                'reservation_id' => $reservation->id
            ])->with('success', 'Reserva criada com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao processar o pagamento:', ['error' => $e->getMessage()]);
    
            return back()->withErrors(['error' => 'Falha ao processar pagamento: ' . $e->getMessage()]);
        }
    }

    public function success(Request $request)
    {
        // Recuperar o ID da reserva da solicitação
        $reservationId = $request->get('reservation_id');
        // Encontrar a reserva pelo ID
        $reservation = Reservation::find($reservationId);
    
        // Verificar se a reserva existe e se o usuário autenticado é o dono
        if (!$reservation || $reservation->client_id !== auth()->id()) {
            return redirect()->route('home')->withErrors('Você não tem permissão para visualizar esta reserva.');
        }
    
        // Retornar a visualização de sucesso de pagamento com os dados da reserva
        return view('frontend.payment.success', compact('reservation'));
    }
    
}
