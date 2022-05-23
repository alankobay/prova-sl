<?php

# Crie um array
$array = [];

# Popule este array com 7 números
for ($i = 1; $i <= 7; $i ++) {
    $array[] = $i;
}

# Imprima o número da posição 3 do array
echo $array[3];
echo '<br>';

# Crie uma variável com todas as posições do array no formato de string separado por vírgula
$string = implode(',', array_keys($array));

# Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior
$newArray = explode(',', $string);
unset($array);

# Crie uma condição para verificar se existe o valor 14 no array
if (in_array(14, $newArray)) {
    echo 'Existe o valor 14' . '<br>';
    echo '<br>';
}

# Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior (valor anterior que não foi excluído do array ainda), exclua esta posição
foreach ($newArray as $key => $value) {
    if (
        isset($newArray[$key - 1])
        && $value < $newArray[$key - 1]
    ) {
        unset($newArray[$key]);
    }
}

# Remova a última posição deste array
array_pop($newArray);

# Conte quantos elementos tem neste array
count($newArray);

# Inverta as posições deste array
$newArray = array_reverse($newArray);
