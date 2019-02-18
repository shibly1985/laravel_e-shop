<ul class="nav" id="side-menu">
    <li class="sidebar-search">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
        <!-- /input-group -->
    </li>
    <li>
        <a href="{{url('/home')}}"><i class="fa fa-dashboard fa-fw"></i> Home</a>
    </li>

    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category Info<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{url('/category/add')}}">Add Category</a>
            </li>
            <li>
                <a href="{{url('/category/manage')}}">Manage Category</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Sub Category Info<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{url('/subcategory/add')}}">Add Sub Category</a>
            </li>
            <li>
                <a href="{{url('/subcategory/manage')}}">Manage Sub Category</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> User Info<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="#">Add User</a>
            </li>
            <li>
                <a href="{{url('/user/manages')}}">Manage User</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>

    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Manufacturer Info<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{url('/manufacturer/add')}}">Add Manufacturer</a>
            </li>
            <li>
                <a href="{{url('/manufacturer/manage')}}">Manage Manufacturer</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
    
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Product Info<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="{{url('/product/add')}}">Add Product</a>
            </li>
            
            <li>
                <a href="{{url('/product/manage')}}">Manage Products</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
</ul>