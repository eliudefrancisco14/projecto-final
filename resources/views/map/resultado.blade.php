<?php

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

?>

<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<markers>
    @foreach ($bomba as $bombas)
        <marker
        name="{{ parseToXML($bombas->nome) }}"
        address="{{ parseToXML($bombas->endereco) }}"
        lat="{{ $bombas->lat }}"
        lng="{{ $bombas->lng }}"
        gas="{{ $bombas->gas }}"
        gol="{{ $bombas->gol }}"
        type="postos"
        />
    @endforeach
</markers>
