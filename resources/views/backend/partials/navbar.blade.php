<ul class="side-nav">
    <li class="side-nav-title side-nav-item">Navigation</li>

    
    <li class="side-nav-item">
        <a href="{{ route('admin.dashboard')}}" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboard </span>
        </a>
    </li>

    <li class="side-nav-title side-nav-item">Apps</li>

    <li class="side-nav-item">
        <a href="{{ route('admin.users.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span>Manage User</span>
        </a>
    </li> 
    
    <li class="side-nav-item">
        <a href="{{ route('admin.permissions.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span>Manage Permission</span>
        </a>
    </li>
    
    <li class="side-nav-item">
        <a href="{{ route('admin.roles.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span>Manage Role</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.orders.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Orders Manage</span>
        </a>
    </li> 

   
    <li class="side-nav-item">
        <a href="{{ route('admin.sliders.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Slider Manage </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.home_section_images.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Home Section ImageManage </span>
        </a>
    </li>

    

    <li class="side-nav-item">
        <a href="{{ route('admin.types.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Type Manage </span>
        </a>
    </li>


    <li class="side-nav-item">
        <a href="{{ route('admin.categories.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Category Manage </span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.sizes.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Size Manage </span>
        </a>
    </li>


    <li class="side-nav-item">
        <a href="{{ route('admin.products.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Products Manage</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.product_discounts.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Products Discount Manage</span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="{{ route('admin.purchase.index')}}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span> Purchase Manage</span>
        </a>
    </li>    
    
    <li class="side-nav-item">
        <a href="{{ route('admin.about_us.index') }}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span>About Us</span>
        </a>
    </li>
    
    <li class="side-nav-item">
        <a href="{{ route('admin.career.index') }}" class="side-nav-link">
            <i class="uil-folder-plus"></i>
            <span>Careers</span>
        </a>
    </li>




    <li class="side-nav-title side-nav-item mt-1">Components</li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
            <i class="uil-table"></i>
            <span> Tables </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarTables">
            <ul class="side-nav-second-level">
                <li>
                    <a href="tables-basic.html">Basic Tables</a>
                </li>
                <li>
                    <a href="tables-datatable.html">Data Tables</a>
                </li>
            </ul>
        </div>
    </li>
</ul>