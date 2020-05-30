$(document).ready(function(){
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    })

    $('#published').on('change', function (event) {
        var checkBoxes = $("input[name=recipients]");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: "{{ route('admin/slider/publier') }}",
            data: {

                'id': id
            },
            
            // function(data == 'Success'){
            //     if(data == 'Success'){

            //         $("#resultat").html("<p>Validation</p>");
            //    }
            //    else{

            //         $("#resultat").html("<p>Erreur</p>");
            //    }
            // }
        });

    });
})