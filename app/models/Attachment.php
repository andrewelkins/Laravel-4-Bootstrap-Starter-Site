<?php

class Attachment extends Eloquent {
	protected $fillable = [];
	private $status = array("status"=>"1", "message"=>"");

	public function uploadFile($uid, $file, &$out_id, $data = null, $path = null){
		try{
			if($file->isvalid()){
				$upload = new Upload;
				if($upload->upload($file, $data, $path)){
					$uploadFileInfo = $upload->getFileInfo();
					$this->user_id = $uid;
					$this->type = $uploadFileInfo['type']; 
					$this->size = $uploadFileInfo['size'];
					$this->extension = $uploadFileInfo['extension'];
					$this->save_path = $uploadFileInfo['save_path'];
					$this->save_name = $uploadFileInfo['save_name'];
					$this->save_domain = $uploadFileInfo['save_domain'];
					$this->name = $uploadFileInfo['name'];
					$this->hash = $uploadFileInfo['hash'];
					if($this->save()){
						$out_id = $this->id;
						return true;
					}
					else{
						$this->status['status']= '0';
			    		$this->status['message'] = Upload::getStatus()['message'];
			    		return false;
					}
				}else{
					$this->status['status']= '0';
		    		$this->status['message'] = Upload::getStatus()['message'];
		    		return false;
				}
			}else{
					$this->status['status']= '0';
		    		$this->status['message'] = "上传文件为非法文件,请您稍后尝试重新上传";
		    		return false;
			}
		} catch (Exception $e) {
    		$this->status['status']= '0';
	    	$this->status['message'] = "上传文件到数据库时出错,请您稍后尝试重新上传"; 
    		return false;
    	} 
	}
    public function getStatus(){
    	return $this->status;
    }
}