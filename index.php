<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>YouCrafting</title>
</head>
<body class="mx-auto mt-5" style="width:70%;">
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add New Article
</button>

<!-- Modal -->
<form action="insert.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Article Title</label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
</form>
<?php
include "classes.php";
$article = new Article();
$rows = $article->affichage();

?>
<table class="table table-dark table-striped mt-5">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Text</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($rows as $row) {
?>
    <tr>
        <th scope="row"><?= $row['id'] ?></th>
        <td><?= $row['titre'] ?></td>
        <td><?= $row['contenu'] ?></td>
        <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal-<?= $row["id"]; ?>">Edit</button>
           <a href="delete.php?id=<?=$row['id']?>" <button type="button" class="btn btn-danger">Delete</button></td>

    </tr>
    </tbody>
    <div class="modal fade" id="updateModal-<?= $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="update.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Article Title</label>
                            <input type="text" value="<?= $row['titre']?>" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
                            <textarea class="form-control"  name="text" id="exampleFormControlTextarea1" rows="3"><?= $row['contenu']?></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $row['id']?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    }
    ?>


</table>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>