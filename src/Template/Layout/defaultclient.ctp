<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'No name: ';
$this->assign('title', 'Um dia será um sistema de simulado');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('custom.css') ?>
    
    <?= $this->Html->script('jquery-3.2.0.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('tinymce/tinymce.min.js') ?>
    <?= $this->Html->script('simulado.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      
			    </div>
			    <ul class="nav navbar-nav">
			      <li class="active"><a href="#">Simulado</a></li>
			      <li><a href="#">Sobre</a></li>
			    </ul>
			  </div>
			</nav>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    		<?= $this->Flash->render() ?>
    	</div>
    </div>
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
       		 <?= $this->fetch('content') ?>
       </div>
    </div>
    <footer>
    </footer>
    
</body>
</html>
