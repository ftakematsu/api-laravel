<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller {
    
    public function testeApi() {
        // Array associativa
        $retorno = [
            "message" => "Requisição efetuada com sucesso",
            "valor" => 200
        ];

        return response()->json($retorno, Response::HTTP_OK);
    }

    /**
     * A $request são os dados (body) da requisição.
     */
    public function login(Request $request) {
        // return response()->json($request);
        $credenciais = [
            'email' => $request->login,
            'password' => $request->password
        ];
        // Realizando a autenticação
        if (Auth::attempt($credenciais)) {
            $usuario = Auth::user(); // Retorna o usuário autenticado
            // Criação da resposta da requisição
            $sucesso['mensagem'] = "Login realizado com sucesso!";
            $sucesso['usuario'] = $usuario;

            // Geração do token de autenticação
            $sucesso['token'] = $usuario->createToken('web-token')->plainTextToken;

            return response()->json($sucesso, Response::HTTP_ACCEPTED);
        }
        else {
            $erro['mensagem'] = "Não autorizado!";
            return response()->json($erro, Response::HTTP_UNAUTHORIZED);
        }
    }

    public function usuarioLogado() {
        // Array associativa
        $usuario = auth()->user();

        return response()->json([
            "usuario" => $usuario
        ], Response::HTTP_OK);
    }

    public function logoutUser(Request $request): JsonResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(true, Response::HTTP_OK);
    }

}
