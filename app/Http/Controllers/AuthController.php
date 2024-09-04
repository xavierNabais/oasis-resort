<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        Log::info('Exibindo o formulário de login.');
        return view('frontend.auth.login');
    }
    public function showSignupForm()
    {
        Log::info('Exibindo o formulário de registo.');
        return view('frontend.auth.signup');
    }


    public function login(Request $request)
    {
        // Obter as credenciais
        $credentials = $request->only('email', 'password');
        Log::info('Tentativa de login com as credenciais:', $credentials);

        // Tentar autenticar o utilizador com o guarda padrão 'web' para clientes
        if (Auth::guard('web')->attempt($credentials)) {
            Log::info('Login bem-sucedido para o cliente: ' . $request->input('email'));
            return redirect()->intended('/');
        }

        Log::warning('Falha no login para o cliente: ' . $request->input('email'));
        return redirect()->back()->withErrors(['email' => 'Credenciais de cliente inválidas.']);
    }

    public function signup(Request $request)
    {
        Log::info('Requisição recebida para o registro.');

        // Validar os dados de entrada
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:clients',
                'phone' => 'required|string|max:15',
                'password' => 'required|string|confirmed|min:8',
            ]);
            Log::info('Validação bem-sucedida para os dados: ', $validated);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Erro de validação: ', $e->errors());
            return redirect()->back()->withErrors($e->errors());
        }

        // Criar o cliente
        try {
            $client = Client::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => Hash::make($request->input('password')),
            ]);
            Log::info('Cliente criado com sucesso: ', ['client' => $client]);
        } catch (\Exception $e) {
            Log::error('Erro ao criar cliente: ', ['exception' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Erro ao criar cliente.']);
        }

        // Autenticar o cliente
        try {
            Auth::login($client);
            Log::info('Cliente autenticado com sucesso: ' . $client->email);
        } catch (\Exception $e) {
            Log::error('Erro ao autenticar cliente: ', ['exception' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Erro ao autenticar cliente.']);
        }

        return redirect()->intended('/');
    }




    public function logout()
    {
        Log::info('Cliente desconectado.');
        Auth::logout();
        return redirect('/');
    }
}
