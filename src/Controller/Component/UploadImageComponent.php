<?php 
declare(strict_types=1);
namespace App\Controller\Component;
use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class UploadImageComponent extends Component
{
    public function do_upload_image($customName,$file,$folder,$model)
	{	   
	
	 // $objImageSize = TableRegistry::get('ImageSizes');
	    
					
		$max_size	= 0;
		$max_width	= 0;
		$max_height	= 0;
		$fileUploadType = 'image';
		$file_field		= "Filedata";
		$file_counter = 0;
		$upload_path	= WWW_ROOT."upload/".$folder."/";
		$array1_replace = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',',DS,'*','+','~','`','=');
		$array2_replace = array('','','','','','','','','','','','','','','','','','','','','','','','','');
		
		$path_parts = pathinfo($file["name"]);
		$extension = $path_parts['extension'];
		$file_name	= str_replace($array1_replace, $array2_replace, $customName).'_'.time().".".$extension;
		//echo $_FILES[$file_field]['tmp_name'];die;
		if($file['error']=='0')
		{   
			if(move_uploaded_file($file['tmp_name'], $upload_path.$file_name)){
				
				$uploaddir  			= $upload_path;
				//$thumb_target_path		= $uploaddir.$file_name;
				$target_path      		= $upload_path.$file_name;

				$widthNew 				= 120;
				$heightNew 				= 90;
				$ext = ".".$extension;
				
				list($width, $height, $type, $attr) = getimagesize($target_path); 
				//echo $width;
				//echo "<br>";
				//echo $height;die;
				if(($max_width==0 && $max_height == 0)||($max_width==$width && $max_height==$height))
				{	
				/*$imageSize=$objImageSize->find()->where(['image_name'=>$customName])->contain(['ScreenSizes']);
		
		
				
						
						
						
						
					foreach($imageSize as $image){
						
					 $thumb_target_path      		= $upload_path.$image->screen_size->width."X".$image->screen_size->height."/".$file_name;
						
						$widthNew 		=$image->width;
						$heightNew	 	=$image->height;
						$this->make_thumb($target_path,$thumb_target_path,$widthNew,$heightNew,$ext);
						//$image->width
						
						
						}*/				
					
					//$this->make_thumb($target_path,$thumb_target_path,$widthNew,$heightNew,$ext);
					//$this->make_thumb($target_path,$thumb_target_path,$widthNew,$heightNew,$ext);
					//$returnstr = $file_name.':'.$fileUploadType;
				}
				else{					
					@unlink($target_path);
					$returnstr =  "IMG_DIMENSION_ERROR:Please upload image of size ".$max_width." x ".$max_height." pixels";
				}
				
			}
		}
			
		
		return $file_name;// Return the info to the script
		//exit();

	}
	
    public function do_upload_image_biswa($customName,$file,$folder,$model)
	{
	    
	   
	    
	    	$file_name = $file["name"];
            $file_type = $file["type"];
            $temp_name = $file["tmp_name"];
            $file_size = $file["size"];
            $error = $file["error"];
            
        $upload_path	= WWW_ROOT."upload/".$folder."/";
		$array1_replace = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',',DS,'*','+','~','`','=');
		$array2_replace = array('','','','','','','','','','','','','','','','','','','','','','','','','');
		
		$path_parts = pathinfo($file["name"]);
		$extension = $path_parts['extension'];
		$file_name	= str_replace($array1_replace, $array2_replace, $customName).'_'.time().".".$extension;

    
    if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg"))
    {
        //$filename = compress_image($temp_name, $upload_path.$file_name, 80);
        
        $info = getimagesize($temp_name);
        list($width, $height, $type, $attr) = getimagesize($temp_name);
        
        if($width>1 && $height>2)
		{
        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($temp_name);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($temp_name);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($temp_name);
        imagejpeg($image, $upload_path.$file_name, 80);
        return $file_name;
		}
		else
		{
		    return "123";
		}
    }
    

	}
	
	public function do_upload_image_biswa_cake4($customName,$file,$folder,$model)
	{
	    
	   
	    
	    
            $file_name = $file["name"];
            $file_type = $file["type"];
            $temp_name = $file["tmp_name"];
            $file_size = $file["size"];
            $error = $file["error"];
            
        $upload_path	= WWW_ROOT."upload/".$folder."/";
		$array1_replace = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',',DS,'*','+','~','`','=');
		$array2_replace = array('','','','','','','','','','','','','','','','','','','','','','','','','');
		
		$path_parts = pathinfo($file["name"]);
		$extension = $path_parts['extension'];
	    $file_name	= str_replace($array1_replace, $array2_replace, $customName).'_'.time().".".$extension;
         
            
            
    
		if(!empty($file_name)) {
		    
		    
		
		if(move_uploaded_file($temp_name, $upload_path.$file_name)) {
		    
		    
                           
           return $file_name;
            
        }
		}
		

    

    

	}
	
	// image compress
	
	public function do_upload_image_compress($customName,$file,$folder,$model)
	{
	    
	   
	    
	    	$file_name = $file["name"];
            $file_type = $file["type"];
            $temp_name = $file["tmp_name"];
            $file_size = $file["size"];
            $error = $file["error"];
            
        $upload_path	= WWW_ROOT."upload/".$folder."/";
		$array1_replace = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',',DS,'*','+','~','`','=');
		$array2_replace = array('','','','','','','','','','','','','','','','','','','','','','','','','');
		
		$path_parts = pathinfo($file["name"]);
		$extension = $path_parts['extension'];
		$file_name	= str_replace($array1_replace, $array2_replace, $customName).'_'.time().".".$extension;

    
    if (($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/png") || ($file_type == "image/pjpeg") || ($file_type == "image/pdf"))
    {
        //$filename = compress_image($temp_name, $upload_path.$file_name, 80);
        
        $info = getimagesize($temp_name);

        if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($temp_name);
        elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($temp_name);
        elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($temp_name);
        elseif ($info['mime'] == 'image/pdf') $image = imagecreatefrompng($temp_name);
        imagejpeg($image, $upload_path.$file_name, 80);
        return $file_name;
	
    }
    

	}

	 public function do_upload_profileimage($customName,$file,$folder,$model)
	{	   
	
	 
	    
					
		$max_size	= 0;
		$max_width	= 0;
		$max_height	= 0;
		$fileUploadType = 'image';
		$file_field		= "Filedata";
		$file_counter = 0;
		$upload_path	= WWW_ROOT."upload/".$folder."/";
		$array1_replace = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',',DS,'*','+','~','`','=');
		$array2_replace = array('','','','','','','','','','','','','','','','','','','','','','','','','');
		
		$path_parts = pathinfo($file["name"]);
		$extension = $path_parts['extension'];
		$file_name	= str_replace($array1_replace, $array2_replace, $customName).'_'.time().".".$extension;
		//echo $_FILES[$file_field]['tmp_name'];die;
		if($file['error']=='0')
		{   
			if(move_uploaded_file($file['tmp_name'], $upload_path.$file_name)){
				
				$uploaddir  			= $upload_path;
				//$thumb_target_path		= $uploaddir.$file_name;
				$target_path      		= $upload_path.$file_name;

				$widthNew 				= 120;
				$heightNew 				= 90;
				$ext = ".".$extension;
				
				list($width, $height, $type, $attr) = getimagesize($target_path); 
				//echo $width;
				//echo "<br>";
				//echo $height;die;
				if(($max_width==0 && $max_height == 0)||($max_width==$width && $max_height==$height))
				{	
				
						
					 $thumb_target_path      		= $upload_path."thumb/".$file_name;
						
						$widthNew 		=75;
						$heightNew	 	=75;
						$this->make_thumb($target_path,$thumb_target_path,$widthNew,$heightNew,$ext);
						//$image->width
						
						
						
					
					//$this->make_thumb($target_path,$thumb_target_path,$widthNew,$heightNew,$ext);
					//$this->make_thumb($target_path,$thumb_target_path,$widthNew,$heightNew,$ext);
					//$returnstr = $file_name.':'.$fileUploadType;
				}
				else{					
					@unlink($target_path);
					$returnstr =  "IMG_DIMENSION_ERROR:Please upload image of size ".$max_width." x ".$max_height." pixels";
				}
				
			}
		}
			
		
		return $file_name;// Return the info to the script
		//exit();

	}
	
	
	
	
	
	
	
	function maximagesize($customName,$screen_size_id){
		  //$objImageSize = TableRegistry::get('ImageSizes');
		 // $imageSize=$objImageSize->find()->where(['image_name'=>$customName,'screen_size_id'=>$screen_size_id])->toArray();
		  
		  return   $imageSize;
		}
	function UnlinkImage($image="")
	{
		if(!empty($image))
		{
			$image_path	= WWW_ROOT."ScreenElement/".$image;
			$thumb_path = WWW_ROOT."specialVenueImage/thumbnail/".$image;
			if(file_exists($image_path))
			{
				if(unlink($image_path))
				{
					if(file_exists($thumb_path))
					@unlink($thumb_path);
				}
			}
		}
	}
	public function make_thumb($img_name,$filename,$new_w,$new_h,$ext,$crop=false)
	{
			//get image extension.
			
			//creates the new image using the appropriate function from gd library
			
			/*echo $img_name;
			echo "<br>";
			echo $filename;
			echo "<br>";
			echo $new_w;
			echo "<br>";
			echo $new_h;
			echo "<br>";
			echo $ext;die;*/
			
			
			
			if(!strcmp(".jpg",$ext) || !strcmp(".jpeg",$ext))
			{
				$src_img=@imagecreatefromjpeg($img_name);
				/*$exif = exif_read_data($img_name);

				if (!empty($exif['Orientation'])) {
					switch ($exif['Orientation']) {
						case 3:
							$src_img = imagerotate($src_img, 180, 0);
							break;
			
						case 6:
							$src_img = imagerotate($src_img, -90, 0);
							break;
			
						case 8:
							$src_img = imagerotate($src_img, 90, 0);
							break;
					}
				}*/
			
			}

			if(!strcmp(".gif",$ext))
			$src_img=@imagecreatefromgif($img_name);

			if(!strcmp(".bmp",$ext))
			$src_img=@imagecreatefromwbmp($img_name);


			if(!strcmp(".png",$ext))
			$src_img=@imagecreatefrompng($img_name);

			if($src_img){
			//gets the dimmensions of the image
			$old_x=imagesx($src_img);
			$old_y=imagesy($src_img);



			// next we will calculate the new dimmensions for the thumbnail image
			// the next steps will be taken:
			// 1. calculate the ratio by dividing the old dimmensions with the new ones
			// 2. if the ratio for the width is higher, the width will remain the one define in WIDTH variable
			// and the height will be calculated so the image ratio will not change
			// 3. otherwise we will use the height ratio for the image
			// as a result, only one of the dimmensions will be from the fixed ones
			$ratio1=$old_x/$new_w;
			$ratio2=$old_y/$new_h;
			if($ratio1>$ratio2) {
				$thumb_w=$new_w;
				//$thumb_h=$old_y/$ratio1;
			}
			else {
				$thumb_h=$new_h;
				$thumb_w=$old_x/$ratio2;
			}

			if($crop==true){
				$thumb_h=$new_h;
				$thumb_w=$new_w;
			}
			   $thumb_h=$new_h;
				$thumb_w=$new_w;
			// we create a new image with the new dimmensions
			$dst_img=imagecreatetruecolor($thumb_w,$thumb_h);

			/*********************************************************************************************************************************
			if($transparency)
			{*/
				if($ext==".png") {
					imagealphablending($dst_img, false);
					$colorTransparent = imagecolorallocatealpha($dst_img, 0, 0, 0, 127);
					imagefill($dst_img, 0, 0, $colorTransparent);
					imagesavealpha($dst_img, true);
				}
				elseif($ext==".gif") {
					$trnprt_indx = imagecolortransparent($src_img);
					if ($trnprt_indx >= 0) {
						//its transparent
						$trnprt_color = imagecolorsforindex($src_img, $trnprt_indx);
						$trnprt_indx = imagecolorallocate($dst_img, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
						imagefill($dst_img, 0, 0, $trnprt_indx);
						imagecolortransparent($dst_img, $trnprt_indx);
					}
				}
			/*}
			else
			{
				Imagefill($dst_img, 0, 0, imagecolorallocate($dst_img, 255, 255, 255));
			}
			*********************************************************************************************************************************/
			// resize the big image to the new created one
			if($crop==true){
				imagecopy($dst_img,$src_img, 0, 0, 0, 0, $thumb_w, $thumb_h);
				//imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
			}else{
				//echo 'hi';
				imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
			}
			//imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

			// output the created image to the file. Now we will have the thumbnail into the file named by $filename
			if(!strcmp(".png",$ext))
				imagepng($dst_img,$filename);
			else
				imagejpeg($dst_img,$filename);

			if(!strcmp(".gif",$ext))
				imagegif($dst_img,$filename);
			if(!strcmp(".bmp",$ext))
				imagewbmp($dst_img,$filename);



			//destroys source and destination images.
			imagedestroy($dst_img);
			imagedestroy($src_img);

			return true;
			}else{
				return false;
			}
		}
	public function do_upload_media_file($customName,$file,$folder,$model)
	{	   
	
	
	    
					
		$max_size	= 0;
		$max_width	= 0;
		$max_height	= 0;
		$fileUploadType = 'image';
		$file_field		= "Filedata";
		$file_counter = 0;
		$upload_path	= WWW_ROOT."upload/".$folder."/";
		$array1_replace = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','_','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',',DS,'*','+','~','`','=');
		$array2_replace = array('','','','','','','','','','','','','','','','','','','','','','','','','');
		
		$path_parts = pathinfo($file["name"]);
		$extension = $path_parts['extension'];
		$file_name	= str_replace($array1_replace, $array2_replace, $customName).'_'.time().".".$extension;
		//echo $_FILES[$file_field]['tmp_name'];die;
		if($file['error']=='0')
		{   
			if(move_uploaded_file($file['tmp_name'], $upload_path.$file_name)){
				
				}
		}
			
		
		return $file_name;// Return the info to the script
		//exit();

	
		
		}
	
}
