<!DOCTYPE html >
<html>

    <head>
        <?php echo $this->Html->charset(); ?>
        <title>palo-ma.com : <?php echo $title_for_layout; ?></title>

        <?php
        // METAS
        echo $this->element('meta/head/mobile');
        echo $this->element('meta/head/og');
        echo $this->element('meta/head/seo');

        echo $this->Html->meta('icon');

        echo $this->Html->css('screen');
        echo $this->Html->script('jquery-1.8.3.min');
        echo $this->Html->script('bootstrap.min');

        echo $scripts_for_layout;

        echo $this->element('ie/head');
        ?>

    </head>

    <body  itemscope itemtype="http://schema.org/WebPage" >

        <div id="container">
            <header id="header" >
                <?php echo $this->element('widgets/header'); ?>
            </header>
            
            <section id="content" >
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </section>
            
             <!-- ************* SQL ****************** -->
            <div id="sql-dump">
                <?php echo $this->element('sql_dump'); ?>
            </div>

            <!-- ************* MICRODATA ****************** -->
            <?php
            // WebPage Author
            echo $this->element('meta/microdata/3xw', array(
                'itemprop' => 'author'
            ));

            // WebPage Copyright Holder
            echo $this->element('meta/microdata/paloma', array(
                'itemprop' => 'copyrightHolder'
            ));
            ?>
            
        </div>
       
         <footer id="footer">
           <?php echo $this->element('widgets/footer'); ?>
        </footer>
        
    </body>
</html>
