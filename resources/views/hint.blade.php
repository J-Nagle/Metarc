			<div class="row my-5">
				<div class="col">
					<div class="row">
						<div class="col">
							<h3>Try these</h3>
						</div>
						<div class="col-2">
							<button type="button" data-toggle="collapse" data-target="#sample"
							class="btn btn-primary btn-sm">
								Hide
							</button>
						</div>
					</div>
					<div id="sample" class="row collapse show">
						<div class="col mb-3">
							<h4><a href="https://twitter.com/ID_AA_Carmack" target="_blank">John Carmack</a></h4>
							<button type="button" data-request="https://twitter.com/ID_AA_Carmack"
							@click="fill($event)" class="btn btn-primary btn-block preset">
								Account info
							</button>
							<button data-request="https://twitter.com/ID_AA_Carmack/status/1175451382163398656"
							@click="fill($event)" class="btn btn-primary btn-block preset">
								Sample tweet
							</button>
						</div>
						<div class="col mb-3">
							<h4><a href="https://twitter.com/surface" target="_blank">Microsoft Surface</a></h4>
							<button type="button" data-request="https://twitter.com/surface"
							@click="fill($event)" class="btn btn-primary btn-block preset">
								Account info
							</button>
							<button type="button" data-request="https://twitter.com/surface/status/1179079054420594689"
							@click="fill($event)" class="btn btn-primary btn-block preset">
								Sample tweet
							</button>
						</div>
						<div class="col mb-3">
							<h4><a href="https://twitter.com/tomshardware" target="_blank">Tom's Hardware</a></h4>
							<button type="button" data-request="https://twitter.com/tomshardware"
							@click="fill($event)" class="btn btn-primary btn-block preset">
								Account info
							</button>
							<button type="button" data-request="https://twitter.com/tomshardware/status/1177949834961195008"
							@click="fill($event)" class="btn btn-primary btn-block preset">
								Sample tweet
							</button>
						</div>
					</div>
				</div>
			</div>