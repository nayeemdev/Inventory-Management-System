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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Inventory Management system(command)');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

   <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css([
        'admin/bootstrap.min',
        'admin/bootstrap',
        'admin/bootstrap-grid',
        'admin/bootstrap-grid.min',
        'admin/bootstrap-reboot',
        'admin/bootstrap-reboot.min',
        'admin/custom',
        'admin/fontastic',
        'admin/font-awesome',
        'admin/font-awesome.min',
        'admin/style.default',
        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css',
//        '../js/icheck-1.x/skins/all.css',
    ]);
    echo $this->Html->script([
        'admin/jquery.min',
//        'admin/jquery',
        /*'admin/jquery.slim',
        'admin/jquery.slim.min',*/
        'admin/jquery.cookie',
        /*'admin/jquery.validate',
        'admin/jquery.validate.min',*/
        // 'admin/bootstrap',
        'admin/bootstrap.min',
        'admin/additional-methods',
        'admin/bootstrap.bundle',
        'admin/bootstrap.bundle.min',
        /*'admin/Chart.bundle',
        'admin/Chart.bundle.min',
        'admin/Chart',
        'admin/Chart.min',
        'admin/charts-custom',
        'admin/charts-home',*/
        'admin/core',
        'admin/front',
        'admin/gijgo.min',
//        'icheck-1.x/icheck',
        'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js',
        'admin/generic',


    ]);
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <script>
        var ROOT = '<?php echo $this->Html->url('/', true); ?>';
        var HERE = '<?php echo $this->here; ?>';
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<!--Header-->
<?php
$ctrl = strtolower($this->params['controller']);
$action = strtolower($this->params['action']);
if($action != 'admin_login'){
?>
<?php echo $this->element('admin-header');?>
<!--/Header-->
<!-- Left side column. contains the logo and sidebar -->
<?php echo $this->element('admin-left-column');?>
<!-- /Left side column. contains the logo and sidebar -->

<?php } ?>
<div id="content">

    
            <?php echo $this->Flash->render(); ?>

            <?php echo $this->fetch('content'); ?>

</div>
<!--Footer-->
<?php if($action != 'admin_login'){ ?>
<?php echo $this->element('admin-footer'); ?>
<?php } ?>
