
<!-- Start Copyright Area -->
<div class="copyrights-area">
    <div class="row align-items-center">
        <div class="col-lg-6 col-sm-6 col-md-6">
            <p><i class="ri-copyright-line"></i> 2022 <a href="#">SwiftedgeVA</a>. All rights reserved</p>
        </div>

    </div>
</div>
<!-- End Copyright Area -->

</div>

<!-- Links of JS files -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{asset('assets/js/odometer.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/selectize.min.js')}}"></script>
<script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>
<script src="{{asset('assets/js/metismenu.min.js')}}"></script>
<script src="{{asset('assets/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/js/dropzone.min.js')}}"></script>
<script src="{{asset('assets/js/sticky-sidebar.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>




<script type="application/javascript">
    $(document).ready(function(){
        const el = document.getElementById('select');
        $("#compensation").hide();
        $("#compensation2").hide();
        el.addEventListener('change', function handleChange(event) {
            if (event.target.value === 'salary') {
                $("#compensation").show();
                $("#compensation2").show();
            } else {
                $("#compensation").hide();
                $("#compensation2").hide();
            }
            //Your actions here

        });
    });
</script>

<script>
    $(function() {
        $('select[name=state]').change(function() {
            const option = document.getElementById("state").value;
            const url = '{{ url('state') }}' +'/'+ option + '/areas';

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="state_area"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="state_area"]').append('<option value="'+ value.local_name +'">'+ value.local_name +'</option>');
                    });
                }
            });
        });
    });

</script>


</body>
</html>
