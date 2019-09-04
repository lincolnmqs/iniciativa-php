<?php
	$utf8 = header("Content-Type>text/html; charset=utf8"); // retorna os caracteres corrigidos
	$link = new mysqli('200.131.11.23', 'grupo1', 'senhagrupo!', 'grupo1');
	$link->set_charset('utf8');