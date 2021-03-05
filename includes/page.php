<?php

use PowerDistribution\Access\Command;
use PowerDistribution\Access\Query;
use PowerDistribution\Access\Database;

class Context extends stdClass
{
    function dispatch($routes)
    {
        $this->dispatch_multi_page($routes);
    }
    
    function dispatch_multi_page($routes)
    {
        // strict mode `E_ALL`
        $page = array();
        if(array_key_exists($this->uri, $routes)) {
            $page = call_user_func($routes[$this->uri]['callable'], $this, $routes[$this->uri], $page);
            $this->page_variables['html_content'] .= call_user_func('page_execute_script', $page, $this, $routes[$this->uri]);
            echo render_template(PAGE_ROOT . "/templates/page.tpl.php", $this->page_variables);
        } elseif(count(array_intersect_key($this->variables, $routes)) > 0 &&
            ($key = array_keys(array_intersect_key($this->variables, $routes))[0])
            && $this->http_method == $routes[$key]['method']) {
            if(!empty($routes[$key]['headers']) && !headers_sent()) {
                foreach($routes[$key]['headers'] as $header) {
                    header($header); // send headers
                }
            }
            $page = call_user_func($routes[$key]['callable'], $this, $routes[$key], $page);
            $this->page_variables['api_content'] = $page['content'];
            echo $this->page_variables['api_content'];
        } elseif(count(array_intersect_key($this->variables, $routes)) > 0) {
            $key = array_keys(array_intersect_key($this->variables, $routes))[0];
            $page = call_user_func($routes[$key]['callable'], $this, $routes[$key], $page);
            $this->page_variables['html_content'] .= call_user_func('page_execute_script', $page, $this, $routes[$key]);
            echo render_template(PAGE_ROOT . "/templates/page.tpl.php", $this->page_variables);
        } else {
            echo render_template(PAGE_ROOT . "/templates/page.tpl.php", $this->page_variables);
        }
    }
}

function get_page_context() {
    $output = array();
    $params = array();
    $context = new Context();
    $context->uri = $_SERVER['REQUEST_URI'];
    $context->path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $context->http_method = $_SERVER['REQUEST_METHOD'];
    $context->query = $_SERVER['QUERY_STRING'];
    $context->host = $_SERVER['HTTP_HOST'];
    $context->is_https = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : false;
    $context->ip = $_SERVER['REMOTE_ADDR'];
    $context->q = isset($_GET['q']) ? $_GET['q'] : '';
    parse_str($context->q, $output);
    $context->variables = $output;
    $context->page_variables = array('html_content' => '');
    if(isset($_POST)) {
        $keys = array_keys($_POST);
        $context->post_array = [];
        foreach($keys as $key) {
            $context->post_array[$key] = filter_input(INPUT_POST, $key, FILTER_DEFAULT, null);
        }
        $_POST = null;
    }
    
    return $context;
}

function render_template($filePath, $variables) {
    extract($variables);
    ob_start();
    require($filePath);
    $contents = ob_get_clean();
    return $contents;
}

function render($content) {
    if (empty($content))
        return "";
    $result = "";
    if(is_string($content)) return $content;
    foreach($content as $row) {
        $result .= $row;
    }
    return $result;
}

function page_execute_script($page, $context, $route) {
    return render_template(PAGE_ROOT . "/templates/layout.tpl.php", array('page' => $page, 'section_name' => $page['section_name']));
}

function page_shutdown_site() {
    
    // session_destroy();

    session_write_close();
    
}

function page_get_home($context, $route, $page) {
    ob_start();
    require_once PAGE_ROOT . "/pages/home/home.php";
    $page['content'] = ob_get_clean();
    $page['section_name'] = "home";
    return $page;
}

function page_post_distros_save($context, $route, $page) {
    $cmd = new Command(Database::getConnection());

    $cartesian = filter_var($context->post_array["cartesian"], FILTER_FORCE_ARRAY, null);
    $templated = filter_var($context->post_array["templated"], FILTER_FORCE_ARRAY, null);
    $cartesian_size = filter_var($context->post_array["cartesian_size"], FILTER_DEFAULT, null);
    $templated_size = filter_var($context->post_array["templated_size"], FILTER_DEFAULT, null);

    $cmd->saveDrawing("cartesian", $cartesian, "cartesian_items");
    $cmd->saveDrawing("templated", $templated, "templated_items");
    
    $cmd->saveParameters("cartesian", $cartesian_size, "cartesian_size");
    $cmd->saveParameters("templated", $templated_size, "templated_size");
}