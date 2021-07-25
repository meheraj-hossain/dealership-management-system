<?php
function managePaginationSerial($obj){
    $serial=1;
    if($obj->currentPage()>1){
        $serial=$obj->perPage()*($obj->currentPage()-1)+1;
    }
    return $serial;
}
