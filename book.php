<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sajilo Online Dictionary</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <!--google font link -->
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
</head>
<body>
    <?php include './includes/header.php';?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12" id="search-container" style="padding-top:200px;" >
                <form class="input-group">
                    <input type="text" class="form-control" placeholder="Search Book" id="wordInput">
                    <div class="input-group-btn">
                    <button class="btn btn-default" id="searchBtn">
                        Search &nbsp;<i class="glyphicon glyphicon-search"></i>
                    </button>
                    </div>
                </form>

                <p id="resultSection">
                </p>
            </div>
        </div>
    </div>

    <script src="./js/index.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<?php include './includes/footer.php'; ?>

</html>