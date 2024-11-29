@extends('layouts.main')
@section('content')
<form method="POST" action="{{route('report.update',$report->id)}}">
    @csrf
    @method('put')
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <p>номер</p>
            <label  for="номер" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">номер автомобиля</label>
            <input name="number" type="number" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" />
        </div>
        <div>
            <p>описание</p>
            <label  for="описание" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">описание автомобиля</label>
            <input name="description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Да"  />
        </div>
    <button  type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Обновить</button>
</form>
<div>
    <p>дата создания: {{$report->created_at}}</p>
    <p>дата обновления: {{$report->updated_at}}</p>
</div>
@endsection()