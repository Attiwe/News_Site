  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> {{ config('app.name') }}    </div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
</a>


<!-- Nav Item - Dashboard -->
 @can('home')
 <li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
 @endcan


<!-- post management -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa-solid fa-envelopes-bulk"></i>
        <span> Post Management </span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Post Management:</h6>
            @can('index_post')
            <a class="collapse-item" href=" {{route('admin.posts.index')}}">Posts</a>
            @endcan
            @can('create_post')
            <a class="collapse-item" href="{{route('admin.posts.create')}}">Add Post</a>
            @endcan
        </div>
    </div>
</li>
 
<hr class="sidebar-divider">
 

<!--  settings     -->
 
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span> Settings Management </span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">  Settings:</h6>
            @can('index_setting')
            <a class="collapse-item" href="  {{route('admin.settings')}}">  Settings</a>
            @endcan
            @can('edit_setting')
            <a class="collapse-item" href=" {{route('admin.settings.edit')}}">Edit Settings </a>
            @endcan
            
        </div>
    </div>
</li>
<hr class="sidebar-divider">
 
 
 
<!-- user-->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-users"></i>
        <span> Users Management </span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @can('index_user')
            <a class="collapse-item" href="{{ route('admin.users.index') }}"> Users </a>
            @endcan
            @can('create_user')
            <a class="collapse-item" href="{{ route('admin.users.create') }}">Add User</a>
            @endcan
        </div>
    </div>
</li>
<hr class="sidebar-divider">
 

<!-- admin-->
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin"
        aria-expanded="true" aria-controls="admin">
        <i class="fas fa-fw fa-users"></i>
        <span> Admins Management </span>
    </a>
    <div id="admin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @can('index_admin')
            <a class="collapse-item" href="{{ route('admin.admins.index') }}"> Admins </a>
            @endcan
            @can('create_admin')
            <a class="collapse-item" href="{{ route('admin.admins.create') }}">Add Admin</a>
            @endcan
        </div>
    </div>
</li>
<hr class="sidebar-divider">
 
@can('category')
<!-- Nav Item - categories -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.categories.index') }}">
    <i class="fa-solid fa-icons"></i>
        <span>Categories</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block">
 @endcan

<!-- Divider -->

<!-- Authorization-->
 <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#authorization"
        aria-expanded="true" aria-controls="authorization">
        <i class="fa-solid fa-pen-ruler"></i>
            <span> Authorization   </span>    
    </a>
    <div id="authorization" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @can('index_authorization')
            <a class="collapse-item" href="{{ route('admin.authorization.index') }}"> Authorization </a>
            @endcan
            @can('create_authorization')
            <a class="collapse-item" href="{{ route('admin.authorization.create') }}">Add Permission</a>
            @endcan
        </div>
    </div>
</li>
<hr class="sidebar-divider">
 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#contact-us"
        aria-expanded="true" aria-controls="contact-us">
        <i class="fa-solid fa-comment"></i>
            <span> Contact Us   </span>    
    </a>
    <div id="contact-us" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
             <a class="collapse-item" href="{{ route('admin.contact-us.index') }}"> Contact Us </a>
            
        </div>
    </div>
</li>
<hr class="sidebar-divider">
 

 
</ul>
<!-- End of Sidebar -->