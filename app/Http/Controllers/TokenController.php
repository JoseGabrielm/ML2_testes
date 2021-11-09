<?php

namespace App\Http\Controllers;



use App\Classes\Meli\Meli;
use Exception;

class TokenController extends Controller
{

    public function code()
    {
        return view('token.code');
        
    }

    public function erro()
    {
        return view('token.erro');
    }

    public function ok()
    {
        return view('token.ok');
    }

    public function token()
    {
        // PAGINA PARA AUTORIZAÇÃO E AUTENTICAÇÃO NA API DO MERCADOLIVRE

        session_start();

        $appId = '3020890241133766';
        $secretKey = 'DS7Nr3q1JgZhaMdu6HCgdbsA4LGKgp6i';
        $redirectURI = 'http://localhost:8000/public/autorizado.php';
        $siteId = 'MLB';


        //CHAMADA PARA A FUNÇÃO MELI PASSANDO APP ID E SECRET KEY
        $meli = new Meli($appId, $secretKey);

        // Se existe code ou existe token na sessão
        if (isset($_GET['code']) || isset($_SESSION['access_token'])) {

            // Se existe code e não existe token na sessão
            if (isset($_GET['code']) && !isset($_SESSION['access_token'])) {

               // Se existe o code e não existe token na sessão - Geramos o code
                try {
                    $user = $meli->authorize($_GET["code"], $redirectURI);
                    // E criamos as sessões com o usuário autenticado
                    $_SESSION['access_token'] = $user['body']->access_token;
                    $_SESSION['expires_in'] = time() + $user['body']->expires_in;
                    $_SESSION['refresh_token'] = $user['body']->refresh_token;
                    //echo 'Novo token foi gerado' . '<br/>';
                } catch (Exception $e) {
                    $e->getMessage();
                    dd($e);
                    // Apagar valores do token
                    $_SESSION['access_token'] = "";
                    $_SESSION['expires_in'] = "";
                    $_SESSION['refresh_token'] = "";
                    unset($_SESSION['access_token']);
                    unset($_SESSION['expires_in']);
                    unset($_SESSION['refresh_token']);
                    $auto_uri = $meli->getAuthUrl($redirectURI, Meli::$AUTH_URL[$siteId]);
                    
                    return view('token.code', [ 'auto_uri' => $auto_uri ]);
                }

            } else {

                // Se o token existir verificamos se é valido checando o tempo
                if ($_SESSION['expires_in'] < time()) {
                    try {
                        // Pegamos um novo token
                        $refresh = $meli->refreshAccessToken();
                        // E criamos uma nova sessao com o novo token
                        $_SESSION['access_token'] = $refresh['body']->access_token;
                        $_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
                        $_SESSION['refresh_token'] = $refresh['body']->refresh_token;
                        //echo 'O token foi renovado' . '<br/>';
                    } catch (Exception $e) {
                        $e->getMessage();
                        dd($e);
                        $_SESSION['access_token'] = "";
                        $_SESSION['expires_in'] = "";
                        $_SESSION['refresh_token'] = "";
                        unset($_SESSION['access_token']);
                        unset($_SESSION['expires_in']);
                        unset($_SESSION['refresh_token']);
                        $auto_uri = $meli->getAuthUrl($redirectURI, Meli::$AUTH_URL[$siteId]);
                        
                        return view('token.code', [ 'auto_uri' => $auto_uri ]);
                       
                    }
                }
            }

            //echo "Sessão: ";
            //print_r($_SESSION);
            //echo'<br/>';
            $token = $_SESSION["access_token"];
            $params = array("token" => $token);
            $auto_uri = "http://localhost:8000/public/ok?".http_build_query($params);
            return view('token.ok', [ 'auto_uri' => $auto_uri ]);

        } else {
            
            // Se não existe code ou não existe token na sessão vamos gerar o code
            //http://www.supreme.ind.br/ml2/public/token  -- O Code precisa ser gerado
            $auto_uri = $meli->getAuthUrl($redirectURI, Meli::$AUTH_URL[$siteId]);
            return view('token.code', [ 'auto_uri' => $auto_uri ]);
            //echo 'não existe o code e não existe token na sessão' . '<br/>';
            //echo 'url: ' . $auto_uri . '<br/>';

        }


    }



}
