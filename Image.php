<?php
if($_FILES)
{

    $resultArray = array();
	
	foreach ( $_FILES as $file){
		$fileName = $file['name'];
		$tmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileType = $file['type'];
	    $tipo = explode('.', $fileName);		
		$tipo = $tipo[1];
		$nome_url1 = md5(microtime(true)) . '.' . $tipo;		
		$base_url="http://".$_SERVER['SERVER_ADDR']."/MAILTODB/assets/upload/";
		$current_dir=$_SERVER['DOCUMENT_ROOT']."/MAILTODB/assets/upload/";
		error_log("base url  : ".$base_url);	
		$CurrentURL=$current_dir.basename($nome_url1);
		$base_dir=$base_url.basename($nome_url1);
	if(move_uploaded_file($file['tmp_name'], $CurrentURL)){
		error_log("Im here ");		
		error_log($base_dir);
                $images = array(
				'name'=>$file['name'],
				'type'=>'image',
				'src'=>$base_dir,
				'height'=>350,
				'width'=>250                   
				);
				array_push($resultArray,$images); 
	}
	
	
 	}    
$response = array( 'data' => $resultArray );
echo json_encode($response);
}
?>

/*	if($move_status)
		{
		$this->add($fileName, $nome_url1);
		$images = array([
		'src' =>$current_dir.basename($nome_url1)
		]);
		error_log($images);
		array_push($resultArray,$images);
		}

	*/
	/*	
        if ($file['error'] != UPLOAD_ERR_OK)
		{
				error_log($file['error']);
				echo JSON_encode(null);
		}
		$fp = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		fclose($fp);
	   $result=array(
				'name'=>$file['name'],
				'type'=>'image',
				'src'=>"data:".$fileType.";base64,".base64_encode($content),
				'height'=>350,
				'width'=>250
		);
// we can also add code to save images in database here.
		 array_push($resultArray,$result); */