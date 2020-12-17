<?php


use Philo\Blade\Blade;
use App\Models\Category;
use voku\helper\Paginator;



function view($path, $params = [])
{
    $views = APP_ROOT . '/resources/views';
    $cache = APP_ROOT . '/bootstrap/cache';
    
    $blade = new Blade($views, $cache);
    echo $blade->view()->make($path, $params)->render();
}

function make($filename, $data) 
{
    ob_start();
    extract($data);
    
    require_once APP_ROOT . "/resources/views/mail/" . $filename . ".blade.php";
    $body = ob_get_contents();
    ob_end_clean();

    return $body;
}

function beautify($value)
{
    echo "<pre>" . print_r($value,true) . "</pre>";
}

function assets($file)
{
    echo URL_ROOT . "assets/" . $file ;
}

function slug($key)
{
    $value = preg_replace('/[^'.preg_quote('_').'\pL\pN\s]+/u',"", mb_strtolower($key));
    $value = preg_replace('/[ _]+/u','-', $value);
    return $value;
}

function paginate($number_of_record, $total_record, $object)
{
    $pages = new Paginator($number_of_record, 'p');
    

    $categories = $object->genPaginate($pages->get_limit());
    $pages->set_total($total_record);
    
    
    return [$categories, $pages->page_links()];
}