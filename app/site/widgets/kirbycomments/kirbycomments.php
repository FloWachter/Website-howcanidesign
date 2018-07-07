<?php  

// return array(
//   'title' => 'kirby Comment widget',
//   'options' => array(
//     array(
//       'text' => 'Edit Comments',
//       'icon' => 'pencil',
//       'link' => 'kirbycomments.html.php'
//     )
//   ),
//   'html' => function() {
//     return tpl::load(__DIR__ . DS . 'kirbycomments.html.php');
//   }
// );

// return array(
//   'title' => 'kirby Comment widget',
//   'options' => array(),
//   'html'    => function() {

//     return tpl::load(__DIR__ . DS . 'kirbycomments.html.php', array(
//       'text' => 'This is some text for the widget template'
//     ));

//   }
// );



return array(
  'title'   => 'kirby Comment widget',
  'options' => array(),
  'html'    => function() {
    return tpl::load(__DIR__ . DS . 'kirbycomments.html.php');
  }
);



?>