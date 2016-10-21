</div>
      </div>

      <footer class="footer">
        <p>&copy; 2016 OppMar Dev</p>
      </footer>

    </div>
    <!-- /container -->

    <script type="text/javascript">
    $(document).ready(function() {

		$('.fa-bars').on('click', function() {
			$('#mobilemenu').fadeToggle("fast");
		});

		function setNavigation() {
			var path = window.location.href;
			var index = path.lastIndexOf("/") + 1;
			var filename = path.substr(index);

			$("nav a").each(function () {
				var href = $(this).attr('href');
				if (filename == '') {
					filename = 'index.php';
				}
				if (filename == href) {
					$(this).closest('li').addClass('active');
				}
			});
		}

		setNavigation();
    });
    </script>
  </body>

</html>