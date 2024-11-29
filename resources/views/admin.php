@extends('layouts.main')

@section('content') 
<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ __('Список заявлений') }}
  </h2>
</x-slot>

<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
      <div class="cards">
        <colgroup>
          <col span="2" style="background:Khaki">
        </colgroup>
        <table>
          <tr class="text-red">
            <th>№ авто</th>
            <th>Описание</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th>Действия</th>
          </tr>
          @foreach($reports as $item)      
            <tr>
              <td>{{ $item->number }}</td>
              <td>{{ $item['description'] }}</td>
              <td>{{ $item['created_at'] }}</td>
              <td>
                @if ($item['status_id'] == 1)
                    Новое
                @elseif ($item['status_id'] == 2)
                    Отклонено
                @elseif ($item['status_id'] == 3)
                    Принято
                @else
                    Неизвестный статус
                @endif
              </td>
              <td>
                <form method="POST" action="{{ route('reports.update', $item->id) }}">
                  @csrf
                  @method('PUT')
                  <select name="status_id" class="border rounded">
                    <option value="1" {{ $item['status_id'] == 1 ? 'selected' : '' }}>Новое</option>
                    <option value="2" {{ $item['status_id'] == 2 ? 'selected' : '' }}>Отклонено</option>
                    <option value="3" {{ $item['status_id'] == 3 ? 'selected' : '' }}>Принято</option>
                  </select>
                  <button type="submit" class="text-white bg-green-600 hover:bg-green-700 rounded px-2 py-1">Обновить</button>
                </form>
              </td>
            </tr>       
          @endforeach 
        </table>
        {{ $reports->links() }}
      </div>  
      <div class="button_create">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
          создать жалобу
        </button>
      </div>  
    </div>
  </div>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Создание жалобы
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
      </div>
      <div class="p-4 md:p-5 space-y-4">
        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
              <label for="номер" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">номер авто</label>
              <input name="number" type="text" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required />
            </div>
            <div>
              <label for="описание" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">описание</label>
              <input name="description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Да" required />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Создать</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
