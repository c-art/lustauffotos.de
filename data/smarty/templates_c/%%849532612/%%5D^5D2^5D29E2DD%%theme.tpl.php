<?php /* Smarty version 2.6.10, created on 2006-11-15 13:42:57
         compiled from gallery:themes/siriux/templates/theme.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'gallery:themes/siriux/templates/theme.tpl', 15, false),array('modifier', 'markup', 'gallery:themes/siriux/templates/theme.tpl', 15, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
        <?php echo $this->_reg_objects['g'][0]->head(array(), $this);?>


        <?php if (empty ( $this->_tpl_vars['head']['title'] )): ?>
      <title><?php echo ((is_array($_tmp=((is_array($_tmp=@$this->_tpl_vars['theme']['item']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['theme']['item']['pathComponent']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['theme']['item']['pathComponent'])))) ? $this->_run_mod_handler('markup', true, $_tmp, 'strip') : smarty_modifier_markup($_tmp, 'strip')); ?>
</title>
    <?php endif; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo $this->_reg_objects['g'][0]->theme(array('url' => "theme.css"), $this);?>
"/>

    <style type="text/css">
	.content { width: <?php echo $this->_tpl_vars['theme']['params']['contentWidth']; ?>
px; }
	<?php if (! empty ( $this->_tpl_vars['theme']['params']['thumbnailSize'] )): ?>
	  <?php $this->assign('thumbCellSize', $this->_tpl_vars['theme']['params']['thumbnailSize']+30); ?>
	  .gallery-thumb { width: <?php echo $this->_tpl_vars['thumbCellSize']; ?>
px; height: <?php echo $this->_tpl_vars['thumbCellSize']; ?>
px; }
	  .gallery-album { height: <?php echo $this->_tpl_vars['thumbCellSize']+30; ?>
px; }
	<?php endif; ?>
    </style>
  </head>
  <body class="gallery">
    <div <?php echo $this->_reg_objects['g'][0]->mainDivAttributes(array(), $this);?>
>
            <?php if ($this->_tpl_vars['theme']['useFullScreen']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['theme']['moduleTemplate']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['theme']['moduleL10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php else: ?>
      <div class="header"></div>
      <div class="content">
	<div class="breadcrumb">
	  <?php echo $this->_reg_objects['g'][0]->block(array('type' => "core.BreadCrumb",'skipRoot' => true,'separator' => "/"), $this);?>

	</div>

		<?php if ($this->_tpl_vars['theme']['pageType'] == 'album'): ?>
	  <?php echo $this->_reg_objects['g'][0]->theme(array('include' => "album.tpl"), $this);?>

	<?php elseif ($this->_tpl_vars['theme']['pageType'] == 'photo'): ?>
	  <?php echo $this->_reg_objects['g'][0]->theme(array('include' => "photo.tpl"), $this);?>

	<?php elseif ($this->_tpl_vars['theme']['pageType'] == 'admin'): ?>
	  <?php echo $this->_reg_objects['g'][0]->theme(array('include' => "admin.tpl"), $this);?>

	<?php elseif ($this->_tpl_vars['theme']['pageType'] == 'module'): ?>
	  <?php echo $this->_reg_objects['g'][0]->theme(array('include' => "module.tpl"), $this);?>

	<?php elseif ($this->_tpl_vars['theme']['pageType'] == 'progressbar'): ?>
	  <?php echo $this->_reg_objects['g'][0]->theme(array('include' => "progressbar.tpl"), $this);?>

	<?php endif; ?>

	<div class="footer">
	  <?php echo $this->_reg_objects['g'][0]->logoButton(array('type' => 'validation'), $this);?>

	  <?php echo $this->_reg_objects['g'][0]->logoButton(array('type' => 'gallery2'), $this);?>

	  <?php echo $this->_reg_objects['g'][0]->logoButton(array('type' => "gallery2-version"), $this);?>

          <?php echo $this->_reg_objects['g'][0]->logoButton(array('type' => 'donate'), $this);?>

	</div>
      </div>
      <?php endif; ?>      </div>

        <?php echo $this->_reg_objects['g'][0]->trailer(array(), $this);?>


        <?php echo $this->_reg_objects['g'][0]->debug(array(), $this);?>

  </body>
</html>