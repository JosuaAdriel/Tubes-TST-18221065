<!-- Footer -->
<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bioskop TST 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <style>
    /* Override Alertify's default notification styles */
    .alertify-notifier .ajs-message.ajs-success {
        /* Your custom styles for success notifications */
        background-color: #5cb881;
        color: white;
        /* Add other styles as needed */
    }

    .alertify-notifier .ajs-message.ajs-error {
        /* Your custom styles for error notifications */
        background-color: #d9534f;
        color: white;
        /* Add other styles as needed */
    }
</style>
    <script>
$(document).ready(function(){
    <?php if(session()->getFlashdata('successDeleteSchedule')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successDeleteSchedule'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('errorAddSchedule')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('errorAddSchedule'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successAddSchedule')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successAddSchedule'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('errorUploadPosterImg')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('errorUploadPosterImg'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('errorAddMovie')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('errorAddMovie'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successAddMovie')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successAddMovie'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('noNewDataMovie')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('noNewDataMovie'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successUpdateMovie')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successUpdateMovie'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successDeleteMovie')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successDeleteMovie'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('errorAddStudio')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('errorAddStudio'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('invalidCapacity')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('invalidCapacity'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successAddStudio')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successAddStudio'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successUpdateStudio')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successUpdateStudio'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('noDataUpdateStudio')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.error('<?php echo session()->getFlashdata('noDataUpdateStudio'); ?>');
    <?php } ?>
    <?php if(session()->getFlashdata('successDeleteStudio')){?>
    alertify.set('notifier','position', 'top-right');
    alertify.success('<?php echo session()->getFlashdata('successDeleteStudio'); ?>');
    <?php } ?>
});
    </script>
<script>
    function updateMovie() {
        var movieID = document.getElementById('movieID').value;
        document.getElementById('updateForm').action = '/movie/update/' + movieID;
        document.getElementById('updateForm').submit(); 
    };
</script>
<script>
    function updateStudio() {
        var studioID = document.getElementById('studioID').value;
        document.getElementById('updateForm').action = '/studio/update/' + studioID;
        document.getElementById('updateForm').submit(); 
    };
</script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()?>js/sb-admin-2.min.js"></script>

</body>
</html>