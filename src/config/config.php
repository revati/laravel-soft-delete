<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Resource default routes
    |--------------------------------------------------------------------------
    |
    | List off all routes that should be reated by default
    | Can be overwriten for each Route::resource as usual
    |
    | Supports:
    |   index           - Resource list
    |   create          - Resource create form
    |   store           - Resource storing (creating new) in db
    |   show            - Single resource showing
    |   edit            - Resource edit form
    |   update          - Resource updating
    |   destroy         - Resource delete (softly)
    |   forceDestroy    - Resource delele (from db)
    |   restore         - Restore soft-deleted resource
    |   trash           - Soft-deleted resource list
    */

    'resourceDefaults' => array('index', 'create', 'store', 'show', 'edit', 'update', 'destroy', 'forceDestroy', 'restore', 'trash'),

);
