<?php
/*
--------------------------------------
Custom Kurby text
--------------------------------------
Link: https://getkirby.com/docs/developer-guide/kirbytext/tags
*/

kirbytext::$tags['user'] = array(
  'html' => function($tag) {
    return site()->user();
  }
);
