<footer class="footer">
    <div class="container-fluid">
      <ul class="nav">
        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link">
            Vutha Vyrapol
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0)" class="nav-link">
            About Us
          </a>
        </li>
      </ul>
      <div class="copyright">
        © {{date('Y')}} made with <i class="tim-icons icon-heart-2"></i> by
        <a href="https://www.github.com/shisunlel" target="_blank">Vutha Vyrapol</a> for a better web.
      </div>
    </div>
  </footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/black-dashboard.min.js')}}"></script>
@yield('script')
</body>

</html>