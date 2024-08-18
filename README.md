# LangLearnParser

A PHP class for parsing and organizing language learning tutorials from text files.

This tool is inspired by the simplicity of Markdown and is an alternative to more complicated development processes that require a form and database processing.

## How it works 

You write your tutorial in a text file. 

	>>> This is a chapter title

	This itdentifies a side-by-side translation. >> Tämä tunnistaa vierekkäisen käännöksen.

	This is a normal line of text. 


Tutorials go in `src/tutorials`. 

Tutorials are linked in `src/templates/tutorial.latte`
