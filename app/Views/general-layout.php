<!DOCTYPE html >
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Property Admin</title>
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
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                <h2>start your code from here</h2>
              </div>
            </div>
          </div>
        </div>
        
        <?php include __DIR__ . '/../Layout/footer.php'; ?>
      </div>
  </div>
      <?php include __DIR__ . '/../Layout/jsLinks.php'; ?>
</body>
</html>