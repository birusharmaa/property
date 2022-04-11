<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Properties - System</title>
    <?php include __DIR__ . '/../Layout/cssLinks.php'; ?>
</head>

<body>
    <div id="layout-p" class="theme-navy">
        <?php include __DIR__ . '/../Layout/header.php'; ?>
        <?php include __DIR__ . '/../Layout/sidebar.php'; ?>
        <div class="main">
            <div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
                <div class="container-fluid">
                    <div class="row pt-2">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center py-2">
                                <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                                    <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">System</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body mb-2 px-xl-4 px-md-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <div class="col-md-12 p-0">
                                <div class="red-bg text-center text-white rounded py-2 mb-3">
                                    <h1 class=" fw-bolder">System</h1>
                                </div>
                            </div> -->
                            <div class="row mx-auto p-4 system-bg-color">
                                <div class="col-md-5 ms-5 me-5 bg-white py-5 rounded text-center">
                                    <button class="btn btn-danger system-down text-white fw-bolder px-5 fs-5 "> <i
                                            class="bi bi-arrow-down-circle-fill fs-4"></i> System Down</button>
                                </div>
                                <div class="col-md-5  bg-white py-5 rounded text-center">
                                    <button class="btn btn-success system-restore text-white fw-bolder px-5 fs-5 "><i
                                            class="fa fa-refresh fs-3"></i> System Restore</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include __DIR__ . '/../Layout/footer.php'; ?>
        </div>
    </div>
    <?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
    <script>
    document.querySelector(".system-down").addEventListener('click', function() {
        Swal.fire({
            title: 'Are You Sure?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Save!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });

    document.querySelector(".system-restore").addEventListener('click', function() {
        Swal.fire({
            title: 'Are You Sure?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Save!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    });
    </script>
</body>

</html>