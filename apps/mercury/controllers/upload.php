<?php
class Upload {
	private $action = 0;
	
	
// 	$_POST['image']
	public  function _do($image) {
		
// 		echo "this is my image<br />";
// 		var_dump($image);
		$path = "views/Home/img/";
		
			$valid_formats = array("jpg", "png", "gif", "bmp", "svg", "tiff", "psd");
		
		
				foreach ($_FILES['image']['name'] as $index => $file) {
					$name = $_FILES['image']['name'][$index];
		
					if(strlen($name)) {
						list($txt, $ext) = explode(".", $name);
						if(in_array($ext,$valid_formats)) {
							if($size<(1024*1024)) {
								$actual_image_name = time()."_".$txt.".".$ext;
								$tmp = $_FILES['image']['tmp_name'][$index];
								if(move_uploaded_file($tmp, $path.$actual_image_name)) {
									echo '{"image":{"url":"'.$path.$actual_image_name.'"}}';
									//echo "<img src='./images/uploads/".$actual_image_name."' class='drag'>";
								} else {
									//echo "Upload fehlgeschlagen";
								}
							} else {
								//echo "Maximale Uploadgr&ouml;&szlig;e Ÿberschritten.";
							}
						} else {
							//echo "Ung&uuml;ltiges Dateiformat.";
						}
					} else {
						//echo "Bitte Bild ausw&auml;hlen";
					}
				}
		}
	
}
?>
