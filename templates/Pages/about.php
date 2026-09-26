<body id="about-page">
    <div class="inner-banner">
        <div class="container-fluid p-0">
            <div class="inner-pic">
                <img src="/assets/images/inner-banner-one.jpg" alt="pic">
            </div>
            <div class="inner-content">
                <div class="head">
                    <h1>About Us</h1>
                </div>
                <div class="bridcrum">
                    <span class="hgrl"><a href="/">Home</a></span> | <span class="hjul">About Us</span>
                </div>
            </div>
        </div>
    </div>
    <div class="about-info">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="ableft">
                        <div class="abpic"><img src="../../upload/homepageimage/<?= $about->photo ?>" alt="#"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="abinfo">
                        <span class="absub">About Us</span>
                        <h2><?= $about->name?></h2>
                        <div class="abtext">
                            <p><?= $about->details?></p>
                        </div>
                        <div class="abbutton"><a href="/pages/contact">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-sec">
        <div class="container">
            <div class="head">
                <h2>Subscribe News Letters</h2>
                <p>Stay updated with our latest collections, offers, and exclusive deals. Subscribe to our newsletter today!</p>
            </div>
            <div class="subbtn">
                <div class="col-md-7">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Your Mail Id" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>