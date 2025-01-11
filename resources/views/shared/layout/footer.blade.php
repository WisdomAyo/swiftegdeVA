   
   
   
     </div>
    </div>
  </main>
   <!-- Sidebar navigation offcanvas toggle that is visible on screens < 992px wide (lg breakpoint) -->
   <button type="button" class="fixed-bottom z-sticky w-100 btn btn-lg btn-dark border-0 border-top border-light border-opacity-10 rounded-0 pb-4 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#accountSidebar" aria-controls="accountSidebar" data-bs-theme="light">
    <i class="fi-sidebar fs-base me-2"></i>
    Account menu
  </button>


  <!-- Back to top button -->
  <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
    <a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
      Top
      <i class="fi-arrow-right fs-base ms-1 me-n1 animate-target"></i>
      <span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
      <svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"></rect>
      </svg>
    </a>
  </div>


  

    <script>







          window.addEventListener('load', () => {
        const preloader = document.getElementById('preloader');
        preloader.style.opacity = '0';
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500); // Delay to allow fade-out effect
    });
    </script>
  <!-- Vendor scripts -->


  <script>
    
tinymce.init({
        selector: '#texteditor',
        plugins: ['wordcount', 'advlist', 'autolink', 'link', 'image', 'list', 'charamp', 'preview', 'anchor', 'pagebreak','searchreplace', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 'table', 'emotions'],
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullscreen | forecolor backcolor emoticons',
        menu:{
            fave: {title: 'menu', item: 'code visualaid | searchreplace| emoticons'}
        },
        menu: 'favs file edit view insert  format tools table',
        content_style: `
            body {
                font-family:Helvetical,Arial, sans-serif;
                font-size: 16px;
                line-height: 1.5;
                color: #333;
                background-color: #f8f9fa;
                padding: 10px;
            }
            p {
                margin: 0 0 1em;
            }
        `,
        setup: function (editor) {
            editor.on('keyup', function () {
                const charCount = editor.plugins.wordcount.getCount();
                document.getElementById('char-count').textContent = `${charCount}/1500 characters`;
            });
        }
    });

  </script>


<script src="{{ asset('asset/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ asset('asset/vendor/choices/choices.min.js')}}"></script>
<script src="{{ asset('asset/vendor/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('asset/vendor/glightbox/glightbox.min.js')}}"></script>
<script src="{{ asset('asset/vendor/cleave.js/cleave.min.js') }}"></script>
<script src="{{ asset('asset/vendor/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('asset/vendor/list.js/list.min.js') }}"></script>

<script src="{{ asset('asset/js/sweetalert.min.js') }}"></script>

  <!-- Bootstrap + Theme scripts -->
  <script src="{{ asset('asset/js/theme.min.js')}}"></script>




</body>
</html>