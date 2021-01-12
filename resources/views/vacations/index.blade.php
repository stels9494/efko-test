@extends('layouts.vacation')

@section('title')
	Список отпусков
@endsection

@section('content')
{{-- если работник - список моих отпусков --}}
	
<div class="container">

	@role('employer')
		<div class="row">
			<div class="col-12">
				<h4 class="my-4 text-center">График моих отпусков</h4>
			</div>
			<div class="col-12 text-center mb-4">
				<a class="btn btn-sm btn-success" href="{{ route('vacations.create') }}"><i class="fa fa-plus"></i></a>
			</div>
			<div class="col-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th class="text-center" scope="col">Дата начала</th>
							<th class="text-center" scope="col">Дата окончания</th>
							<th class="text-center" scope="col">Утверждено</th>
							<th scope="col">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data['my_vacations'] as $i => $vacation)
							<tr>
								<td>{{ $i + 1 }}</td>
								<td class="text-center">{{ $vacation->start->format('d.m.Y') }}</td>
								<td class="text-center">{{ $vacation->finish->format('d.m.Y') }}</td>
								<td class="text-center">{{ $vacation->fix ? 'Да' : 'Нет' }}</td>
								<td class="text-right">
									@if (!$vacation->fix)
										<a href="{{ route('vacations.edit', $vacation) }}" class="btn btn-sm btn-primary" type="button"><i class="fa fa-edit"></i></a>
										<form class="d-inline-block" action="{{ route('vacations.destroy', $vacation) }}" method="post">
											@csrf
											@method('delete')
											<button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
										</form>
									@endif
								</td>
							</tr>
						@endforeach

						@if (!$data['my_vacations']->count())
							<tr>
								<td colspan="6" class="text-center">
									<span class="h6 ">Отпусков нет</span>
								</td>
							</tr>
						@endif
					</tbody>
				</table>	
			</div>
		</div>
	@endrole

		<div class="row">
			<div class="col-12">
				<h4 class="my-4 text-center">Общий график отпусков</h4>
			</div>
			<div class="col-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th class="text-center" scope="col">ФИО</th>
							<th class="text-center" scope="col">Дата начала</th>
							<th class="text-center" scope="col">Дата окончания</th>
							<th class="text-center" scope="col">Утверждено</th>
							@role('leader')
								<th scope="col">&nbsp;</th>
							@endrole
						</tr>
					</thead>
					<tbody>
						@foreach ($data['vacations'] as $vacation)
							<tr>
								<td>{{ $vacation->id }}</td>
								<td class="text-center">{{ $vacation->user->name }}</td>
								<td class="text-center">{{ $vacation->start->format('d.m.Y') }}</td>
								<td class="text-center">{{ $vacation->finish->format('d.m.Y') }}</td>
								<td class="text-center">{{ $vacation->fix ? 'Да' : 'Нет' }}</td>
								@role('leader')
									<td class="text-right">
										@if(!$vacation->fix)
										<form class="d-inline-block" action="{{ route('vacations.fix-vacation', $vacation) }}" method="post">
											@csrf
											<button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>
										</form>
										@endif
									</td>
								@endrole
							</tr>
						@endforeach

						@if (!$data['vacations']->count())
							<tr>
								<td colspan="6" class="text-center">
									<span class="h6 ">Отпусков нет</span>
								</td>
							</tr>
						@endif
					</tbody>
				</table>	
			</div>
		</div>
</div>


@endsection






