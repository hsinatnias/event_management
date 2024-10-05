<?php if (session()->get('isLoggedIn')): ?>
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="<?= base_url('img/letterV.png') ?>" class="bi" width="40" height="32" role="img" aria-label="home" />
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Profile</a></li>
                    <li><a href="/events" class="nav-link px-2 link-body-emphasis">Events</a></li>
                    <li><a href="#" class="nav-link px-2 link-body-emphasis">Customers</a></li>
                    <li><a href="#" class="nav-link px-2 link-body-emphasis">Products</a></li>
                </ul>



                <div class="dropdown text-end">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">My Events</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign
                                out</a></li>
                        <form id="logout-form" action="/logout" method="POST">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </header>
<?php else: ?>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="img/letterV.png" class="bi" width="40" height="32" role="img" aria-label="home" />
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Features</a></li>
            <li><a href="#" class="nav-link px-2">Pricing</a></li>
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>


        </ul>

        <div class="col-md-3 text-end">
            <a class="btn btn-outline-primary me-2" href="/login">Login</a>
            <a class="btn btn-primary" href="/register">Sign-up</a>
        </div>
    </header>

<?php endif ?>