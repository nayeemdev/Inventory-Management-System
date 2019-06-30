<?php
$ctrl = strtolower($this->params['controller']);
$action = strtolower($this->params['action']);
$active = @($this->params[pass][0]);
?>
<nav class="side-navbar">
	<!-- Sidebar Header-->
	<div class="sidebar-header d-flex align-items-center">
		<div class="avatar"><img src="<?php echo $this->Html->url('/img/avatar-1.jpg',true) ?>" alt="..." class="img-fluid rounded-circle"></div>
		<div class="title">
			<h1 class="h4">Admin</h1>
			<p>Inventory Management System</p>
		</div>
	</div>
	<!-- Sidebar Navidation Menus-->
<!--    <span class="heading">Main</span>-->
	<ul class="list-unstyled">

		<!-- dashboard -->
		<li class="<?php echo $ctrl == 'users' && $action == '' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/users/dashboard') ?>"> <i class="fas fa-tachometer-alt"></i> Dashboard</a>
		</li>
		<!-- dashboard -->
		<!-- products -->
		<li><a href="#product" aria-expanded="<?php echo $ctrl == 'products' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-sitemap"></i>Manage Product<span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="product" class="<?php echo $ctrl == 'products' ? '' : 'collapse' ?> list-unstyled ">
				<li class="<?php echo $ctrl == 'products' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/products/add') ?>"><i class="fas fa-plus"></i> Add Product</a></li>
				<li class="<?php echo $ctrl == 'products' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/products/index') ?>"><i class="fas fa-list-ul"></i>Product List</a></li>
			  
			</ul>
		</li>
		<!-- products -->
        <!-- purchase -->
        <li><a href="#purchase" aria-expanded="<?php echo $ctrl == 'purchases' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-shopping-cart"></i>Manage Purchase <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
            <ul id="purchase" class="<?php echo $ctrl == 'purchases' ? '' : 'collapse' ?> list-unstyled ">

                <li class="<?php echo $ctrl == 'purchases' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/purchases/add') ?>"><i class="fas fa-plus"></i>Purchase Product</a>
                </li>
                <li class="<?php echo $ctrl == 'purchases' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/purchases/index') ?>"><i class="fas fa-list-ul"></i>Purchased Product List</a>
                </li>
            </ul>
        </li>
        <!-- purchase -->
        <!-- stock -->
        <li class="<?php echo $ctrl == 'stocks' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/stocks/index') ?>"> <i class="fas fa-home"></i>Stock</a></li>
        <!-- stock -->

        <!-- sale -->
        <li><a href="#sells" aria-expanded="<?php echo $ctrl == 'sells' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-money"></i>Manage Sell <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
            <ul id="sells" class="<?php echo $ctrl == 'sells' ? '' : 'collapse' ?> list-unstyled ">
                <li class="<?php echo $ctrl == 'sells' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/sells/add') ?>"><i class="fas fa-plus"></i>Sell Product</a></li>
                <li class="<?php echo $ctrl == 'sells' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/sells/index') ?>"><i class="fas fa-list-ul"></i> Sold Product List</a></li>
            </ul>
        </li>
        <!-- sale -->

		<!-- brands -->
		<!--<li class="open"><a href="#brands" aria-expanded="<?php /*echo $ctrl == 'brands' ? 'true' : 'false' */?>" data-toggle="collapse"> <i class="fab fa-bandcamp"></i> Manage Brands<span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="brands" class="<?php /*echo $ctrl == 'brands' ? '' : 'collapse' */?> list-unstyled ">
				<li class="<?php /*echo $ctrl == 'brands' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/brands/add') */?>"><i class="fas fa-plus"></i> Add Brand</a></li>
				<li class="<?php /*echo $ctrl == 'brands' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/brands/index') */?>"><i class="fas fa-list-ul"></i>Brands List</a></li>
			</ul>
		</li>-->
		<!-- brands -->
		<!-- branches -->
		<!--<li class="open"><a href="#branches" aria-expanded="<?php /*echo $ctrl == 'branches' ? 'true' : 'false' */?>" data-toggle="collapse"> <i class="fas fa-code-branch"></i>    Branches<span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="branches" class="<?php /*echo $ctrl == 'branches' ? '' : 'collapse' */?> list-unstyled ">
				<li class="<?php /*echo $ctrl == 'branches' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/branches/add') */?>"><i class="fas fa-plus"></i> Add Branch </a></li>
				<li class="<?php /*echo $ctrl == 'branches' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/branches/index') */?>"><i class="fas fa-list-ul"></i>Branch List</a></li>
			</ul>
		</li>-->
		<!-- branches -->
		<!-- Bykemodels -->
		<!--<li class="open"><a href="#bikemodel" aria-expanded="<?php /*echo $ctrl == 'bykeModels' ? 'true' : 'false' */?>" data-toggle="collapse"> <i class="fas fa-motorcycle"></i>Manage Bike Models <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="bikemodel" class="<?php /*echo $ctrl == 'bykeModels' ? '' : 'collapse' */?> list-unstyled ">
				<li class="<?php /*echo $ctrl == 'bykeModels' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/bykeModels/add') */?>"><i class="fas fa-plus"></i>Add Bike Models </a></li>
				<li class="<?php /*echo $ctrl == 'bykeModels' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/bykeModels/index') */?>"><i class="fas fa-list-ul"></i>Bike Models List</a></li>
			</ul>
		</li>-->


		<!-- Bykemodels -->

		<!-- Customers -->
		<li class="open"><a href="#customers" aria-expanded="<?php echo $ctrl == 'customers' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-users"></i>Manage Customers <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="customers" class="<?php echo $ctrl == 'customers' ? '' : 'collapse' ?> list-unstyled ">
				<li class="<?php echo $ctrl == 'customers' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/customers/add') ?>"><i class="fas fa-plus"></i> Add Customer</a></li>
				<li class="<?php echo $ctrl == 'customers' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/customers/index') ?>"><i class="fas fa-list-ul"></i>Customer List</a></li>
			</ul>
		</li>
		<!-- Customers -->		
		<!-- ModelProducts -->
		<!--<li class="open small"><a href="#modelsproducts" aria-expanded="<?php /*echo $ctrl == 'modelsproducts' ? 'true' : 'false' */?>" data-toggle="collapse"> <i class="fas fa-gifts"></i>Manage Models & Products <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="modelsproducts" class="<?php /*echo $ctrl == 'modelsproducts' ? '' : 'collapse' */?> list-unstyled ">
				<li class="<?php /*echo $ctrl == 'modelsproducts' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/modelsproducts/add') */?>"><i class="fas fa-plus"></i> Add Models & Products</a></li>
				<li class="<?php /*echo $ctrl == 'modelsproducts' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/modelsproducts/index') */?>"><i class="fas fa-list-ul"></i>Models & Products List</a></li>
			</ul>
		</li>-->
		<!-- ModelProducts -->
		<!-- supplier -->
		<li class="open"><a href="#suppliers" aria-expanded="<?php echo $ctrl == 'suppliers' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-user"></i>Manage Supplier <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="suppliers" class="<?php echo $ctrl == 'suppliers' ? '' : 'collapse' ?> list-unstyled ">
				<li class="<?php echo $ctrl == 'suppliers' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/suppliers/add') ?>"><i class="fas fa-plus"></i> Entry Supplier</a></li>
				<li class="<?php echo $ctrl == 'suppliers' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/suppliers/index') ?>"><i class="fas fa-list-ul"></i>Supplier List</a></li>
			</ul>
		</li>
		<!-- supplier -->

		<!-- Return -->

		<!--<li><a href="#return" aria-expanded="<?php /*echo $ctrl == 'return' ? 'true' : 'false' */?>" data-toggle="collapse"> <i class="fas fa-history"></i>Return <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="return" class="<?php /*echo $ctrl == 'return' ? '' : 'collapse' */?> list-unstyled ">
				<li class="<?php /*echo $ctrl == 'return' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/return/add') */?>"><i class="fas fa-plus"></i> Entry Sell Return</a></li>
				<li class="<?php /*echo $ctrl == 'return' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/return/index') */?>"><i class="fas fa-list-ul"></i>Sell Return List</a></li>
			</ul>
		</li>-->
		<!-- Return -->
		<!-- expense -->

		<li><a href="#expences" aria-expanded="<?php echo $ctrl == 'expences' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-usd"></i>Manage Expense <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="expences" class="<?php echo $ctrl == 'expences' ? '' : 'collapse' ?> list-unstyled ">
				<li class="<?php echo $ctrl == 'expences' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/expences/add') ?>"><i class="fas fa-plus"></i> Add</a></li>
				<li class="<?php echo $ctrl == 'expences' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/expences/index') ?>"><i class="fas fa-list-ul"></i> List</a></li>
			</ul>
		</li>
		<!-- expense -->
		<!-- account -->
		<li><a href="#account" aria-expanded="<?php echo $ctrl == 'account' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-bank"></i>Manage Account <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="account" class="<?php echo $ctrl == 'account' ? '' : 'collapse' ?> list-unstyled "><!--
				<li class="<?php /*echo $ctrl == 'account' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/account/add') */?>"><i class="fas fa-plus"></i> Account</a></li>
				<li class="<?php /*echo $ctrl == 'account' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/account/index') */?>"><i class="fas fa-list-ul"></i> Bank</a></li>-->
				<li class="<?php echo $ctrl == 'account' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/ledgers/cash_book') ?>"><i class="fas fa-list-ul"></i> Cash Book List</a></li>
			</ul>
		</li>
		<!-- account -->
		<!-- report -->
		<!--<li><a href="#report" aria-expanded="<?php /*echo $ctrl == 'report' ? 'true' : 'false' */?>" data-toggle="collapse"> <i class="fas fa-file"></i>Report <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
			<ul id="report" class="<?php /*echo $ctrl == 'report' ? '' : 'collapse' */?> list-unstyled ">
				<li class="<?php /*echo $ctrl == 'report' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/report/add') */?>"><i class="fas fa-plus"></i> Sale Report</a></li>
				<li class="<?php /*echo $ctrl == 'report' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/report/index') */?>"><i class="fas fa-list-ul"></i> Category Base Sell</a></li>
				<li class="<?php /*echo $ctrl == 'report' && $action == 'admin_add' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/report/add') */?>"><i class="fas fa-plus"></i> Purchase Report</a></li>
				<li class="<?php /*echo $ctrl == 'report' && $action == 'admin_index' ? 'active' : '' */?>"><a href="<?php /*echo $this->Html->url('/admin/report/index') */?>"><i class="fas fa-list-ul"></i> Sales Return Report</a></li>
			</ul>
		</li>-->
		<!-- report -->
        <!-- Categories -->
        <li class="open"><a href="#categories" aria-expanded="<?php echo $ctrl == 'categories' ? 'true' : 'false' ?>" data-toggle="collapse"> <i class="fas fa-list-alt"></i>Manage Categories <span class="float-right"><i class="fas fa-angle-left"></i></span></a>
            <ul id="categories" class="<?php echo $ctrl == 'categories' ? '' : 'collapse' ?> list-unstyled ">
                <li class="<?php echo $ctrl == 'categories' && $action == 'admin_add' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/categories/add') ?>"><i class="fas fa-plus"></i> Add Category</a></li>
                <li class="<?php echo $ctrl == 'categories' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/categories/index') ?>"><i class="fas fa-list-ul"></i>Category List</a></li>
            </ul>
        </li>
        <!-- Categories -->
		<!-- Ledger -->
		<li class="<?php echo $ctrl == 'ledgers' && $action == 'admin_index' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/ledgers/index') ?>"> <i class="fas fa-balance-scale"></i>Manage Ledger</a></li>
		<li class="<?php echo $ctrl == 'users' && $action == 'admin_reset_password' ? 'active' : '' ?>"><a href="<?php echo $this->Html->url('/admin/users/reset_password') ?>"> <i class="fas fa-key"></i>Reset Password</a></li>
		<!-- Ledger -->
	</ul>
</nav>
<div class="content-inner">