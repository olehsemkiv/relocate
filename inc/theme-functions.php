<?php

/**
 * Before using `insertImage` function try the core WordPress
 * `wp_get_attachment_image` function instead
 */

/* insert image START */
function insertImage($file, $class = '', $width = 100, $height = 100, $return = 0)
{

  if (!empty($file)) {

    if (!is_array($file)) {
      $file_url = _IMAGES_ . '/' . $file;
      $file_title =  pathinfo($file, PATHINFO_FILENAME);
      $extension = pathinfo($file, PATHINFO_EXTENSION);
    } else {
      $file_url = $file['url'];
      $file_title = $file['alt'];
      $extension = pathinfo($file['filename'], PATHINFO_EXTENSION);
    }

    $context = stream_context_create(array(
      'http' => [
        'header' => 'Authorization: Basic ' . base64_encode("demo:a30599b78355")
      ],
      'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
      ],
    ));

    if (!@file_get_contents($file_url, false, $context) === false) {
      if ($extension == 'svg') {
        $content = file_get_contents($file_url, false, $context);
        $content = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $content);
        if ($return) {
          return $content;
        }

        echo $content;
      } else {
        $content = '<img 
                  class="' . $class . '" 
                  src="' . $file_url . '" 
                  alt="' . $file_title . '"
                  width="' . $width . '"
                  height="' . $height . '" 
              />';

        if ($return) {
          return $content;
        }

        echo $content;
      }
    }
  }
}
/* insert image END */

/* dump START */
function dd($arr)
{
  echo '<pre>';
  var_dump($arr);
  echo '</pre>';
  die;
}
/* dump END */

/* body class START */
function add_slug_body_class($classes)
{
  global $post;
  if (isset($post)) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    $classes[] = 'template-' . str_replace(".php", "", get_page_template_slug());
  }
  return $classes;
}
add_filter('body_class', 'add_slug_body_class');
/* body class END */