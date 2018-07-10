<?php


kirbytext::$tags['imageslider'] = array(
  'attr' => array(
    'text',
    'gallery',
    'class',
    'aclass',
    'thumb',
    'caption'
    
  ),
  'html' => function($tag) {
    
    // File path
    $url     = $tag->attr('imageslider');
    $file    = $tag->file($url);
    $url = $file ? $file->url() : url($url);
    
    // Object to variabels
    $text    = $tag->attr('text');
    $data_fancybox = $tag->attr('gallery');
    $class     = $tag->attr('class');
    $aclass = $tag->attr('aclass');
    $caption = $tag->attr('caption');
    
    

    $html = '<figure >';
    $html .= '<a ';
    $html .= 'href="' . $url . ' "';
    $html .= 'data-fancybox="' . $data_fancybox . ' "';
    $html .= 'class="imageslider ' . $class . ' "';
    $html .= 'data-caption="' . $caption . ' "';
    $html .= '>';
    $html .= '<img '; 
    $html .= 'src="' . $url . ' "';
    $html .= 'class="img-fluid ' . $aclass . ' "';
    $html .= '>';
    $html .= $text . '</a>';
    $html .= '</figure>';

                 

    return $html;            

  }
);


?>