<?php
$dados = [
    ["profissional" => "Advogado", "data" => "2018-09-04"],
    ["profissional" => "Advogado", "data" => "2019-08-17"]
];

$novoValor = "Dr. Wagner";

foreach ($dados as &$objeto) {
    $objeto["nome"] = $novoValor;
}

var_dump($dados);
?>