<?php
    
if(array_key_exists('items', $item) )
{
    $content = '';
    foreach( $item['items'] as $i ){
        $content .= $this->element('meta/generic', array( 'item' => $i ));
    }
    unset($item['items']);
    
    $meta = '<div ';
    foreach( $item as $p => $v )
    {
        if( $p == 'itemtype' ) $meta .=' itemscope ';
        $meta .= $p.'="'.$v.'" ';
    }
    
    $meta .= ' >';
    
    echo $meta . $content . '</div>';
    
}else{
    $meta = '<meta ';
    foreach( $item as $p => $v )
    {
        if( $p == 'itemtype' ) $meta .=' itemscope ';
        $meta .= $p.'="'.$v.'" ';
    }
    
    echo $meta . ' />';
}

?>