    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script>
        // Delete Modal
        window._conf = function($msg='',$func='',$params = []){		
            $('#confirm_modal .modal-body').html($msg)
            $('#confirm_modal').modal('show')
            $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")	
            // $("#confirm_modal #confirm").click(function(){
            // 	delete_client($params.join(','));
            // });	
        }     
    </script>


    <!-- Confirm Modal  -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
                <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                <button type="button" class="btn btn-dark waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>	

</body>

<style>
    .dropdown-divider {
        border-top-color: #2e3440 !important;
    }
</style>

</html>

