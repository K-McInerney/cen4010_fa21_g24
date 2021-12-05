<script src="js/feed.js"></script>

<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar bg-dark sidebar-vcenter">
            <ul class="nav flex-sm-column sidebar-vcenter">
                <li class="sidebar-vcenter">
                    <input class="form-control mr-sm-2" type="text" placeholder="Filter" aria-label="Filter" name="filter" id="filter" onchange="Filter()">
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
                    <form method="post" action="index.php">
                        <div class="form-group">
                            <textarea class="form-control" name="post_title" id="title-box" rows="1" placeholder="Title"></textarea>
                            <textarea class="form-control" name="post_contents" id="text-box" rows="2" placeholder="Text"></textarea>
                        </div>

                        <?php
                        if ($user->type == 1)
                        {
                        ?>
                            <div class="form-check form-switch form-inline">
                                <input class="form-check-input mt-4" type="checkbox" role="switch" id="event_switch" aria-label="Event Post" onclick="enableEventFields()">
                                <input class="form-control" type="text" placeholder="Event ZIP" aria-label="Event ZIP" name="event_location" id="event_location" disabled>
                                <input class="form-control" type="text" placeholder="Event URL" aria-label="Event URL" name="event_link" id="event_link" disabled>
                            </div>
                        <?php } ?>
                        <input class="m-0 mt-3" type="submit" name="submit" value="Submit">

                    </form>

                    <?php
                    require 'submitpost.php';
                    require 'loadposts.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>