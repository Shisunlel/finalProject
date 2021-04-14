<x-sticky />
<!-- THIS IS FOOTER -->
<footer class="container-fluid text-light-shade bg-dark-accent px-4 py-4 border-top ">
    <div class="row text-md-center my-3">
      <div class="col-12 col-md-4 mt-2 mb-2">
        <section class="about-footer">
          <h6 class="text-uppercase"><strong> About </strong></h6>
          <ul class="navbar-nav">
            <a href="/#team" class="mb-1"><li class="nav-item">Our Team</li></a>
            <a href="#" class="mb-1"><li class="nav-item">Career</li></a>
            <a href="#" class="mb-1"><li class="nav-item">Partners</li></a>
          </ul>
        </section>
      </div>
      <div class="col-12 col-md-4 mt-2 mb-2">
        <section class="host-footer">
          <h6  class="text-uppercase"><strong> Host </strong></h6>
          <ul class="navbar-nav">
            <a href="{{route('rooms.create')}}" class="mb-1"><li class="nav-item">Host your home</li></a>
            <a href="#" class="mb-1"><li class="nav-item">Guideline and Policy</li></a>
            <a href="#" class="mb-1"><li class="nav-item">Payments</li></a>
          </ul>
        </section>
      </div>
      <div class="col-12 col-md-4 mt-2 mb-2">
        <section class="support-footer">
          <h6 class="text-uppercase"><strong> Support </strong></h6>
          <ul class="navbar-nav">
            <a href="#" class="mb-1"><li class="nav-item">Help</li></a>
            <a href="#" class="mb-1"><li class="nav-item">Trust & Safety</li></a>
            <a href="#" class="mb-1"><li class="nav-item">Contact</li></a>
          </ul>
        </section>
      </div>
    </div>
    <hr class="bg-dark-accent">
    <div id="footer-container" class="container">
    <div class="row" id="footer-cp">
      <div id="footer-column" class="col-12 d-md-flex justify-content-between align-items-center text-left">
        <span>
        <p>&copy; {{ date('Y') }} Rentahouse, Inc. All right reserved </p>
      </span>
      <span>
        <ul class="d-flex flex-row m-0 mt-3 mt-md-0">
          <li class="nav-item"><a href="https://www.facebook.com/shisun8" class="me-4"><i class="fab fa-facebook-f" id="facebook"></i></a></li>
         <li class="nav-item"> <a href="https://www.twitter.com/xqcow" class="me-4"><i class="fab fa-twitter" id="twitter"></i></a></li>
          <li class="nav-item"><a href="https://github.com/Shisunn/" class=""><i class="fab fa-github" id="github"></i></a></li>
        </ul>
      </span>
      </div>
    </div>
  </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
 <!-- Font Awesome -->
<script src="https://kit.fontawesome.com/7686e548c6.js" crossorigin="anonymous"></script>
<script src="/js/default.js"></script>

 @yield('script')
</body>
</html>