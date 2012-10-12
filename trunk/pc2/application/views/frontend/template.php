<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<?php $this->load->view('frontend/includes/head_includes'); ?>
        <!-- COD ANALYTICS! -->
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-12629051-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <!-- COD ANALYTICS! -->
	</head>

	<body>
		<!-- Header -->
		<?php $this->load->view('frontend/includes/header'); ?>

		<!-- Content -->
		<?php $this->load->view($main_content); ?>
        <?php //$this->load->view('frontend/includes/right_side'); ?>

		<!-- Footer -->
		<?php $this->load->view('frontend/includes/footer'); ?>

        </div>
    </div>
    </body>
    </html>
