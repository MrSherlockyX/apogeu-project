<?php
// Números sorteados 
$sorteados = [4, 12, 89];


$numeros_escolhidos = isset($_POST['numero']) ? $_POST['numero'] : [];


if (count($numeros_escolhidos) !== 6) {
    echo "Por favor, escolha exatamente seis números.";
    exit;
}


$numeros_escolhidos = array_map('intval', $numeros_escolhidos);


$acertos = 0;
foreach ($numeros_escolhidos as $numero) {
    if (in_array($numero, $sorteados)) {
        $acertos++;
    }
}


$desconto = $acertos * 15;


if ($acertos > 0) {
    echo "Parabéns! Você acertou $acertos número(s) e ganhou um desconto de $desconto%!";
} else {
    echo "Que pena! Você não acertou nenhum número. Tente novamente!";
}
?>
