<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar bg-dark sidebar-vcenter">
            <ul class="nav flex-sm-column sidebar-vcenter">
                <li class="sidebar-vcenter">
                    <label for="filter"></label>
                    <input class="form-control mr-sm-2" type="text" placeholder="Filter" aria-label="Filter" name="filter" id="filter">
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
            <div class="card">
                <div class="card-header">
                    <label for="title-box" class="mb-0">
                        <label for="text-box" class="mb-0">
                            New Post
                        </label>
                    </label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <textarea class="form-control" id="title-box" rows="1" placeholder="Title"></textarea>
                        <textarea class="form-control" id="text-box" rows="2" placeholder="Text"></textarea>
                    </div>

                    <input class="m-0 mt-3" type="submit" name="submit" value="Submit">
                </div>
            </div>
        </div>
    </div>
</div>