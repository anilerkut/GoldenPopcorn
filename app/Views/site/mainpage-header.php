<nav class="navbar navbar-expand-lg navbar-dark bg-turquoise py-3 header-radius">
        <a class="navbar-brand color-orange" href="#">GOLDENPOPCORN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto text-uppercase" id="menu">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('movies')?>">Movies<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('upcoming-movies')?>">Upcoming Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('actors')?>">Actors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('news-list')?>">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('profile/'.session()->get('user')['id'])?>">My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('login')?>">Log Out</a>
                </li>
            </ul>
        </div>
        <form action="<?= base_url('MovieController/searchByName/')?>" class="form-inline my-2 my-lg-0" id="searchForm" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Search movie" aria-label="Search" name="searchTxt" id="searchTxt">
            <button type="submit" class="btn btn-outline-warning my-2 my-sm-0" id="search">Search</button>
        </form>
</nav>