<script>
    $(function() {
        $('select[name=country]').change(function() {
            const option = document.getElementById("country").value;
            const url = '{{ url('country') }}' +'/'+ option + '/states';

            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="state"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="state"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        });

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
                        $('select[name="state_area"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
        });

    });

</script>