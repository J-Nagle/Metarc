<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Metarc - A Twitter metadata viewer</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10"></script>
		<script src="https://unpkg.com/vue-router@3.1.3/dist/vue-router.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Coda&display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,400&display=swap">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata&display=swap">

		<link rel="stylesheet" href="css/design.css">
	</head>
	<body>
		<h1 class="display-1 mt-4">Metarc</h1>
		<h2 class="mb-4">A Twitter metadata viewer</h2>
		<main class="container">
			@includeWhen($hint,"hint")
			<div class="row my-5">
				<div class="col">
					<form>
						<div class="form-group">
							<label for="source" class="h3">Enter a Twitter account or tweet URL</label>
							<input id="source" name="source" v-model="source" type="url" required
							placeholder="https://twitter.com/TeamYouTube/status/1176645711691010048" 
							class="form-control form-control-lg">
						</div>
						<button type="submit" @click.prevent="get" class="btn btn-primary btn-lg btn-block">Request</button>
					</form>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col">
					<h3>Data</h3>
				</div>
			</div>
			<div class="row mb-5">
				<div id="data" class="col">@{{ api }}</div>
			</div>
		</main>
		<script>
			const router = new VueRouter({routes})

			const Metarc = new Vue({
				router,
				el: "main",
				data: {
					toggle:		"Hide",
					source: 	"{{ $url }}",
					api:		{{ $json }}
				},
				methods: {
					flip: function(){
						this.toggle = "Show";
					},
					fill: function(event){
						var element = event.currentTarget;
						this.source = element.getAttribute("data-request");
						this.get();
					},
					get: function(){
						var clean = encodeURIComponent(this.source.split(".com").pop());
						this.$router.push(clean);
						axios.get(clean + "?return=update").then(function(response){
							this.api = response;
							if("user" in response){
								var sent = clean.split('/')[0];
								if(response.user.screen_name != sent){
									var real = '/' + response.user.screen_name + "/status/" + clean.split('/').pop();
									this.$router.push(real);
									this.source = "https://twitter.com" + real;
								}
							}
						});
					}
				}
			})
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"></script>
	</body>
</html>