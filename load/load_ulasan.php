<?php

require '../koneksi.php';

if (isset($_GET['limit']) && isset($_GET['start']) && isset($_GET['id'])) {
    $limit = $_GET['limit'];
    $start = $_GET['start'];
    $id = $_GET['id'];

    $query = "SELECT * FROM recomendations WHERE kost_id='$id' LIMIT $start";
}

$result = mysqli_query($koneksi, $query);

?>

<?php while ($data = mysqli_fetch_assoc($result)) : ?>
    <hr>

    <div class="d-flex">

        <?php if (isset($data['email'])) : ?>
            <img class="avatar avatar-md rounded-circle float-start me-3" src="https://gravatar.com/avatar/'<?php md5(strtolower(trim($data['email']))) ?>?s=1024" alt="avatar">
        <?php else : ?>
            <img class="avatar avatar-md rounded-circle float-start me-3" src="https://gravatar.com/avatar?s=1024" alt="avatar">
        <?php endif ?>

        <div>
            <div>
                <h6 class="m-0"><?= $data['nama'] ?></h6>
                <span class="me-3 small"><?= $data['created_at'] ?></span>
            </div>
            <ul class="list-inline">

                <?php for ($i = 0; $i <  (int) $data['rating']; $i++) : ?>
                    <li class="list-inline-item small me-0"><i class="fas fa-star text-warning"></i></li>
                <?php endfor ?>

            </ul>

            <p><?= $data['ulasan'] ?></p>
        </div>
    </div>
<?php endwhile ?>