<?php

function getCasinoBlockHTML($casino_name)
{
    $args = func_get_args();
    array_shift($args);

    static $current;
    if (isset($current))
    {
        $current++;
    }
    else
    {
        $current = 0;
    }

    $data = clone $GLOBALS['data'][$casino_name];
    if (!$data)
    {
        return '';
    }

    $template = null;
    if (!empty($args))
    {
        $value = array_shift($args);
        if (is_array($value) or ($value instanceof stdClass))
        {
            foreach(((array) $value) as $k => $v)
            {
                $data->$k = $v;
            }
            $value = array_shift($args);
        }
        if (is_string($value))
        {
            $template = $value;
        }
    }

    $template = isset($template) ? $template : 'default';
    ob_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/includes/templates/$template.tpl.php");

    $result = ob_get_contents();
    ob_end_clean();
    return $result;
}
