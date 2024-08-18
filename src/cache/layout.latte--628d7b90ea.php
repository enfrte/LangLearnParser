<?php

use Latte\Runtime as LR;

/** source: layout.latte */
final class Template_628d7b90ea extends Latte\Runtime\Template
{
	public const Source = 'layout.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>FooBar</title>

    <script src="assets/htmx.min.js"></script>
</head>
<body>

<div class="container">';
		$this->renderBlock('content', get_defined_vars()) /* line 15 */;
		echo '</div>

</body>
</html>
';
	}


	/** {block content} on line 15 */
	public function blockContent(array $ʟ_args): void
	{
	}
}
