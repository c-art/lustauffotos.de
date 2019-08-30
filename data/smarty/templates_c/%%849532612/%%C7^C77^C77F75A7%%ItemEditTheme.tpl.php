<?php /* Smarty version 2.6.10, created on 2006-11-15 13:40:48
         compiled from gallery:modules/core/templates/ItemEditTheme.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'gallery:modules/core/templates/ItemEditTheme.tpl', 25, false),array('function', 'html_options', 'gallery:modules/core/templates/ItemEditTheme.tpl', 39, false),array('modifier', 'default', 'gallery:modules/core/templates/ItemEditTheme.tpl', 30, false),)), $this); ?>
<div class="gbBlock">
  <p class="giDescription">
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "This album is configured to use the <b>%s</b> theme. These settings only apply to the theme for this album.",'arg1' => $this->_tpl_vars['ItemEditTheme']['theme']['name']), $this);?>

  </p>

<?php if (isset ( $this->_tpl_vars['ItemEditTheme']['customTemplate'] )): ?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "gallery:".($this->_tpl_vars['ItemEditTheme']['customTemplate']), 'smarty_include_vars' => array('l10Domain' => $this->_tpl_vars['ItemEditTheme']['theme']['l10Domain'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<?php if (! empty ( $this->_tpl_vars['ItemEditTheme']['settings'] )): ?>
  <table class="gbDataTable"><tr>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Setting'), $this);?>
 </th>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Value'), $this);?>
 </th>
    <th> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Use Global'), $this);?>
 </th>
  </tr>

  <?php $_from = $this->_tpl_vars['ItemEditTheme']['settings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['setting']):
?>
    <?php $this->assign('settingKey', $this->_tpl_vars['setting']['key']); ?>
    <tr class="<?php echo smarty_function_cycle(array('values' => "gbEven,gbOdd"), $this);?>
">
      <td>
	<?php echo $this->_tpl_vars['setting']['name']; ?>

      </td><td>
	<?php if (( $this->_tpl_vars['setting']['type'] == 'text-field' )): ?>
	  <input type="text" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['setting']['typeParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 6) : smarty_modifier_default($_tmp, 6)); ?>
"
		 onchange="changeSetting('<?php echo $this->_tpl_vars['settingKey']; ?>
')"
		 name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['settingKey'])."]"), $this);?>
" value="<?php echo $this->_tpl_vars['form']['key'][$this->_tpl_vars['settingKey']]; ?>
"/>
        <?php elseif (( $this->_tpl_vars['setting']['type'] == 'textarea' )): ?>
          <textarea style="width:<?php echo ((is_array($_tmp=@$this->_tpl_vars['setting']['typeParams']['width'])) ? $this->_run_mod_handler('default', true, $_tmp, '400px') : smarty_modifier_default($_tmp, '400px')); ?>
;height:<?php echo ((is_array($_tmp=@$this->_tpl_vars['setting']['typeParams']['height'])) ? $this->_run_mod_handler('default', true, $_tmp, '75px') : smarty_modifier_default($_tmp, '75px')); ?>
;"
           name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['settingKey'])."]"), $this);?>
"><?php echo $this->_tpl_vars['form']['key'][$this->_tpl_vars['settingKey']]; ?>
</textarea>
	<?php elseif (( $this->_tpl_vars['setting']['type'] == 'single-select' )): ?>
	  <select name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['settingKey'])."]"), $this);?>
"
		  onchange="changeSetting('<?php echo $this->_tpl_vars['settingKey']; ?>
')">
	    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['setting']['choices'],'selected' => $this->_tpl_vars['form']['key'][$this->_tpl_vars['settingKey']]), $this);?>

	  </select>
	<?php elseif (( $this->_tpl_vars['setting']['type'] == 'checkbox' )): ?>
	  <input type="checkbox" onclick="changeSetting('<?php echo $this->_tpl_vars['settingKey']; ?>
')"
		 name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['settingKey'])."]"), $this);?>
"
	   <?php if (! empty ( $this->_tpl_vars['form']['key'][$this->_tpl_vars['settingKey']] )): ?>checked="checked"<?php endif; ?>/>
	<?php elseif (( $this->_tpl_vars['setting']['type'] == 'block-list' )): ?>
	    <table>
	      <tr>
		<td style="text-align: right;">
		  <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Available'), $this);?>

		</td>
		<td>
		  <select id="blocksAvailableList_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
		    onchange="bsw_selectToUse('<?php echo $this->_tpl_vars['setting']['key']; ?>
');">
		    <option value=""><?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Choose a block'), $this);?>
</option>
		  </select>
		</td>
		<td class="bsw_BlockCommands">
		  <span id="bsw_AddButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
" onclick="bsw_addBlock('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
		    class="bsw_ButtonDisabled">
		    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Add'), $this);?>

		  </span>
		</td>
	      </tr>

	      <tr>
		<td style="text-align: right; vertical-align: top;">
		  <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Selected'), $this);?>

		</td>
		<td id="bsw_UsedBlockList_<?php echo $this->_tpl_vars['setting']['key']; ?>
">
		  <select id="blocksUsedList_<?php echo $this->_tpl_vars['setting']['key']; ?>
" size="10"
		    onchange="bsw_selectToChange('<?php echo $this->_tpl_vars['setting']['key']; ?>
');">
		    <option value=""></option> 		  </select>
		</td>
		<td class="bsw_BlockCommands">
		  <span style="display: block"
		    id="bsw_RemoveButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
		    onclick="bsw_removeBlock('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
		    class="bsw_ButtonDisabled">
		    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Remove'), $this);?>

		  </span>

		  <span style="display: block"
		    id="bsw_MoveUpButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
		    onclick="bsw_moveUp('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
		    class="bsw_ButtonDisabled">
		    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Move Up'), $this);?>

		  </span>

		  <span style="display: block"
		    id="bsw_MoveDownButton_<?php echo $this->_tpl_vars['setting']['key']; ?>
"
		    onclick="bsw_moveDown('<?php echo $this->_tpl_vars['setting']['key']; ?>
');"
		    class="bsw_ButtonDisabled">
		    <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Move Down'), $this);?>

		  </span>
		</td>
	      </tr>
	      <tr>
		<td id="bsw_BlockOptions_<?php echo $this->_tpl_vars['setting']['key']; ?>
" colspan="3">
		</td>
	      </tr>
	    </table>

	    <input type="hidden"
		   onchange="changeSetting('<?php echo $this->_tpl_vars['settingKey']; ?>
'); bsw_reInitAdminForm('<?php echo $this->_tpl_vars['settingKey']; ?>
');"
		   id="albumBlockValue_<?php echo $this->_tpl_vars['setting']['key']; ?>
" size="60"
		   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key][".($this->_tpl_vars['settingKey'])."]"), $this);?>
"
		   value="<?php echo $this->_tpl_vars['form']['key'][$this->_tpl_vars['settingKey']]; ?>
"/>

	    <script type="text/javascript">
	      // <![CDATA[
	      var block;
	      var tmp;
	      <?php $_from = $this->_tpl_vars['ItemEditTheme']['availableBlocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['moduleId'] => $this->_tpl_vars['blocks']):
?>
		<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blockName'] => $this->_tpl_vars['block']):
?>
		  block = bsw_addAvailableBlock("<?php echo $this->_tpl_vars['setting']['key']; ?>
", "<?php echo $this->_tpl_vars['moduleId']; ?>
.<?php echo $this->_tpl_vars['blockName']; ?>
",
			  "<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['block']['description'],'l10Domain' => "modules_".($this->_tpl_vars['moduleId'])), $this);?>
");
		  <?php if (! empty ( $this->_tpl_vars['block']['vars'] )): ?>
		    <?php $_from = $this->_tpl_vars['block']['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['varKey'] => $this->_tpl_vars['varInfo']):
?>
		      tmp = new Array();
		      <?php if (( $this->_tpl_vars['varInfo']['type'] == 'choice' )): ?>
			<?php $_from = $this->_tpl_vars['varInfo']['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['choiceKey'] => $this->_tpl_vars['choiceValue']):
?>
			  tmp["<?php echo $this->_tpl_vars['choiceKey']; ?>
"] = "<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['choiceValue'],'l10Domain' => "modules_".($this->_tpl_vars['moduleId'])), $this);?>
";
			<?php endforeach; endif; unset($_from); ?>
		      <?php endif; ?>
		      block.addVariable("<?php echo $this->_tpl_vars['varKey']; ?>
", "<?php echo $this->_tpl_vars['varInfo']['default']; ?>
",
			"<?php echo $this->_reg_objects['g'][0]->text(array('text' => $this->_tpl_vars['varInfo']['description'],'l10Domain' => "modules_".($this->_tpl_vars['moduleId'])), $this);?>
",
			"<?php echo $this->_tpl_vars['varInfo']['type']; ?>
", tmp);
	              <?php if (! empty ( $this->_tpl_vars['varInfo']['overrides'] )): ?>
	              <?php $_from = $this->_tpl_vars['varInfo']['overrides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['override']):
?>
	              block.addVariableOverride("<?php echo $this->_tpl_vars['varKey']; ?>
", "<?php echo $this->_tpl_vars['override']; ?>
");
                      <?php endforeach; endif; unset($_from); ?>
	              <?php endif; ?>
		    <?php endforeach; endif; unset($_from); ?>
		  <?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	      <?php endforeach; endif; unset($_from); ?>
	      	      bsw_initAdminForm("<?php echo $this->_tpl_vars['setting']['key']; ?>
", "<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Parameter'), $this);?>
",
						  "<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Value'), $this);?>
");
	      // ]]>
	    </script>
	<?php endif; ?>
      </td>

      <td align="center">
	<input type="checkbox" onclick="toggleGlobal('<?php echo $this->_tpl_vars['settingKey']; ?>
');"
	       name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[useGlobal][".($this->_tpl_vars['settingKey'])."]"), $this);?>
"
	 <?php if (( ! isset ( $this->_tpl_vars['ItemEditTheme']['globalParams'][$this->_tpl_vars['settingKey']] ) )): ?>
	   disabled="disabled"
	 <?php elseif (( ! empty ( $this->_tpl_vars['form']['useGlobal'][$this->_tpl_vars['settingKey']] ) )): ?>
	   checked="checked"
	 <?php endif; ?>/>
      </td>
    </tr>

    <?php if (isset ( $this->_tpl_vars['form']['error']['key'][$this->_tpl_vars['settingKey']]['invalid'] )): ?>
    <tr>
      <td colspan="2" class="giError">
	<?php echo $this->_tpl_vars['form']['errorMessage'][$this->_tpl_vars['settingKey']]; ?>

      </td>
    </tr>
    <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  </table>
  <?php echo $this->_reg_objects['g'][0]->changeInDescendents(array('module' => 'theme','text' => "Use these settings in all subalbums that use %s theme",'arg1' => $this->_tpl_vars['ItemEditTheme']['theme']['name']), $this);?>

  <blockquote><p>
    <?php echo $this->_reg_objects['g'][0]->text(array('text' => "Note: to set the same theme for all subalbums, check the appropriate box in <b>Album</b> tab"), $this);?>

  </p></blockquote>
<?php elseif (! isset ( $this->_tpl_vars['ItemEditTheme']['customTemplate'] )): ?>
  <b> <?php echo $this->_reg_objects['g'][0]->text(array('text' => 'There are no settings for this theme'), $this);?>
 </b>
<?php endif; ?>
</div>

<script type="text/javascript">
  // <![CDATA[
  var isSaved = new Array;
  var savedValues = new Array;
  var globalValues = new Array;
  <?php $_from = $this->_tpl_vars['ItemEditTheme']['globalParams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    globalValues['<?php echo $this->_tpl_vars['key']; ?>
'] = '<?php echo $this->_tpl_vars['value']; ?>
';
  <?php endforeach; endif; unset($_from); ?>

  function toggleGlobal(key) {
    var frm = document.getElementById('itemAdminForm');
    inputWidget = frm.elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key]["), $this);?>
' + key + ']'];
    toggleWidget = frm.elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[useGlobal]["), $this);?>
' + key + ']'];
    <?php echo '
    if (toggleWidget.checked) {
      savedValues[key] = inputWidget.value;
      isSaved[key] = true;
      if (inputWidget.type == \'checkbox\') {
	if (globalValues[key] != 0) {
	  inputWidget.checked = \'checked\';
	} else {
	  inputWidget.checked = null;
	}
      } else {
	inputWidget.value = globalValues[key];
      }
    } else {
      if (inputWidget.type == \'checkbox\') {
	if (globalValues[key] == 0) {
	  inputWidget.checked = \'checked\';
	} else {
	  inputWidget.checked = null;
	}
      } else if (isSaved[key]) {
	inputWidget.value = savedValues[key];
      }
    }
    if (inputWidget.type != \'checkbox\') inputWidget.onchange();
  }

  function changeSetting(key) {
    '; ?>

    var frm = document.getElementById('itemAdminForm');
    inputWidget = frm.elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[key]["), $this);?>
' + key + ']'];
    toggleWidget = frm.elements['<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[useGlobal]["), $this);?>
' + key + ']'];
    <?php echo '
    if (inputWidget.type == \'checkbox\') {
      toggleWidget.checked = ((globalValues[key] == 0 && !inputWidget.checked) ||
			      (globalValues[key] == 1 && inputWidget.checked));
    } else {
      toggleWidget.checked = (inputWidget.value == globalValues[key]);
    }
  }
  '; ?>

  // ]]>
</script>

<div class="gbBlock gcBackground1">
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][save]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Save'), $this);?>
"/>
  <input type="submit" class="inputTypeSubmit"
   name="<?php echo $this->_reg_objects['g'][0]->formVar(array('var' => "form[action][undo]"), $this);?>
" value="<?php echo $this->_reg_objects['g'][0]->text(array('text' => 'Reset'), $this);?>
"/>
</div>