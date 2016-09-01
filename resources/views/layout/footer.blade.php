<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong><!--Copyright &copy; 2015 --><a href="#">Powered by Jaidulit</a></strong> <!--All rights reserved.-->
</footer>

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->


<!-- REQUIRED JS SCRIPTS -->
@yield('footer')
        <!-- jQuery 2.1.4 -->
<!-- Bootstrap 3.3.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/0.7.10/vue-router.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.validator/2.1.4/vue-validator.min.js"></script>
<script src="{{ URL::asset('js/vueController.js') }}"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
