<?php 
namespace utility;
use Illuminate\Support\Facades\Config;

class Common{
        public static function ajaxReturn($status, $statusMessage){
        	$_layout = null;
        	switch ($status) {
        		case "info":
        			$_layout = "<div class=\"alert alert-success\" role=\"alert\">".$statusMessage."<div>";
        			break;
        		case "success":
        			$_layout = "<div class=\"alert alert-info\" role=\"alert\">".$statusMessage."</div>";
        			break;
        		case "warning":
        			$_layout = "<div class=\"alert alert-warning\" role=\"alert\">".$statusMessage."</div>";
        			break;
        		case "danger":
        			$_layout = "<div class=\"alert alert-danger\" role=\"alert\">".$statusMessage."</div>";
        			break;
        		default :
        			$_layout = "<div class=\"alert alert-success\" role=\"alert\">".$statusMessage."<div>";
        			break;
        		}
        		if($_layout!=null)
        			return $_layout;
        		else
        			\Log::error('$_layout = null in Common::ajaxReturn');
        }
        public static function tracing($message, $type = null){
                if(Config::get('app.tracing_enabled')){   
                        echo sprintf(Config::get('app.tracing_format'), $message.' @ '.date("Y-m-d H:i:s").'</br>');
                }
        }
}


