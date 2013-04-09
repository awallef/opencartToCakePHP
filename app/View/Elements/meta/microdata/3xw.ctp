<?php

$elemid = (isset($elemid)) ? $elemid : '3xw-meta';
$itemprop = (isset($itemprop)) ? 'itemprop="' . $itemprop . '"' : '';
$itemref = (isset($itemref))? 'itemref="'.$itemref.'"' : '';

?>
<div id="<?php echo $elemid; ?>" <?php echo $itemprop; ?> itemscope itemtype="http://schema.org/LocalBusiness" <?php echo $itemref; ?> >
    <meta itemprop="name" content="3xw Sarl" />
    <meta itemprop="description" content="3xW is a new generation web agency based in Lausanne, Switzerland. Definitely oriented new technologies and always up-to-date, we principally develop responsive websites that fit to all devices" />
    <meta itemprop="url" content="http://www.3xw.ch" />
    <meta itemprop="image" content="http://www.3xw.ch/img/3xw_logo.png" />

    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
        <meta itemprop="email" content="info@3xw.ch" />
        <meta itemprop="telephone" content="+41 21 535 48 02" />

        <meta itemprop="addressCountry" content="Switzerland" />
        <meta itemprop="addressLocality" content="Belmont-sur-Lausanne" />
        <meta itemprop="addressRegion" content="Vaud" />
        <meta itemprop="postalCode" content="1092" />
        <meta itemprop="streetAddress" content="chemin de la Cure 12" />
    </div>
</div>