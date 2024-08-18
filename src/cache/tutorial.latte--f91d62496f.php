<?php

use Latte\Runtime as LR;

/** source: tutorial.latte */
final class Template_f91d62496f extends Latte\Runtime\Template
{
	public const Source = 'tutorial.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['line' => '8', 'key' => '9', 'text' => '9'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->parentName = 'layout.latte';
		return get_defined_vars();
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo "\n";
		if (!empty($data)) /* line 5 */ {
			echo '		<p class="pt-3"><a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(Flight::get('basePath'))) /* line 6 */;
			echo '">Home</a></p>

';
			foreach ($data as $line) /* line 8 */ {
				foreach ($line as $key => $text) /* line 9 */ {
					if (strpos($key, 'chapter_') !== false) /* line 10 */ {
						echo '					<h2 class="mt-5 mb-3">';
						echo LR\Filters::escapeHtmlText($text) /* line 11 */;
						echo '</h2>
';
					}
					echo "\n";
					if (is_int($key)) /* line 14 */ {
						echo '					';
						echo LR\Filters::escapeHtmlText($text) /* line 15 */;
						echo '<br>
';
					}
					echo "\n";
					if (strpos($key, 'translation') !== false) /* line 18 */ {
						echo '					<div class="d-flex align-items-top justify-content-between border border-1 p-2 mt-1 mb-1">
						<span class="flex-shrink-0 pe-2 border-end">';
						echo LR\Filters::escapeHtmlText($text['left']) /* line 20 */;
						echo '</span>
						<span class="flex-grow-1 w-100 border-start ps-2">';
						echo LR\Filters::escapeHtmlText($text['right']) /* line 21 */;
						echo '</span>
					</div>
';
					}

				}


			}

		} else /* line 26 */ {
			echo '		<h1 class="pt-5">Select a tutorial</h1>
		<ul>
            <li style="list-style-type: none;">
				<a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl(Flight::get('basePath'))) /* line 30 */;
			echo '?file=kotava_beginner.md">Kotava beginner</a>
			</li>
            <!-- Add more links as needed -->
        </ul>
';
		}
		echo "\n";
	}
}
