<?php
require_once('functions.php');
require_once('templates/index.php');
require_once('templates/layout.php');

$page_content = include_template('templates/index.php', [
    'categories' => $categories,
    'ads' => $ads
]);

$layout_content = include_template('templates/layout.php', [
    'content' => $page_content,
    'user_name' => $user_name,
    'title' => $title
]);
print($layout_content);
?>