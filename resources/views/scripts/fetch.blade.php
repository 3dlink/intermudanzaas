<script type="text/javascript">

	setInterval(() => {
		let url = '{{ route("total") }}';

		$.get(url, (total)=>{
			$('.users_badge').attr('data-badge', total);
		});
	}, 60000*5);

</script>