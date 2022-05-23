<?php

function exibeMensagem($mensagem){
    echo $mensagem . PHP_EOL;
}

function sacar(array $conta,float $valorASacar){
    if ($valorASacar > $conta['saldo']) {
        exibeMensagem("Você não pode sacar este valor");
    } else {
        $conta['saldo'] -= $valorASacar;
    }

    return $conta;
}

function depositar(array $conta,float $valorADepositar) {
    if ($valorADepositar > 0) {
        $conta['saldo'] += $valorADepositar;
    } else {
        exibeMensagem("Depósitos precisam ser positivos");
    }

    return $conta;
}

/*contas */
$contasCorrentes = [
    '123.456.789-10' => [
        'titular' => 'Maria',
        'saldo' => 10000
    ],
    '123.456.789-11' => [
        'titular' => 'Alberto',
        'saldo' => 300
    ],
    '123.256.789-12' => [
        'titular' => 'Vinicius',
        'saldo' => 100
    ]
];

/*sacar */
$contasCorrentes['123.456.789-10'] = sacar($contasCorrentes['123.456.789-10'], 5000);
/*depositar */
$contasCorrentes['123.256.789-12'] = depositar($contasCorrentes['123.256.789-12'], 3000);

foreach ($contasCorrentes as $cpf => $conta) {
    exibeMensagem("$cpf {$conta['titular']}:  {$conta['saldo']}");
}



