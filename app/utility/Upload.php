<?php
namespace Utility;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Helpers\Common;

class Upload {

	private $status = array("status"=>"1", "message"=>"");

    private $uploadFileInfo = array();

	private $defaultPath = null;

	private $defaultExtension = null;

	private $config = null;

	private $crypt = null;

    public function __constuct(Config $config, Crypt $crypt){
    	$this->config = $config;
    	$this->$crypt = $crypt;
    	$this->$defaultPath = Config::get('upload.image_path')."default";
    	$this->defaultExtension = Config::get('upload.default_extension');
    }

    public function getStatus(){
    	return $this->status;
    }

    public function getFileInfo(){
    	return $this->uploadFileInfo;
    }

    public function upload($file, $data = null, $uploadPath = null)
    {	
        Common::tracing('upload method triggerd'); 
        $options = array();
        $absoluteabsoluteSavePath = "";
    	try{
	    	if(!$file->isValid()){
	    		$this->status['status']= '0';
	    		$this->status['message']= '无法读取上传文件';
	    		return false;
	    	}else{
                //
	    		$path_format = Config::get('upload.path_format');
	    		$extension = $file->getClientOriginalExtension() ? $file->getClientOriginalExtension():$defaultExtension;
	    		$options['path_format'] = date($path_format);
                $options['save_directory'] = (is_null($uploadPath) ? Config::get('upload.image_path'):$uploadPath).$options['path_format'];
	    		$options['save_name'] = uniqid().'.'.$extension;
	        	$absoluteSavePath = public_path().$options['save_directory'];
		        //如果不指定保存文件名，则由系统默认
		        $absoluteSavePath = !empty($absoluteSavePath)? $absoluteSavePath:$this->defaultPath;
		        if(!is_dir($absoluteSavePath))
		        	mkdir($absoluteSavePath,0777,true);
		        // 检查上传目录
		        if(!is_dir($absoluteSavePath)) {
		            // 检查目录是否编码后的
		            if(is_dir(base64_decode($absoluteSavePath))) {
		                $absoluteSavePath = base64_decode($absoluteSavePath);
		            }else{
		                // 尝试创建目录
		                if(!mkdir($absoluteSavePath, 0777, true)){
		                	$this->status['status']= '0';
	    					$this->status['message'] = '上传目录'.$_absoluteSavePath.'不存在';
		                    return false;
		                }
		            }
		        }else {
		            if(!is_writeable($absoluteSavePath)) {
		            	$this->status['status']= '0';
	    				$this->status['message'] = '上传目录'.$absoluteSavePath.'不可写'; 
		                return false;
		            }
		        }
				$this->uploadFileInfo['type'] = $file->getMimeType(); 
				$this->uploadFileInfo['size'] = $file->getSize();
				$this->uploadFileInfo['extension'] = $file->getClientOriginalExtension();
				$this->uploadFileInfo['save_path'] = $options['save_directory'].$options['save_name'];
                $this->uploadFileInfo['save_name'] = $options['save_name'];
				$this->uploadFileInfo['save_domain'] = Config::get('app.url');
		        $this->uploadFileInfo['name'] = $file->getClientOriginalName();
		        $this->uploadFileInfo['hash'] = Crypt::encrypt($absoluteSavePath.$options['save_name']);
                if(isset($data)){
                    if($this->crop($file->getRealPath(), $absoluteSavePath.$options['save_name'], $data)){
                        $this->status['status']= '1'; 
                    }else{
                        $this->status['status']= '0';
                        return false;
                    }
                }else{
                    $file->move($options['save_directory'], $options['save_name']);
                }
                Common::tracing('upload method finished');  
		        return true;
	    	}
    	} catch (Exception $e) {
    		$this->status['status']= '0';
	    	$this->status['message'] = "上传文件失败请您稍后尝试重新上传"; 
    		return false;
    	} 

    }
    /**
	 * Crop Image read from $src based on $data and move file to $dst
     * $data = '{"x": x_value, "y":y_value, "width": width, "height": height}';
	 */
    private function crop($src, $dst, $data) {
        try{
            $imageType = exif_imagetype($src);
            if(isset($data))
                $cropData = json_decode(stripslashes($data));
            if (!empty($src) && !empty($dst) && !empty($data)) {
                switch ($imageType){
                    case IMAGETYPE_GIF:
                        $imageFromSrc = imagecreatefromgif($src);
                        break;

                    case IMAGETYPE_JPEG:
                        $imageFromSrc = imagecreatefromjpeg($src);
                        break;

                    case IMAGETYPE_PNG:
                        $imageFromSrc = imagecreatefrompng($src);
                        break;
                }

                if (is_null($imageFromSrc)){
                    $this->status['status']= '0';
                    $this->status['message'] = "无法读取用于裁剪的图片"; 
                    return false;
                }
                $imageFromDst = imagecreatetruecolor(220, 220);
                $result = imagecopyresampled($imageFromDst, $imageFromSrc, 0, 0, $cropData -> x, $cropData -> y, 220, 220, $cropData -> width, $cropData -> height);
                if ($result) {
                    switch ($imageType) {
                        case IMAGETYPE_GIF:
                            $result = imagegif($imageFromDst, $dst);
                            break;

                        case IMAGETYPE_JPEG:
                            $result = imagejpeg($imageFromDst, $dst);
                            break;

                        case IMAGETYPE_PNG:
                            $result = imagepng($imageFromDst, $dst);
                            break;
                    }

                    if (!$result) {
                        $this->status['status']= '0';
                        $this->status['message'] = "无法保存裁剪后图片";
                        return false; 
                    }
                } else {
                    $this->status['status']= '0';
                    $this->status['message'] = "无法裁剪图片"; 
                    return false;
                }
                imagedestroy($imageFromSrc);
                imagedestroy($imageFromDst);
                return true;
            }
        } catch (Exception $e) {
            $this->status['status']= '0';
            $this->status['message'] = "裁剪文件失败"; 
            return false;
        } 
    }
}