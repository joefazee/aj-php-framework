<?php

function render(string $templatePath, array $data = [], $render = true): ?string {
	extract($data);
	ob_start();
	$fullPath = APP_PATH . '/templates/' .  $templatePath . '.php';
	require_once $fullPath;
	$content = ob_get_contents();
	ob_clean();

	if($render) echo $content;

	return $content;
}


function include_template($path) {
	require_once( APP_PATH . '/templates/' .  $path);
}
