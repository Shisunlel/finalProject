<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- BOOTSTRAP -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
            crossorigin="anonymous"
        />
        <link rel="icon" type="image/png" href="/img/logo.png" />

        <!-- GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Poppins:wght@300;400;600&family=Akaya+Televigala&family=RocknRoll+One&display=swap"
            rel="stylesheet"
        />

        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="/css/index.css" />

        <title>{{config('app.name')}}</title>
    </head>
    <body>
        <noscript>
            This app require JavaScript enabled for it to work properly. Please
            enable JavaScript and refresh the page to continue.
        </noscript>
        {{-- success message --}}
        @if (session('success'))
        <div
            class="toast align-items-center text-white bg-success bg-gradient border-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
            data-bs-autohide="true"
            data-bs-animation="true"
            data-bs-delay="2000"
        >
            <div class="d-flex">
                <div class="toast-body">
                    {{ session("success") }}
                </div>
            </div>
        </div>
        @endif
        <div class="container-fluid m-0 p-0">
            <section id="headerContainer">
                <div class="container">
                    <!-- START NAV -->
                    <nav
                        class="navbar navbar-expand-md navbar-light bg-transparent border-md-bottom"
                    >
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseNav"
                            aria-controls="collapseNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="collapseNav">
                            <div class="logo d-none d-md-inline-block">
                                <a class="navbar-brand" href="/"
                                    ><img
                                        loading="lazy"
                                        src="/img/logo.png"
                                        alt=""
                                /></a>
                            </div>
                            <div class="nav-items">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#services"
                                            >Services</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#features"
                                            >Features</a
                                        >
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about"
                                            >About</a
                                        >
                                    </li>
                                    @auth
                                    <li class="nav-item">
                                        <form
                                            id="logoutForm"
                                            action="{{ route('logout') }}"
                                            method="post"
                                        >
                                            @csrf
                                            <a
                                                class="nav-link"
                                                href="javascript:{}"
                                                onclick="document.getElementById('logoutForm').submit();"
                                                >Logout</a
                                            >
                                        </form>
                                    </li>
                                    @endauth @guest
                                    <li class="nav-item mt-2 mt-md-0">
                                        <a
                                            href="{{ route('login.index') }}"
                                            class="nav-link"
                                            >Login</a
                                        >
                                    </li>
                                    <li class="nav-item mt-3 mt-md-0">
                                        <a
                                            class="btn btn-dark-shade"
                                            id="registerbtn"
                                            href="{{ route('register.index') }}"
                                            >Register</a
                                        >
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- END OF NAV -->
                    <!-- HEAD -->
                    <header class="mt-5 mt-md-2 mt-xxl-5">
                        <div class="row">
                            <section
                                id="header"
                                class="d-flex flex-column align-items-center justify-content-md-center col-12"
                            >
                                <h1
                                    class="text-center text-md-left font-weight-bolder"
                                >
                                    Find Your <span>Perfect Place. </span>
                                </h1>
                                <p class="text-center text-md-left small">
                                    Enjoy the comforts of an affordable rental,
                                    with the peace of mind of booking with our
                                    app
                                </p>
                                <div class="form-group">
                                    <form
                                        class="searchForm"
                                        action="{{ route('search') }}"
                                        method="GET"
                                    >
                                        <span id="search"
                                            ><a
                                                type="submit"
                                                class="text-dark"
                                                href="{{ route('search') }}"
                                                ><i
                                                    class="fas fa-search"
                                                ></i></a
                                        ></span>
                                        <input
                                            type="text"
                                            class="searchInput"
                                            placeholder="Search for a location ..."
                                            name="location"
                                            autocomplete="off"
                                        />
                                        <button
                                            type="button"
                                            class="btn btn-light ms-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#filter"
                                        >
                                            <i class="fas fa-sliders-h"></i>
                                        </button>
                                        <!-- button for drop down -->
                                        <!-- Modal -->
                                        <div
                                            class="modal fade"
                                            id="filter"
                                            tabindex="-1"
                                            aria-labelledby="#filterLabel"
                                            aria-hidden="true"
                                        >
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-gradient bg-white text-dark">
                                                    <div class="modal-header">
                                                        <h5
                                                            class="modal-title"
                                                            id="#filterLabel"
                                                        >
                                                            How many people are staying ?
                                                        </h5>
                                                    </div>
                                                    <div class="modal-body">
                                                      <input type="range" name="guest" class="form-range" value="1" step="1" min="1" max="9" id="guest">
                                                      <label for="guest" id="slider__indicator" class="form-label"></label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-primary"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Save changes
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- End of Modal -->
                                    </form>
                                </div>
                            </section>
                        </div>
                    </header>
                </div>
            </section>
            <!-- END HEAD -->
            <!-- SERVICE SECTION -->
            <div class="container mt-5 fade-in">
                <section id="services" class="text-center mb-5">
                    <h1 class="font-weight-bold text-uppercase">
                        Our Services
                    </h1>
                    <p class="small">
                        When it comes to real estate and properties, we're here
                        all the way.
                    </p>
                </section>
                <section id="card-section">
                    <div class="card-deck">
                        <div class="card align-items-center">
                            <span class="card-animation">
                                <div class="image-container">
                                    <img
                                        loading="lazy"
                                        class="card-img-top"
                                        src="img/building.png"
                                        alt="Card image cap"
                                    />
                                </div>
                                <div class="card-body text-center">
                                    <h5
                                        class="card-title text-dark-accent text-uppercase font-weight-bold"
                                    >
                                        Fixed Fee & Support
                                    </h5>
                                    <p class="card-text">
                                        You'll only pay one fee,and it's fixed
                                        from the beginning. There are no
                                        surprise, and we never add commission.
                                    </p>
                                </div>
                            </span>
                        </div>
                        <div class="card align-items-center">
                            <span class="card-animation">
                                <div class="image-container">
                                    <img
                                        loading="lazy"
                                        class="card-img-top"
                                        src="img/home.png"
                                        alt="Card image cap"
                                    />
                                </div>
                                <div class="card-body text-center">
                                    <h5
                                        class="card-title text-dark-accent text-uppercase font-weight-bold"
                                    >
                                        Local Estate Agent
                                    </h5>
                                    <p class="card-text">
                                        Your dedicated local estate and their
                                        team of property experts will be with
                                        you every step until your home is sold.
                                    </p>
                                </div>
                            </span>
                        </div>
                        <div class="card align-items-center">
                            <span class="card-animation">
                                <div class="image-container">
                                    <img
                                        loading="lazy"
                                        class="card-img-top"
                                        src="img/quick.png"
                                        alt="Card image cap"
                                    />
                                </div>
                                <div class="card-body text-center">
                                    <h5
                                        class="card-title text-dark-accent text-uppercase font-weight-bold"
                                    >
                                        Quick & Easy
                                    </h5>
                                    <p class="card-text">
                                        Our partner can help with mortgages and
                                        conveyancing, and every homeowner gets
                                        free utilities switching services.
                                    </p>
                                </div>
                            </span>
                        </div>
                    </div>
                </section>
            </div>
            <!-- END SERVICE SECTION -->
            <!-- FEATURES -->
            <div class="container-fluid bg-dark-shade fade-in" id="features">
                <div class="container text-light py-5">
                    <section id="features-title" class="text-center">
                        <h1 class="font-weight-bold text-uppercase">
                            Features
                        </h1>
                        <p class="small">
                            Here's why our service is <em>FAR</em> differ from
                            our competitor.
                        </p>
                    </section>

                    <section id="list-features">
                        <div class="row p-3">
                            <div class="col-12 col-md-6 my-4">
                                <div
                                    class="row align-items-center justify-content-center"
                                >
                                    <figure
                                        class="col-4 col-md-5 features-logo text-center"
                                    >
                                        <i
                                            class="fas fa-tachometer-alt fa-3x text-danger"
                                        ></i>
                                    </figure>
                                    <div
                                        class="text-container col-8 col-md-7 text-left"
                                    >
                                        <h5>High Speed Internet</h5>
                                        <p class="small">
                                            With our high speed internet
                                            technology, you won't ever lag
                                            behind or miss an important date
                                            again.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-4">
                                <div
                                    class="row align-items-center justify-content-center"
                                >
                                    <figure
                                        class="col-4 col-md-5 features-logo text-center order-2"
                                    >
                                        <i
                                            class="fas fa-user-lock fa-3x text-warning"
                                        ></i>
                                    </figure>
                                    <div
                                        class="text-container col-8 col-md-7 text-right order-md-2"
                                    >
                                        <h5>Maximum Privacy</h5>
                                        <p class="small">
                                            Our app comes with a backdoor
                                            security as well as 2-Auth password
                                            so you won't have to deal with
                                            insecurity of your account. <br />
                                            We don't sell your data like some
                                            shh big company
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-4">
                                <div
                                    class="row align-items-center justify-content-center"
                                >
                                    <figure
                                        class="col-4 col-md-5 features-logo text-center"
                                    >
                                        <i
                                            class="far fa-comment-dots fa-3x text-success"
                                        ></i>
                                    </figure>
                                    <div
                                        class="text-container col-8 col-md-7 text-left"
                                    >
                                        <h5>Instant Reply</h5>
                                        <p class="small">
                                            Do not worry, we won't left you on
                                            read. Our 24/7 support will be with
                                            you every step of the way including
                                            hangover talks.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-4">
                                <div
                                    class="row align-items-center justify-content-center"
                                >
                                    <figure
                                        class="col-4 col-md-5 features-logo text-center order-2"
                                    >
                                        <i
                                            class="fas fa-hand-sparkles fa-3x text-skin"
                                        ></i>
                                    </figure>
                                    <div
                                        class="text-container col-8 col-md-7 text-right order-md-2"
                                    >
                                        <h5>Hygene</h5>
                                        <p class="small">
                                            Taking care of our dear customers is
                                            always our priority so every time
                                            our customers check out and in. we
                                            make sure that the rooms are always
                                            kept clean because we are not a
                                            lazybones.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END FEATURES -->

            <!-- ABOUT -->
            <div
                class="container-fluid py-4 border-top text-center no-mpding fade-in"
            >
                <div class="container">
                    <section id="about">
                        <h1
                            class="font-weight-bold text-uppercase text-uppercase"
                        >
                            About Us
                        </h1>
                        <p class="small">
                            The mastermind behind this amazing app
                        </p>
                    </section>
                    <section id="team">
                        <div class="row">
                            <div
                                class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex flex-column align-items-center"
                            >
                                <figure class="user-image">
                                    <img
                                        loading="lazy"
                                        src="https://i.pinimg.com/originals/75/52/3a/75523a11530b7ae378aef6497457f7b8.jpg"
                                        alt="userimg"
                                    />
                                </figure>
                                <div class="text-content">
                                    <h5 class="font-weight-bold">
                                        <a
                                            href="https://www.github.com/shisunlel"
                                            target="_blank"
                                        >
                                            Vutha Vyrapol
                                        </a>
                                    </h5>
                                    <p
                                        class="text-info small font-weight-light"
                                    >
                                        Web Developer
                                    </p>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex flex-column align-items-center"
                            >
                                <figure class="user-image">
                                    <img
                                        loading="lazy"
                                        src="https://i.pinimg.com/originals/93/3f/fa/933ffa776e73d640baa5172fb2e315c3.jpg"
                                        alt="user2img"
                                    />
                                </figure>
                                <div class="text-content">
                                    <h5 class="font-weight-bold">Hong David</h5>
                                    <p
                                        class="text-info small font-weight-light"
                                    >
                                        Software Developer
                                    </p>
                                </div>
                            </div>
                            <div
                                class="col-12 col-md-6 col-lg-3 d-flex flex-column align-items-center"
                            >
                                <figure class="user-image">
                                    <img
                                        loading="lazy"
                                        src="https://i.pinimg.com/originals/f9/e7/ad/f9e7ad3906cd503ee74d0867f085889e.jpg"
                                        alt="user3img"
                                    />
                                </figure>
                                <div class="text-content">
                                    <h5 class="font-weight-bold">
                                        San Vuthdimong
                                    </h5>
                                    <p
                                        class="text-info small font-weight-light"
                                    >
                                        Graphic Designer
                                    </p>
                                </div>
                            </div>
                            <div
                                class="col-12 col-sm-6 col-md-6 col-lg-3 d-flex flex-column align-items-center"
                            >
                                <figure class="user-image">
                                    <img
                                        loading="lazy"
                                        src="https://wallpaperaccess.com/full/1629593.jpg"
                                        alt="user4img"
                                    />
                                </figure>
                                <div class="text-content">
                                    <h5 class="font-weight-bold">Lim Visal</h5>
                                    <p
                                        class="text-info small font-weight-light"
                                    >
                                        Software Tester
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- END ABOUT -->
            <!-- FOOTer -->
            <footer
                class="container-fluid text-light-shade bg-dark-accent px-4 py-4 border-top fade-in"
            >
                <div class="row text-md-center my-3">
                    <div class="col-12 col-md-4 mt-2 mb-2">
                        <section class="about-footer">
                            <h6 class="text-uppercase" style="font-family: 'Oswald'"><strong> About </strong></h6>
                            <ul class="navbar-nav">
                                <a href="#team" class="mb-1"
                                    ><li class="nav-item">Our Team</li></a
                                >
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">Career</li></a
                                >
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">Partners</li></a
                                >
                            </ul>
                        </section>
                    </div>
                    <div class="col-12 col-md-4 mt-2 mb-2">
                        <section class="host-footer">
                            <h6 class="text-uppercase" style="font-family: 'Oswald'"><strong> Host </strong></h6>
                            <ul class="navbar-nav">
                                <a href="{{ route('rooms.create') }}" class="mb-1"
                                    ><li class="nav-item">Host your home</li></a
                                >
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">
                                        Guideline and Policy
                                    </li></a
                                >
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">Payments</li></a
                                >
                            </ul>
                        </section>
                    </div>
                    <div class="col-12 col-md-4 mt-2 mb-2">
                        <section class="support-footer">
                            <h6 class="text-uppercase" style="font-family: 'Oswald'"><strong> Support </strong></h6>
                            <ul class="navbar-nav">
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">Help</li></a
                                >
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">Trust & Safety</li></a
                                >
                                <a href="#" class="mb-1"
                                    ><li class="nav-item">Contact</li></a
                                >
                            </ul>
                        </section>
                    </div>
                </div>
                <hr class="bg-dark-accent" />
                <div id="footer-container" class="container-lg">
                    <div class="row" id="footer-cp">
                        <div
                            id="footer-column"
                            class="col-12 d-md-flex justify-content-between align-items-center text-left"
                        >
                            <span>
                                &copy; {{ date("Y") }} Rentahouse, Inc. All
                                right reserved
                            </span>
                            <span>
                                <ul
                                    class="d-flex flex-row m-0 mt-3 mt-md-0 p-0"
                                >
                                    <li class="nav-item social-link">
                                        <a
                                            href="https://www.facebook.com/shisun8"
                                            target="_blank"
                                            class="me-4"
                                            ><i
                                                class="fab fa-facebook-f"
                                                id="facebook"
                                            ></i
                                        ></a>
                                    </li>
                                    <li class="nav-item social-link">
                                        <a
                                            href="https://www.twitter.com/shisunxd"
                                            target="_blank"
                                            class="me-4"
                                            ><i
                                                class="fab fa-twitter"
                                                id="twitter"
                                            ></i
                                        ></a>
                                    </li>
                                    <li class="nav-item social-link">
                                        <a
                                            href="https://github.com/Shisunn/"
                                            target="_blank"
                                            class=""
                                            ><i
                                                class="fab fa-github"
                                                id="github"
                                            ></i
                                        ></a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"
    ></script>
    <!-- Font Awesome -->

    <script
        src="https://kit.fontawesome.com/7686e548c6.js"
        crossorigin="anonymous"
    ></script>

    <script src="/js/index.js"></script>
</html>
