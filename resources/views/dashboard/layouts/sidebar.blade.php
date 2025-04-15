<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!-- Sidebar Brand -->
  <div class="sidebar-brand">
    <a href="#" class="brand-link">
      <img src="{{ asset('dashboard/assets/img/AdminLTELogo.png') }}" 
           alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
      <span class="brand-text fw-light">Kumo-Labs</span>
    </a>
  </div>
  
  <!-- Sidebar Wrapper -->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" role="menu" data-accordion="false">
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <!-- Blogs -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-journal-text"></i>
            <p>
              Blogs
              <i class="nav-arrow bi bi-chevron-down"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="/categories" class="nav-link">
                <i class="nav-icon bi bi-tags"></i>
                <p>Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/tags" class="nav-link">
                <i class="nav-icon bi bi-tag"></i>
                <p>Tags</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/posts" class="nav-link">
                <i class="nav-icon bi bi-file-earmark-text"></i>
                <p>Posts</p>
              </a>
            </li>
          </ul>
        </li>
        
        <!-- Media Manager -->
        <li class="nav-item">
          <a href="{{ route('media.index') }}" class="nav-link">
            <i class="nav-icon bi bi-images"></i>
            <p>Media Manager</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>