<?php

return $config = [
    'input'     => '<div class="form-group"><input class="form-control" type="{{type}}" name="{{name}}" {{attrs}}></div> ',
    'select'    => '<select class="form-control input-sm" {{attrs}} name={{name}}>{{content}}<select>',
    'button'    => '<div class="form-group"><button {{attrs}} type="submit">{{text}}</button></div>',
    'error'     => '<p class="text-danger"><i class="fa fa-times-circle-o"></i> {{content}}</p>',
];
