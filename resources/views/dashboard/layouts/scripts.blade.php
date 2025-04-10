<script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('dashboard/assets/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!-- OPTIONAL SCRIPTS -->
    <!-- sortablejs -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ="
      crossorigin="anonymous"
    ></script>
    <!-- sortablejs -->
    <script>
      const connectedSortables = document.querySelectorAll('.connectedSortable');
      connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
          group: 'shared',
          handle: '.card-header',
        });
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
    </script>

    <!-- JavaScript for Dropdown Toggle -->
    <script>
      // JavaScript to handle dropdown toggle
      document.addEventListener('DOMContentLoaded', function () {
        const dropdownLinks = document.querySelectorAll('.nav-item.has-treeview > .nav-link');
        dropdownLinks.forEach((link) => {
          link.addEventListener('click', function (e) {
            e.preventDefault();
            const parent = this.parentElement;
            const treeviewMenu = parent.querySelector('.nav-treeview');
            if (treeviewMenu.style.display === 'none' || !treeviewMenu.style.display) {
              treeviewMenu.style.display = 'block';
            } else {
              treeviewMenu.style.display = 'none';
            }
          });
        });
      });
    </script>

<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      const tagsSelect = document.getElementById('tags');
      if (tagsSelect) {
          new Choices(tagsSelect, {
              removeItemButton: true,
              placeholderValue: 'Select or search tags',
              searchEnabled: true,
              shouldSort: false
          });
      }
  });
</script>



<!-- TinyMCE CDN -->
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.6.1/tinymce.min.js" integrity="sha512-bib7srucEhHYYWglYvGY+EQb0JAAW0qSOXpkPTMgCgW8eLtswHA/K4TKyD4+FiXcRHcy8z7boYxk0HTACCTFMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Initialize TinyMCE -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            tinymce.init({
                selector: '#inputDetail',
                height: 300,
                menubar: false,
                plugins: 'image advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
                toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | image | code | preview | media',
                setup: function (editor) {
                    editor.on('init', function () {
                        editor.getContainer().style.transition = 'border-color 0.3s';
                    });
                }
            });
        }, 300); // small delay helps with rendering issues
    });
</script>


    
    @yield('js')
   
  
    