<?php
require_once('config.php');
if(isset($_POST['search_text']) && $_POST['search_text'] != ''){
    $sql = 'SELECT * FROM movie WHERE Name LIKE "%'.$_POST['search_text'].'%"'; 
}else{
    $sql = 'SELECT * FROM movie';
}
$query = mysqli_query($conn,$sql);
$resultlist = [];
while($row = mysqli_fetch_assoc($query)){
    $resultlist[] = $row;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WatchIt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>
    <style>
        body {
            height: auto;
            width: auto;
            background-image: url("https://images.pling.com/img/00/00/45/66/30/1173782/b5c24f731860780e02d417710fddf2841f9d.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        a {
            text-decoration: none;
            color: white;
        }

        .movies1 {
            margin-top: 3.4rem;
            margin-left: 2rem;
            margin-right: 0.5rem;
            padding: 4rem;
            display: flex;
            color: aliceblue;
            background-color: rgba(27, 23, 23, 0.247);
            border-radius: 9px;
            flex-wrap: wrap;
            /* flex-direction: row ; */
        }

        .mv {
            height: 16rem;
            width: 11rem;
            margin-left: 10px;
            border: 9px solid rgba(255, 255, 255, 0);
            border-bottom: 35px solid rgba(255, 255, 255, 0);
            border-radius: 10px;
        }

        #picture {
            border-radius: 9px;
            border: 5px solid rgba(255, 255, 255, 0.418);
        }

        @media only screen and (max-device-width: 480px) {
            body {
                background-image: none;
                background-color: rgb(24, 28, 31);
            }

            .mv {
                height: 9rem;
                width: 6rem;
                padding: 0rem;
                padding-bottom: 1rem;
                margin: 0rem;
            }

            .movies1 {
                margin: 2rem;
                margin-top: 4rem;
                padding: 0.2rem;
                padding-bottom: 2rem;

            }
        }

        @media only screen and (max-device-width: 1080px) {
            body {
                background-image: none;
                background-color: rgb(24, 28, 31);
            }

            .html {
                scroll-behavior: smooth;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#"><b class="text-warning">W</b>atch<b
                    class="text-warning">I</b>t</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#">HINDI DUBBED</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">ENGLISH DUBBED</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-warning" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Help
                        </a>
                        <ul class="dropdown-menu bg-secondary-subtle">
                            <li><a class="dropdown-item" href="contact.html">Contact Us</a></li>
                            <li><a class="dropdown-item" href="contact.html">Report Bugs</a></li>
                            <!-- <li>
                                <hr class="dropdown-divider">
                            </li> -->
                            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success text-white" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="movies1">
        <?php foreach($resultlist as $val){ ?>
        <div class="mv">
            <a href="<?=$val['url']?>">
                <img src="<?=$val['Link']?>"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p><?=$val['Name']?></p>
                </center>
            </a>
        </div>
        <?php } ?>
<!--         <div class="mv">
            <a href="https://hurawatch.at/series/lucifer-82nyn/1-1">
                <img src="https://static.bunnycdn.ru/i/cache/images/c/ce/ce0e58277823f2033ddc2e29a11c5cbf.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Lucifer</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/series/game-of-thrones-92p7q/1-1" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/b/bf/bf51aca050fb82de485ce9fe4cd3ce96.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Game of thrones</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/series/1899-171qv/1-1" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/5/57/57633191f0968621cbfa5b68b7ebd4e9.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>1899</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/series/breaking-bad-1rlq/1-1" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/4/4c/4c159d6242073e043af6f4b488704973.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Breaking bad</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://sflix.to/watch-movie/free-bahubali-the-beginning-hd-16383.5302846" id="poster">
                <img src="https://img.sflix.to/xxrz/250x400/224/bb/15/bb15a02812690070b6d1fdf74adf6bd7/bb15a02812690070b6d1fdf74adf6bd7.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Bahubali 1</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://111.90.159.132/action/bahubali-2-the-conclusion/" id="poster">
                <img src="https://111.90.159.132/wp-content/uploads/2020/08/sXf30F2HFpsFPXlNz7jpOySSV9I.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Bahubali 2</p>
                </center>
            </a>
        </div>



        <div class="mv">
            <a href="https://sflix.to/watch-movie/free-sanam-teri-kasam-hd-12.5369326" id="poster">
                <img src="https://img.sflix.to/xxrz/250x400/224/4e/fa/4efa0fd5e5eccd8d7a9b509615b2b9f0/4efa0fd5e5eccd8d7a9b509615b2b9f0.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Sanam teri kasam</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://sflix.to/tv/free-the-100-hd-39551" id="poster">
                <img src="https://img.sflix.to/xxrz/250x400/224/17/70/17706b76db65afe64fcfa91aafecd9b5/17706b76db65afe64fcfa91aafecd9b5.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>The 100</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://sflix.to/watch-movie/free-children-of-the-corn-hd-94339.9462745" id="poster">
                <img src="https://img.sflix.to/xxrz/250x400/224/e6/c1/e6c11364ad8217b40d51ce16eef65542/e6c11364ad8217b40d51ce16eef65542.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Children of the corn</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://sflix.to/watch-movie/free-avengers-endgame-hd-19722.5376856" id="poster">
                <img src="https://img.sflix.to/xxrz/250x400/224/d5/c9/d5c931df6080a426ed559d24896d5349/d5c931df6080a426ed559d24896d5349.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Avenger's Endgame</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/life-of-pi-l6lm/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/d/de/deda3b66864a2df9fe7bb247ca6bf6b4.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Life of Pi</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/lullaby-0m793/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/b/b1/b16561dc7604e085f6e2fc4196dc32bd.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Lullaby</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/series/all-of-us-are-dead-x1x2z/1-1" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/c/cc/ccd02c49a4096e3e3ae1409a159e28b4.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>All Of Us Are Dead</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/john-wick-chapter-4-x1n08/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/9/9f/9f2b3516bf3b43a5eec8d7ece7f2fd42.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>John Wick-chapter 4</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/kgf-chapter-1-nrlyk/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/2/21/21928536e0bc4ba257af1cd879b40089.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>KGF chapter 1</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/bunker-of-blood-chapter-2-deadly-dolls-deepest-cuts-v565l/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/a/a4/a48f14f6f66f769906760a47af1e0fe0.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Deadly dolls</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/insidious-qjkw/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/1/1f/1f1e4714010a2e21cc1fd18d38b3a29c.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Incidious</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/moonfall-20xql/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/7/72/729b833516a7b9c552f4dd621229e30d.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p> The Moonfall</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/moonfall-20xql/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/3/31/3107dadaa5bc65734f3bbad2eb397f74.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p> Infinity</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/3-idiots-xr9w/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/e/ef/ef65cb4fb9011ae06a6440404a2d233f.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p> 3 idiots</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/pk-ojl68/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/1/14/14c15b30136e461dbc8de865f44e5fb6.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>PK</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/zero-lrkxq/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/c/ca/ca54754a85144160fe6d067ecc230a6c.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>ZERO</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/dangal-kw6zw/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/e/ef/ef453f22e911b9f4f2c4a62b84e862d0.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Dangal</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/dilwale-dulhania-le-jayenge-myvp/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/e/e2/e297df15c361cc058a7aa4b1a9d6c3d9.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Dilwale Dulhaniya Le Jayenge</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/om-shanti-om-33r9/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/6/60/609987fe455f672bc7b482572c8c06f4.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Om Shanti Om</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/padmaavat-8n82q/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/4/4b/4b96cfa76c34465ea007700ad5e36a0e.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Padmavat</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/bajirao-mastani-q6k5/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/1/16/16079c1667c095f93d888ac7c7a9bf7c.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Bajirao Mastani</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/gully-boy-rj56p" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/5/55/55424f29c9d261f58caf0f4791b35307.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Gully Boy</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/devdas-0r08r/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/f/fd/fd733e0a0e27df951fc269633f302ae7.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Devdas</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/jab-tak-hai-jaan-k6v9/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/c/c5/c5b70d3d502f9f35f7ff1b755e4d185e.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Jab Tak Hai Jaan</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/pari-l3553/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/e/eb/eb24d50b4ca6192d9335738b3e46e479.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Pari</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/kuch-kuch-hota-hai-2qq5/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/c/ca/caa66e87ef5eb46859c913c66e18fd7e.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Kuch Kuch Hota Hai</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/kanchana-2-7x6y/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/6/63/63dd171fd84a2c612dae7432bbda9a04.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Kanchana 2</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/1920-london-w424/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/0/03/0336a2ab16ce21db3229204de1b03dc6.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>1920 LONDON</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/sarbjit-95lm/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/9/97/97765e5c9e2dcfb5a66cc86079141e74.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Sarabjit</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/the-villain-q53w/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/5/5d/5d6c79eb5e058eb5ee731c141ddace24.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Ek Villain</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/the-field-guide-to-evil-rj5jq/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/2/24/24b32fab5e60e9a149ba3229741283d8.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>The Field Guide To Evil</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/rrr-pm6k9/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/2/25/2536a75c2098b90f1bf0901dee8dcdef.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>RRR</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/rosogolla-30x2y/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/3/3d/3d2fa857a88e72b504bf527e19d084c8.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Rosogolla</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/freddy-20690/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/5/53/53a7187f2fa910d923dc140d321eddff.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Freddy</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/train-to-busan-529z0/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/f/ff/ffd97e6756e9d4e746822762d584e280.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Train To Buan</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/venom-v5z07/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/b/b5/b50cc69e01a82565afb735ed113749fa.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Venom</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/the-conjuring-91wq/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/3/32/3295ed8124de5cb9d8c555eda405ae0c.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>The Conjuring</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/the-conjuring-2-7556/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/0/0f/0f76ebfad30558590fdbe984743ddb47.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Conjuring 2</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/annabelle-comes-home-k3o84/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/d/d3/d389c9d5f63f54680407a7ee7b562a6b.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>Annabelle</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://hurawatch.at/movie/the-nun-jjyo3/1-full" id="poster">
                <img src="https://static.bunnycdn.ru/i/cache/images/0/0b/0b0c34f47b0d10d8528ca11325321325.jpg-w380"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>The Nun</p>
                </center>
            </a>
        </div>
        <div class="mv">
            <a href="https://sflix.to/tv/free-the-family-man-hd-52323" id="poster">
                <img src="https://img.sflix.to/xxrz/250x400/224/7f/e7/7fe7478ccf4e46301977afded62500b4/7fe7478ccf4e46301977afded62500b4.jpg"
                    style="height: 100%;width:100%;" id="picture">
                <center>
                    <p>The family man</p>
                </center>
            </a>
        </div> -->
    </div>
</body>

</html>