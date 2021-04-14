<x-sticky />
<!-- THIS IS FOOTER -->
<footer class="container-fluid text-light-shade bg-dark-accent px-4 py-4 border-top ">
    <hr class="bg-dark-accent">
    <div id="footer-container" class="container">
    <div class="row" id="footer-cp">
        <div id="footer-column" class="col-12 d-flex justify-content-between align-items-center text-left">
        <span>
        <p>&copy; {{ date('Y') }} Rentahouse, Inc. All right reserved </p>
        </span>
        <span>
        <ul class="d-flex flex-row">
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