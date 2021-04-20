<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Checker</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <style>
        .main-content {
            margin: 60px 0;
        }
    </style>
</head>

<body>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="password-checker.php" method="post">

                                    <div class="col-12">
                                        <h3 class="title text-center my-4">Password Checker</h3>
                                    </div>

                                    <div class="col-12">
                                        <?php if (isset($_GET['error'])) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <ul class="list mb-0">
                                                    <?php foreach (unserialize(urldecode($_GET['errors'])) as $error) : ?>
                                                        <li class="list-item"><?= $error; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php elseif (isset($_GET['success'])) : ?>
                                            <div class="alert alert-success" role="alert">
                                                Password is good!
                                            </div>
                                        <?php else : ?>
                                            <div class="alert alert-secondary" role="alert">
                                                <small>A Good Password Requires:</small>
                                                <ul class="list mb-0">
                                                    <li class="list-item"><small>8 Charachters</small></li>
                                                    <li class="list-item"><small>1 Capital Letter</small></li>
                                                    <li class="list-item"><small>1 Lowercase Letter</small></li>
                                                    <li class="list-item"><small>1 Number</small></li>
                                                    <li class="list-item"><small>1 Special Character</small></li>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group my-2">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-dark mt-2 px-4">Check Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>