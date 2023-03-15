<?php

namespace Justcrm\Crm\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function createToken($connectionToken)
    {
        
        $credentials = [
            'grant_type' => 'client_credentials',
            'client_id' => config('justcrm.client_id'),
            'client_secret' => config('justcrm.client_secret'),
            'scope' => '',
        ];
        $response = Http::asForm()->post(config('justcrm.api_token'), $credentials);
        
        $bearerToken = $response->json()['access_token'];
        
        
        //call endpoint with bearerToken to get connection uuid and name
        $responseData = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('justcrm.api') . '/client/token/' . $connectionToken . '/connection/info');
    
        https://compassionate-archimedes.88-208-212-203.plesk.page/api/v1/client/token/'.$connectionToken.'/connection/info
        
      
        
        $connectionUuid = $responseData->json()['data']['connected_account']['uuid'] ?? null;
        $connectionName = $responseData->json()['data']['connected_account']['name'] ?? null;
        
        if ($connectionUuid && $connectionName) {
            
            $user = User::firstOrCreate(
                ['email' => $connectionUuid],
                ['name' => $connectionName]
            );
            
            Auth::login($user, true);
            $loggedUser = Auth::user();
            return [
                'user_logged' => true,
                'logged_user' => $loggedUser
            ];
            
        } else {
            return [
                'user_logged' => false
            ];
        }
    }
    
}
