<!DOCTYPE html>

<html lang="en">

    <?php
    // Allow page to use database functions by including the database class
    require 'db.php';

    // Include all of our stylesheets and javascript
    require 'std_head.php';
    ?>

    <body>

        <?php
        // Add navbar to top of page
        require 'std_navbar.php';

        if (!Session::LoggedIn())
        {
        ?>
        <!-- FRONTEND TEAM: Add some clip-art or something here and a few paragraphs explaining the site. -->
        <main>
            <article>
				<!-- Title -->
                <h1 class="card-header">Welcome to BackTogether!</h1>
				</br>

				<!-- Carousel -->

				<div class="carousel slide" id="myCarousel" data-bs-ride="carousel">
					<!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
					<!-- Carousel content -->
					<div class="carousel-inner bg-dark" align="center">
						<!-- Slide 1 -->
						<div class="carousel-item active">
							<img src="https://www.no-copyright.com/static/preview2/stock-photo-stock-photo-no-copyright-image-no-copyright-stock-photo-122258.jpg" alt="concert" height="500" width="900">
							<div class="carousel-caption">
								<p>
									Discover exciting new events near you
								</p>
							</div>
						</div>
						<!-- Slide 2 -->
						<div class="carousel-item">
						    <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="charity" height="500" width="900">
						    <div class="carousel-caption">
								<p>
									Become an active member in your community
								</p>
							</div>
						</div>
						<!-- Slide 3 -->
						<div class="carousel-item">
							<img src="https://images.pexels.com/photos/1023828/pexels-photo-1023828.jpeg?cs=srgb&dl=pexels-darrel-und-1023828.jpg&fm=jpg" alt="connections" height="500" width="900">
								<div class="carousel-caption">
								<p>
									Meet people in your area
								</p>
							</div>
						</div>
					</div>

					<!-- Carousel navigation buttons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
				</div>
				<!-- end of carousel -->

				</br>

				<!-- Info section -->
				<div class="card">
					<!-- Info subheading -->
					<h2 class="card-title">
						Our Purpose
					</h2>
					<!-- Information paragraph -->
					<p class="card-body wrapper">
						BackTogether is a new social media website designed to help integrate people back into society as the threat of Covid-19 eventually subsides.
						While hosts and representatives are encouraged to keep users updated on upcoming events, users are also encouraged to keep the community lively through their posts.
						With upcoming events may range from wholesome small charities to extravagant live concerts, we aim to bring as many people as possible from all aspects of the community.
						So what are you waiting for? Be a part of the community and help bring everyone back together.
					</p>
				</div>
            </article>

            <a class="button" href="register_vendor.php">Vendor Registration</a>
        </main>
        <?php
        }
        else
        {
            require 'feed.php';
        }
        ?>

    </body>
</html>