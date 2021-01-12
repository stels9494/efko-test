@extends('layouts.vacation')

@section('content')
	<form action="{{ route('vacations.update', $data['vacation']) }}" method="post">
		@csrf
		@method('patch')

		<div class="container">
			<div class="row">
				<div class="col-12">
					<h4 class="text-center my-4">Редактирование рамок отпуска</h4>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="start">Начало отпуска</label>
						<input class="form-control" id="start" type="date" name="start" value="{{ $data['vacation']->start->format('Y-m-d') }}" required>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label for="finish">Окончание отпуска</label>
						<input class="form-control" id="finish" type="date" name="finish" value="{{ $data['vacation']->finish->format('Y-m-d') }}" required>
					</div>
				</div>

				<div class="col-12">
					<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save"></i> Сохранить</button>
					<a class="btn btn-sm btn-secondary" href="{{ route('vacations.index') }}"><i class="fa fa-arrow-left"></i> Список отпусков</a>
				</div>
			</div>
		</div>		
	</form>
@endsection