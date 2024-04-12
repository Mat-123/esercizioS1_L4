<?php

include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users_data WHERE username LIKE ?");
$stmt->execute([
    "%$search%"
]);

include __DIR__ . '/includes/html.php'; ?>

<h1 class="text-center">Ricerca utenti</h1>

    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca un utente">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>

    <ul><?php
        foreach ($stmt as $row) { ?>
            <li class="mb-3">
                <?= "$row[id] - $row[username] - $row[email]" ?>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/dettagli.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                <a href="/IFOA0124/S1L4-database-mysql-2/1-search-and-pagination/elimina.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
            </li><?php
        } ?>
    </ul>

    <nav aria-label="...">
  <ul class="pagination pagination-sm">
    <li class="page-item active" aria-current="page">
      <span class="page-link">1</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
  </ul>
</nav>

<?php

include __DIR__ . '/includes/end.php';