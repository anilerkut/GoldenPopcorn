<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/news-details.css">
    <link rel="stylesheet" href="/css/main-page-header.css">
    <title>GoldenPopcorn | News</title>
</head>

<body>

<?= $this->include('site/mainpage-header.php') ?>

<div class="container my-5">
<article class="postcard light red">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="<?= $news->actor_picture ?>" alt="Image Title" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue text-center"><?= $news->news_title ?></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i><?= $news->news_date ?>
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt"><?= $news->news_content ?></div>
				<ul class="postcard__tagbox">

					<li class="tag__item play blue">
						<a href="<?= base_url('ActorController/actorDetails/'.$news->actor_id ) ?>"><i class="fas fa-tag mr-2"></i>Related Actor: <?= $news->actor_firstname." ".$news->actor_lastname ?></a>
				    </li>
			    </ul>
		</div>
</article>
</div>

<?= $this->include('site/mainpage-footer.php') ?>

</body>

</html>
