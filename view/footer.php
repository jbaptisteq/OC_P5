
<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-6" style="color: orange">
                    <h3>Debug</h3>
                    <pre><?php print_r($_SESSION['debug']) ?></pre>
                </div>
                <div class="footer-col col-md-6" style="color: red">
                    <h3>Errors</h3>
                    <pre><?php print_r($_SESSION['error']) ?></pre>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: '#articleContent'
            });
        });
    </script>
</body>

</html>
