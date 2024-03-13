<!DOCTYPE html>
<html>
    <head>
        <title>Testing</title>
    </head>
    <body>
<p>Результат теста:</p>
<?php

require_once 'inverser.php';

$test_result = 1;
$test_input = array("Hello, World!", "Cat &!# Dog", "1234567890 Can't", "");
$test_output = array("Olleh, Dlrow!", "Tac &!# God", "0987654321 Nac't", "");
$i = count($test_input);

for ($j = 0; $j < $i; $j++) //Поочередный перебор массивов вводимых строк и преобразованных
{$test_string = get_invented_string($test_input[$j]);
    if ($test_string !== $test_output[$j])
    $test_result = 0;
}

if ($test_result == 1) //Если все вводимые строки соответственно совпали с преобразованными, тест пройден успешно
    {echo 'Success!';}
else
    {echo 'Failed';}

?>
</body>
</html>