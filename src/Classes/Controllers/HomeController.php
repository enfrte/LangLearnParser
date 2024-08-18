<?php 

namespace LangLearnParser\Classes\Controllers;

use LangLearnParser\Classes\FileParser;
use Flight;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class HomeController 
{

	function index() {
		try {
			// Get the filename from the GET request
			$fileName = isset($_GET['file']) ? $_GET['file'] : null;
			$parsedData = [];

			if ( !empty($fileName) ) {
				// Construct the file path
				$filePath = __DIR__ . '/../../tutorials/' . $fileName;
				
				if ( !file_exists($filePath) ) {
					throw new \Exception("Error: File does not exist: ". htmlspecialchars($filePath));
				}
				
				$parsedData = FileParser::parseFile($filePath);

				// echo '<pre>';
				// print_r($parsedData);
			}

			Flight::latte()->render('tutorial.latte', [
				'data' => $parsedData,
			]);
		
		} catch (\Exception $e) {
			echo 'Error: ' . htmlspecialchars($e->getMessage());
		}
	}
}
