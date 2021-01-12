@extends('layouts.vacation')

@section('content')
	<form action="{{ route('vacations.store') }}" method="post">
		@csrf

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4 class="text-center my-4">Создание отпуска</h4>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="start">Начало отпуска</label>
						<input class="form-control" id="start" type="date" name="start" value="{{ old('start') }}" required>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label for="finish">Окончание отпуска</label>
						<input class="form-control" id="finish" type="date" name="finish" value="{{ old('finish') }}" required>
					</div>
				</div>

				<div class="col-12">
					<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save"></i> Создать</button>
					<a class="btn btn-sm btn-secondary" href="{{ route('vacations.index') }}"><i class="fa fa-arrow-left"></i> Список отпусков</a>
				</div>
			</div>
		</div>		
	</form>
@endsection