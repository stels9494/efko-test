<div class="container">
	<div class="row">
		<div class="col-12 text-right">
			<span>{{ auth()->user()->name }}</span>
			<form class="d-inline-block" action="{{ route('logout') }}" method="post">
				@csrf
				<button class="btn btn-default" type="submit"><i class="fa fa-sign-out"></i></button>
			</form>
		</div>
	</div>
</div>