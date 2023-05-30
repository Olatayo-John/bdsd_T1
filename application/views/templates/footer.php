</div>


<script type="text/javascript">

	function clearAlert() {
		$(".alertWrapper").hide();
		$(".alertWrapper strong").empty();
	}

	$(document).on("click", ".alertWrapper", function() {
		clearAlert();
	});

	$(document).ready(function() {
		setTimeout(() => document.querySelector('.alerterror').remove(), 6000);
		setTimeout(() => document.querySelector('.alertsuccess').remove(), 6000);
	})


</script>
</body>

</html>