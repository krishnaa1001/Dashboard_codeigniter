<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Search Pixabay</h2>
        <form action="/search" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <input type="text" name="query" id="query" class="form-control" placeholder="Search for images or videos..." required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <?php if (isset($results)): ?>
        <div class="mt-4">
            <h3>Search Results</h3>
            <div class="row">
                <?php foreach ($results as $result): ?>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="<?= $result['previewURL'] ?>" class="card-img-top" alt="<?= $result['tags'] ?>">
                        <div class="card-body">
                            <p class="card-text"><?= $result['tags'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
