<!doctype html>
<html lang="en">

  @include('dashboard.layouts.head') 

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
      @include('dashboard.layouts.header')
      
      @include('dashboard.layouts.sidebar') 
      
      <main class="app-main">
        @yield('content')
      </main>
   
      @include('dashboard.layouts.footer')
    </div>
    
    @include('dashboard.layouts.scripts')
  </body>
  
</html>