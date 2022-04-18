<div class="body-header border-0 rounded-0 px-xl-4 px-md-2">
    <div class="container-fluid">
        <div class="row pt-2">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center py-2">
                    <ol class="breadcrumb rounded-0 mb-0 ps-0 bg-transparent flex-grow-1">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lead Status</li>
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
                <div class="col-md-12 p-0">
                    <nav class="navbar red-bg text-center text-white rounded py-2 mb-3">
                        <div class="container-fluid">
                            <!-- <h1 class="fw-bolder">Lead Status</h1> -->
                            <form class="d-flex">
                                <div class="input-group">
                                    <form class="d-flex">
                                        <input class="form-control text-white me-2" type="search"
                                            placeholder="Search" aria-label="Search">
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
                <section class="timeline">
                    <ul>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-danger">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-success">2/21/2022</span></time> Proin
                                molestie. Aenean ex augue,
                                varius et
                                pulvinar in, pretium non nisi.
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-warning">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-danger">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-success">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-warning">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-danger">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-success">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-warning">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-danger">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-success">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                        <li>
                            <div class="card">
                                <time><span class="badge bg-warning">2/21/2022</span></time> At vero eos
                                et accusamus ducimus qui
                                blanditiis
                                praesentium
                            </div>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
</div>



<script>
    (function() {
        "use strict";
        var items = document.querySelectorAll(".timeline li");

        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <=
                (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function callbackFunc() {
            for (var i = 0; i < items.length; i++) {
                if (isElementInViewport(items[i])) {
                    items[i].classList.add("in-view");
                }
            }
        }

        window.addEventListener("load", callbackFunc);
        window.addEventListener("resize", callbackFunc);
        window.addEventListener("scroll", callbackFunc);
    })();

    ///search-box//
    const basicAutocomplete = document.querySelector('#search-autocomplete');
    const data = ['One', 'Two', 'Three', 'Four', 'Five'];
    const dataFilter = (value) => {
        return data.filter((item) => {
            return item.toLowerCase().startsWith(value.toLowerCase());
        });
    };

    new mdb.Autocomplete(basicAutocomplete, {
        filter: dataFilter
    });
</script>
   