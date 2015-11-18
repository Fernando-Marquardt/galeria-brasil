<?php
/* ***********************************************
 *  Autor  : Sólon Albuquerque Góis
 *  E-mail : web@itnet.com.br
 *  licensa: Free
 * ***********************************************
*/
if (function_exists("set_time_limit")==1 and get_cfg_var("safe_mode")==0)
{
	@set_time_limit(0);
}

function my_fix_uri($url) {
	if(!empty($url))
	{
		return (substr($url,-1)=='/')? $url : $url.'/';
	}else{
		return './';
	}
}

function merge_pix($source, $insertfile, $new_filename, $pos=0, $opac=50, $output='jpg') {
	// find extension
	$insertfile_ext = split("[/\\.]", strtolower($insertfile));
	$n = sizeof($insertfile_ext)-1;
	$ext = $insertfile_ext[$n];
	if($ext=='jpg')
	{
		$insertfile_id = imagecreatefromjpeg($insertfile); 
	}elseif($ext=='png'){
		$insertfile_id = imagecreatefrompng($insertfile); 
	}elseif($ori_ext=='gif'){
		$insertfile_id = imagecreatefromgif($source);
		// Note: GIF support was been removed from ver 1.6
		// Patent problem. The patent expire july 2003
	}
	$source_id = imageCreateFromJPEG($source); 
	
	$source_width = imageSX($source_id); 
	$source_height = imageSY($source_id); 
	$merge_width = imageSX($insertfile_id); 
	$merge_height = imageSY($insertfile_id); 
	
	switch($pos)
	{
		case 0: //middle 
			$dest_x = ( $source_width / 2 ) - ( $merge_width / 2 ); 
			$dest_y = ( $source_height / 2 ) - ( $merge_height / 2 ); 
			break;
		case 1:  //top left 
			$dest_x = 0; 
			$dest_y = 0; 
			break;
		case 2: //top right 
			$dest_x = $source_width - $merge_width; 
			$dest_y = 0; 
			break;
		case 3: //bottom right 
			$dest_x = $source_width - $merge_width; 
			$dest_y = $source_height - $merge_height; 
			break;
		case 4: //bottom left 
			$dest_x = 0; 
			$dest_y = $source_height - $merge_height; 
			break;
		case 5: //top middle 
			$dest_x = ( ( $source_width - $merge_width ) / 2 ); 
			$dest_y = 0; 
			break;
		case 6: //middle right 
			$dest_x = $source_width - $merge_width; 
			$dest_y = ( $source_height / 2 ) - ( $merge_height / 2 ); 
			break;
		case 7: //bottom middle 
			$dest_x = ( ( $source_width - $merge_width ) / 2 ); 
			$dest_y = $source_height - $merge_height; 
			break;
		case 8: //middle left 
			$dest_x = 0; 
			$dest_y = ( $source_height / 2 ) - ( $merge_height / 2 ); 
			break;
	}
	if (function_exists('imagecopymerge'))
	{
		imagecopymerge($source_id, $insertfile_id, $dest_x, $dest_y, 0, 0, $merge_width, $merge_height, $opac); 
	}
	if($new_filename!='')
	{
		switch($output)
		{
			case 'jpeg':
				imagejpeg($source_id, $new_filename);
				break;
			case 'jpg':
				imagejpeg($source_id, $new_filename);
				break;
			case 'png':
				imagepng($source_id, $new_filename);
				break;
			case 'gif':
				imagegif($source_id, $new_filename);
				// Note: GIF support was been removed from ver 1.6
				// Patent problem. The patent expire july 2003
				break;
			case 'bmp':
				// only GD greater than ver 1.8
				imagewbmp($source_id, $new_filename);
				break;
			default:
				imagejpeg($source_id, $new_filename);
		}
	} else { // show
		header("Content-type: image/jpeg");
		imagejpeg($source_id,'',100);
	}
}

function add_zero_str($str,$len=0){
	$curr_len = strlen($str);
	$k = $len - $curr_len;
	if($k>0)
	{
		$str = str_repeat('0',$k) . $str;
	}
	return $str;
}
session_start();

if(!empty($HTTP_GET_VARS)) {
	while(list($xxxname, $value) = each($HTTP_GET_VARS)) {
		$$xxxname = $value;
    }
}
if(!empty($HTTP_POST_VARS)){
	while(list($xxxname, $value) = each($HTTP_POST_VARS)) {
		$$xxxname = $value;
	}
}


if ($action=='make_merge')
{
	echo '<h4>Adicionar Marca d´água</h4>';
	$dir_output = my_fix_uri($dir_output);
	$dir_source = my_fix_uri($dir_source);
	$watermark_opa = empty($watermark_opa)? 25 : $watermark_opa;
	
	echo 'gerando...';
	$handle = opendir($dir_source);
	while($dirname = readdir($handle))
	{
		if ($dirname !='.' && $dirname!='..')
		{
			$source_file = $dir_source . $dirname; 
			if(filetype($source_file)=='file')
			{
				echo '.';
				merge_pix($source_file, $watermark_file, $dir_output.$dirname, $watermark_pos, $watermark_opa);
			}
		}
	}
	closedir($handle);
	echo '<h4>Operação completa</h4>';

}
if ($action=='')
{
	echo '<h4>Erro: use o formulário de admin!</h4>';
}
echo "<a href=\"../admin/administrar.php\">voltar</a>";
?>
<meta http-equiv="refresh" content="4;URL=../admin/administrar.php">
