<?php

namespace App\Http;

/**
 * Class Response
 *
 * @package \App\Http
 */
class Response {

	public function send($content) {
		echo $content;
	}

	public function sendJson(array $content) {
		header('Content-Type: application/json');
		echo json_encode($content);
		exit;
	}

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


	public function redirect($to) {
		header('Location: ' . $to);
		exit;
	}
}
