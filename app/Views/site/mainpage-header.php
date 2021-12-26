<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-2">
        <a class="navbar-brand text-warning" href="#">GOLDENPOPCORN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto text-uppercase" id="menu">
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('')?>">Movies<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('actors')?>">Actors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('directors')?>">Directors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('news-list')?>">News</a>
                </li>
                <li class="nav-item">
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('login')?>">Log Out</a>
                </li>
            </ul>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search" id="searchTxt">
            <a href="#" class="btn btn-outline-warning my-2 my-sm-0" id="btnSearch">Search</a>
        </form>
    </nav>