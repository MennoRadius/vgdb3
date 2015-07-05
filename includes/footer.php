	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</body>
	<footer>
		<p><span> <a href="reset-database">Reset database</a>&nbsp;|
		Webdesign &amp; website by
		<a href="http://www.mennovanderkrift.com" target="_blank">Menno van der Krift</a> &copy; <?php echo date('Y'); ?>
		<?php  if(empty($_SESSION["username"])) { ?><a href="admin.php">[Login]</a></span>
		<?php }else{ ?>
		<span><a href="controllers/logout.php">[Logout]</a></span></p>

		<?php } ?>

	</footer>
</html>