<?php include('template/core/header.php'); ?>

    <?php
      if ( $_POST["submit"] == true ) {
          $recipient="rommel.fsantiago@gmail.com";
          $subject="Thank you, your message has been sent.";
          $sender= $_POST["sender"];
          $senderEmail= $_POST["email"];
          $message= $_POST["message"];

          $mailBody="Name: $sender\n
          Email: $senderEmail\n\n$message";

          mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

      }


    ?>



<!--This is your header image-->
  <div id="poi-hero" style="background-image: url('images/business.jpg')">
    <a href="#poi-main" class="smoothscroll animated bounce io-arrow"><i class="ti-angle-down"></i></a>
    <div class="overlay"></div>
    <div class="container">
      <div class="col-md-4 ">
        <div class="text">
          <h2><strong>Manage</strong> your business, budget, create advertising campaigns, set bill reminders,
            <strong>all in one place</strong> </h2>

        </div>
      </div>
    </div>
  </div>

  <main role="main" id="poi-main">
  <section class="slider">
    <!-- Start Slider -->
    <!-- Start Slider Testimonial -->
    <div class="io-spacer io-spacer-lg"></div>
    <h2 class="io-uppercase-heading-sm text-center">Check out whats new to our
    market POI every week!</h2>
    <div class="io-spacer io-spacer-lg"></div>
      <div class="owl-carousel-fullwidth">
        <div class="item">
          <h2 class="text-center quote"><a href="../template/undercover_ad.php">Undercover Marketing</a></h2>
          <p class="text-center quote"> Also known as buzz marketing or word-of-mouth marketing</p>
        </div>
        <div class="item">
          <h2 class="text-center quote"><a href="../template/wild_posting_advertising.php">WildPosting Advertising</a></h2>
          <p class="text-center quote">Wild posting advertising involves a rather inexpensive form of marketing your business,
            which can garner massive outreach</p>
        </div>
        <div class="item">
          <h2 class="text-center quote"><a href="../template/pay_click_advertising.php">Pay-Per-Click Advertising</a></h2>
          <p class="text-center quote"> Pay-per-click (PPC) advertising, also known as cost-per-click (CPC) advertising,
            describes the process of increasing your online presence through the use of paid advertisements on search engines</p>
        </div>
        <div class="item">
          <h2 class="text-center quote"><a href="../template/articles/optimize.php">The Importance Of An Optimized Website</a></h2>
          <p class="text-center quote"> In today’s business world, it takes more than just an established
            presence in the real world to promote your brand.</p>
        </div>
        <div class="item">
          <h2 class="text-center quote"><a href="../template/tissue_paper_advertising.php">Tissue Paper Advertising</a></h2>
          <p class="text-center quote"> Tissue-pack marketing, an advertising phenomenon that originates from Japan,
             is method of marketing that utilizes cheap, useful objects</p>
        </div>

      </div>
      <!-- End Owl -->
    <div class="io-spacer io-spacer-lg"></div>

      <!-- End Slider -->
  </section>


    <section class="feature">
      <div class="io-spacer io-spacer-lg"></div>

      <div class="container">

        <div class="row">
          <div class="col-md-4">
            <div class="feature-item">
              <div class="feature-icon"><i class="fa fa-usd"></i></div>
              <div class="feature-text">
                <h3><a href="../template/signup/LogOn2.php">My Business Budget</a></h3>
                <p>Create advertising budgets for your business
                  that you can easily stick to.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-item">
              <div class="feature-icon"><i class="fa fa-files-o"></i></div>
              <div class="feature-text">
                <h3><a href="../template/articles/articles.php">Advertising Campaigns</a></h3>
                <p>Learn how to create to your advertising campaigns
                  by reading these step-by step guides</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-item">
              <div class="feature-icon"><i class="fa fa-comments-o"></i></div>
              <div class="feature-text">
                <h3><a href="../template/signup/forum.php">The Forum</a></h3>
                <p>Interact with other fellow entrepreneurs. You may even find your next business partner.</p>
              </div>
            </div>
          </div>
        </div>
      </div>


    </section>
    <!-- END .feature -->
<section class="body_feature">
  <div class="row">
    <div class="col-md-12">
      <div class="container">
        <!-- Start Center Tabs -->
        <div id="io-tab-feature-center" class="io-tab text-center">
          <ul class="resp-tabs-list hor_1">
            <li><i class="io-tab-menu-icon fa fa-book"></i>Manage Bills</li>
            <li><i class="io-tab-menu-icon fa fa-building-o"></i>Business Checking</li>
            <li><i class="io-tab-menu-icon fa fa-users"></i> Create Campaigns</li>
            <li><i class="io-tab-menu-icon fa fa-compress"></i> Contact Us</li>

          </ul>
          <div class="resp-tabs-container hor_1">
            <div>
              <div class="row">
                <div class="col-md-12">
                  <h2 class="h3">Never Forget Your Bills Again</h2>
                </div>
                <div class="col-md-6">
                  <p>Keep track and stay organized by setting reminders for your business bills.
                    By signing up, you will get daily reminders until it is paid.</p>
                    <a href="../template/signup/billreminder.php">Manage Bills</a>
                </div>
                <div class="border-xs col-md-6">
                  <img src="images/reminders.png" width="90%" alt="reminders" />
                </div>
              </div>
            </div>

            <div>
              <div class="row">
                <div class="col-md-12">
                  <h2 class="h3">Set up your business bank account today.</h2>
                </div>
                <div class="col-md-6">
                  <p>
                    Take one the first steps in making your small business official by
                    comparing these top banks and choosing the one best suited for
                    your business needs. Set up your account today for as little as $25!
                  </p>
                  <a href="template/signup/business_checking_account.php">Learn More! </a>
                </div>
                <div class="border-xs col-md-6">
                  <img src="images/face1.jpg" width="90%" alt="reminders" />
                </div>
              </div>
            </div>

            <div>
              <div class="row">
                <div class="col-md-12">
                  <h2 class="h3">Write your own ad campaign guide.</h2>
                </div>
                <div class="col-md-6">
                  <p>
                    Create your own advertising campaign using the guide we've
                    provided. Just fill in your business information and follow
                    the template as shown.
                  </p>
                  <a href="template/signup/LogOn_Campaign.php">Create Campaign</a>
                </div>
                <div class="border-xs col-md-6">
                  <img src="images/realface2.jpg" width="90%" alt="reminders" />
                </div>
              </div>
            </div>

            <div>
              <div class="row">
                <div class="col-md-12">
                  <h2 class="h3">marketPOI Support</h2>
                </div>
                <div class="col-md-6">
                  <p>
                    Any questions you may have, whether about your business
                    goals or marketPOI, can be answered by our support team.
                  </p>
                  <a href="template/support.php">Contact Us</a>
                </div>
                <div class="border-xs col-md-6">
                  <img src="images/realface3.jpg" width="90%" alt="reminders" />
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- End Center Tabs -->
      </div>
    </div>
  </div>
</section>

  </main>

  <script>
  // Code injected by live-server
  (function() {
    function refreshCSS() {
      var sheets = [].slice.call(document.getElementsByTagName("link"));
      var head = document.getElementsByTagName("head")[0];
      for (var i = 0; i < sheets.length; ++i) {
        var elem = sheets[i];
        head.removeChild(elem);
        var rel = elem.rel;
        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
          var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
          elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
        }
        head.appendChild(elem);
      }
    }
    var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
    var address = protocol + window.location.host + window.location.pathname + '/ws';
    var socket = new WebSocket(address);
    socket.onmessage = function(msg) {
      if (msg.data == 'reload') window.location.reload()
      else if (msg.data == 'refreshcss') refreshCSS();
    };
    console.log('Live reload enabled.');
  })();
  </script>
<?php include('template/core/footer.php'); ?>
