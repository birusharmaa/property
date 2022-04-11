<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
	<div class="container-fluid">
		<div class="row pt-2">
			<div class="col-12">
				<div class="d-flex justify-content-between align-items-center py-2">
					<ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
						<li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Add Income</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="body mb-2 px-xl-4 px-md-2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-11 p-0 m-auto">
				<div class="red-bg text-center text-white rounded py-2 my-3">
					<h1 class=" fw-bolder">Add Income</h1>
				</div>
			</div>
			<div class="col-md-11 m-auto bg-white">
				<form action="" class="row w-75 py-5 ps-5 m-auto">
					<div class="col-md-4  ">
						<div class="">
							<label class="form-label fw-bold m-0">Income Amount</label>
							<input type="text" name="amount" id="amount" class="form-control border-0 ps-0 py-1  border-bottom shadow-none border-2 border text-dark border-dark rounded-0 line-heigth" placeholder="000000.00">
						</div>
					</div>
					<div class="col-md-4 ">
						<div class="">
							<label class="form-label fw-bold m-0">Income By</label>
							<input type="text" name="amount" id="amount" class="form-control border-0 ps-0 py-1  border-bottom shadow-none border-2 border text-dark border-dark rounded-0 line-heigth" placeholder="">
						</div>
					</div>
					<div class="col-md-4 mt-4">
						<div class="">
							<button class="btn red-bg w-75 text-white fw-bold">Add</button>
						</div>
					</div>
				</form>
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