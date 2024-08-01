<?php 
function contarTempo(string $data): string {
    // Definir o fuso horário para Maputo, Moçambique
    date_default_timezone_set('Africa/Maputo');
    
    // Obter a data e hora atual em Maputo corretamente
    $agora = time()-3600; // time() já retorna o timestamp correto para o fuso horário configurado
    
    // Converter a data fornecida para timestamp
    $tempo = strtotime($data);
    
    // Calcular a diferença em segundos
    $diferenca = $agora - $tempo;
    
    // Calcular a diferença em várias unidades de tempo
    $segundos = $diferenca; 
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200); // Aproximadamente 28 dias por mês
    $anos = round($diferenca / 29030400); // Aproximadamente 336 dias por ano (conta com bissextos)

    // Verificar e retornar a diferença apropriada
    if ($segundos <= 60) {
        return 'agora';
    } elseif ($minutos <= 60) {
        return $minutos == 1 ? 'há 1 minuto' : 'há ' . $minutos . ' minutos';
    } elseif ($horas <= 24) {
        return $horas == 1 ? 'há 1 hora' : 'há ' . $horas . ' horas';
    } elseif ($dias <= 7) {
        return $dias == 1 ? 'ontem' : 'há ' . $dias . ' dias'; 
    } elseif ($semanas <= 4) {
        return $semanas == 1 ? 'há 1 semana' : 'há ' . $semanas . ' semanas'; 
    } elseif ($meses <= 12) {
        return $meses == 1 ? 'há 1 mês' : 'há ' . $meses . ' meses'; 
    } else {
        return $anos == 1 ? 'há 1 ano' : 'há ' . $anos . ' anos'; 
    }
}
?>
