<?php
function __autoload($className) 
{
	$arr= explode("\\",$className);
	$className = array_pop($arr);
	
	$dirs = array("lib","lib/entities/application","lib/entities","lib/entities/application/helpers");
			
	foreach($dirs as $dir)
	{
		$file = BASE_DIR."/".$dir."/class.".strtolower($className).".php";
		if(file_exists($file))
		{
			require_once($file);
		}
	}
}
?>
