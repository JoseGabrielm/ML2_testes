<?php

// Essa é a pagina cadastrada na API do ML para redirecionamento

// A pagina recebe o code na url

$code = $_GET['code'];
echo 'code redirecionado :' . $code . '<br>';

// Depois a pagina é redirecionada para com o code para gerar o token

header("Location: http://supreme.ind.br/ml2_testes/public/token?code=$code");

?>
