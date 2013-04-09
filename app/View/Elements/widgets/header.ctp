<!-- menu -->
<div class="container w-header-menu hidden-phone" >
    <table class="w-header-menu-table">
        <tr>
            <td class="w-header-menu-table-td-first">
                <?php echo $this->Html->link($this->Html->image('header/Paloma_logo_final_300px.png'), '/', array('escape'=> false)); ?>
            </td>
            <!--
            <td><?php echo $this->Html->link('Project', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
            <td><?php echo $this->Html->link('Collab', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
            -->
            <td><?php echo $this->Html->link('Clothings', array('controller' => 'products', 'action' => 'index' )); ?></td>
            <td><?php echo $this->Html->link('Vintage', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
            <td><?php echo $this->Html->link('Objects', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
            <td><?php echo $this->Html->link('My Account', array('controller' => 'customers', 'action' => 'account', 'customer' => true )); ?></td>
            <td><?php echo $this->Html->link('About', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
            <td><?php echo $this->Html->link('News', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
            <td><?php echo $this->Html->link('Join us', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></td>
        </tr>
    </table>
</div>
<!-- end menu -->
<div style="margin:0;" class="navbar navbar-inverse navbar-fixed-top visible-phone">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
         <?php echo $this->Html->link($this->Html->image('header/Paloma_logo_final_white_122px.png'), '/', array('escape'=> false, 'class'=> 'brand')); ?>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li><?php echo $this->Html->link('Clothings', array('controller' => 'products', 'action' => 'index' )); ?></li>
            <li><?php echo $this->Html->link('Vintage', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></li>
            <li><?php echo $this->Html->link('Objects', array('controller' => 'pages', 'action' => 'display', 'exemple' )); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
</div>


<!-- title -->
<?php
if( $blackAndWhite ){
    $color = 'w-header-title-black';
}else{
    $color = 'w-header-title-color';
}
?>
<div class="<?php echo $color; ?> ">
    <div class="w-header-title-text-container">
        <div class="w-header-title-text"><?php echo $title_for_layout; ?></div>
    </div>
</div>
<!-- end title -->