<?php

namespace LangLearnParser\Classes;

class FileParser
{
    /**
     * Reads a file and parses its content into an array.
     * 
     * @param string $filePath Path to the file to be read.
     * @return array Parsed content from the file.
     */
    public static function parseFile($filePath)
    {
        $lines = [];

        // Check if the file exists before trying to open it
        if (!file_exists($filePath)) {
            throw new \Exception("File does not exist: " . $filePath);
        }

        // Open the file for reading
        $handle = fopen($filePath, 'r');

        if ($handle) {
            // Read each line of the file
            $chapterNumber = 0;
            $tag = '';

            while (($line = fgets($handle)) !== false) {
                // Trim whitespace from the line
                $line = trim($line);

                // Check for lines starting with '>>>'
                if (strpos($line, '>>>') === 0) {
                    // Remove '>>>' and any leading/trailing whitespace
                    $chapter = trim(substr($line, 3));
                    $lines[] = ['chapter_'.$chapterNumber => $chapter];
                    $chapterNumber++;
                } else {
                    // Split the line at '>>'
                    $parts = explode('>>', $line);

                    // Trim whitespace and add to the array if there are exactly two parts
                    if (count($parts) === 2) {
                        $lines[] = [
                            'translation' => [
                                'left' => trim($parts[0]),
                                'right' => trim($parts[1])
                            ]
                        ];
                    } else {
                        // If not split into two parts, treat as a regular line
                        $lines[] = [trim($tag . $line)];
                    }
                }
            }

            // Close the file
            fclose($handle);
        } else {
            throw new \Exception("Unable to open the file: " . $filePath);
        }

        return $lines;
    }

}

