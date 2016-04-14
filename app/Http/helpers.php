<?php

function makeUrlToPage($id) {
    $res = "";
    switch ($id) {
        case 1:
            $res = "/";
            break;
        case 2:
            $res = "tendencias";
            break;
        case 3:
            $res = "mulher";
            break;
        case 4:
            $res = "homem";
            break;
        case 5:
            $res = "marcas";
            break;
        default:
            return url('produto/' . $id);
    }

    return url($res);
}

if ( ! function_exists('activePage')) {
    function activePage($path)
    {
        if(request()->segment(1) == null && $path == '/')
            return ' active';
        
        $path    = explode('.', $path);
        $segment = 1;
        foreach ($path as $p) {
            if ((request()->segment($segment) == $p) == false) {
                return '';
            }
            $segment++;
        }
        return ' active';
    }
}