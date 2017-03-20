<script type="text/javascript">
	$(document).ready(()=>{
		setInterval(() => {
			let url = '{{ route("total") }}';

			$.get(url, (total)=>{
				$('.users_badge').attr('data-badge', total);
			});
		}, 60000*5);
	});
</script>