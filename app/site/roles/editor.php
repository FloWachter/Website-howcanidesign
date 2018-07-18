<?php

return [
  'name'        => 'Editor',
  'default'     => false,
  'permissions' => [
    '*'                 => true,
    'panel.site.update' => false,
    'panel.user.*'      => false,
    'panel.user.read'   => true,
    'panel.user.update' => function() {

      if($this->user()->is($this->target()->user())) {
        // users are allowed to edit their own information
        return true;
      } else {
        // other users can't be edited
        return false;
      }

    }
  ]
];