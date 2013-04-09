<?php

$elemid = (isset($elemid))? $elemid: 'lxir-meta';
$itemprop = (isset($itemprop))? 'itemprop="'.$itemprop.'"' : '';
$itemref = (isset($itemref))? 'itemref="'.$itemref.'"' : '';

?>
<div id="<?php echo $elemid; ?>" <?php echo $itemprop; ?> itemscope itemtype="http://schema.org/LocalBusiness" <?php echo $itemref; ?> >
   
</div>