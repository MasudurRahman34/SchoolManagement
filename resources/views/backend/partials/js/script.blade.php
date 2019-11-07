	<script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}" ></script>
    <script src="{{ asset('admin/js/popper.min.js') }}" ></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('admin/js/main.js') }} "></script>
    <script src="{{ asset('admin/js/plugins/pace.min.js') }} "></script>
    <script src="{{ asset('admin/js/plugins/sweetalert.min.js') }} "></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-notify.min.js') }} "></script>


   <!-- <script src="{{ asset('admin/js/plugins/fakeLoader.min.js') }}" ></script> -->


<script>

function successNotification() {
    $.notify({
            title: "Update Complete : ",
            message: "Something cool is just updated!",
            icon: 'fa fa-exclamation-triangle'
        }, {
            type: "success",
            delay: 100,
            timer: 600,

        });
        // setTimeout(function() {window.location.reload();}, 600);
        setTimeout(function() {table.draw()}, 600);
}


</script>
