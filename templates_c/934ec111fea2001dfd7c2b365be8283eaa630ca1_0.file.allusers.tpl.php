<?php
/* Smarty version 4.1.0, created on 2022-04-09 06:53:36
  from '/home/user/Bureau/phpopen/HomeLife/templates/allusers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6250e018611cc7_17581785',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '934ec111fea2001dfd7c2b365be8283eaa630ca1' => 
    array (
      0 => '/home/user/Bureau/phpopen/HomeLife/templates/allusers.tpl',
      1 => 1649467410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6250e018611cc7_17581785 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">

 
 <meta name="viewport" content="width=device-width, initial-scale=1">
 
 <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"><?php echo '</script'; ?>
>

</head>
<body>

<div class="container mt-3">
  <h2> user list</h2>
  <ul class="list-group">
  
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'v');
$_smarty_tpl->tpl_vars['v']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->do_else = false;
?>
    <li class="list-group-item">
    
    
    <h1>
    username : <?php echo $_smarty_tpl->tpl_vars['v']->value->getUsername();?>

    </h1>
    
    
    <div>
    <span>
    
      email  : <?php echo $_smarty_tpl->tpl_vars['v']->value->getEmail();?>

    
    
    </span>
    </div>
    
    
    <h2>
    
    
      gender : <?php echo $_smarty_tpl->tpl_vars['v']->value->getGender();?>

    </h2>
    
    
    
    <h1>
     phone number : 
     
     <?php echo $_smarty_tpl->tpl_vars['v']->value->getPhonenumber();?>

    </h1>
    
    
    </li>

    
     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
</div>

</body>
</html>
<?php }
}
