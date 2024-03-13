<!DOCTYPE html>
<html>
    <head>
        <title>Text Inverser</title>
    </head>
    <body>
<?php

function get_invented_string($string) //Функция преобразования полученной строки
{
    $inv_string = '';
    $str_lenght = iconv_strlen($string);
    $i=0;
    while ($i<$str_lenght) //Посимвольный перебор строки
    {
        if (preg_match('/[а-яА-Яa-zA-Z0-9]/', $string[$i])) //Проверка текущего символа на начало слова
        {
            $j=$i; $a=$i;
            while ($j+1<$str_lenght && preg_match('/[а-яА-Яa-zA-Z0-9]/', $string[$j+1])) //Поиск позиции конца слова
            {
                $j++;
            }
            while ($j>=$a)
            {
                $str_sign = check_register($string, $i, $j);
                $inv_string.= $str_sign;
                $j--; $i++;
            }
        }
        else
        {
            $inv_string.=$string[$i]; //Знак и пробел сохраняет позицию в строке
            $i++;
        }
    }
    return $inv_string;
}

function check_register($string, $i, $j) //Функция проверки регистра текущего символа
{
    if (ctype_upper($string[$i]))
    {$str_sign = strtoupper($string[$j]);}
    else
    {$str_sign = strtolower($string[$j]);}
    return $str_sign;
}

if(isset($_POST['inverse']))
{
    $string = $_POST['text_for_inversion'];
    if (preg_match('/[а-яА-Я]/', $string)) //Проверка на использование кириллицы
        echo 'Ошибка: Используйте латиницу';
    else
    {
        $inv_string = get_invented_string($string);
        echo 'Результат:<br/><br/>'.$inv_string;
    }
}

?>
</body>
</html>