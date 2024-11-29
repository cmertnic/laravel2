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
          <tr  style="background-color: rgb(54, 6, 228);color: rgb(255, 255, 255);"> 
            <th>Дата создания</th>
            <th>№ авто</th>
            <th>Описание</th>
            <th>ФИО автора</th>
            <th>Статус</th>
          </tr>
          @foreach($reports as $item)      
            <tr id="applicationContainer"> 
              <td>{{ $item['created_at'] }}</td>
              <td>{{ $item->number }}</td>
              <td>{{ $item['description'] }}</td>   
              <td>{{ Auth::user()->fullname() }}</td> 
              <td>
                <form method="POST" action="{{ route('reports.update', $item->id) }}" class="status-form" id="form-{{ $item->id }}">
                  @csrf
                  @method('PUT')
                  <div style="padding: 10px;">
                      <div>
                          <select id="statusSelect" name="status_id" style="background-color: white; color: black;" onchange="updateStatus(this); document.getElementById('form-{{ $item->id }}').submit();">
                              <option style="color: black;" value="1" {{ $item['status_id'] == 1 ? 'selected' : '' }}>Новое</option>
                              <option style="color: rgb(250, 0, 0);" value="2" {{ $item['status_id'] == 2 ? 'selected' : '' }}>Отклонено</option>
                              <option style="color: rgb(15, 18, 221);" value="3" {{ $item['status_id'] == 3 ? 'selected' : '' }}>подтверждено</option>
                          </select>
                      </div>
                  </div>
              </form>
              
              <script>
              function updateStatus(selectElement) {
                  const selectedValue = selectElement.value;
                  const applicationContainer = document.getElementById('applicationContainer');
              
                  let textColor;
                  let backgroundColor;
                  switch (selectedValue) {
                      case '1':
                          textColor = 'black'; 
                          break;
                      case '2':
                          textColor = 'red'; 
                          backgroundColor = 'rgb(250, 0, 0)'; // Фон для "Не одобрено"
                          break;
                      case '3':
                          textColor = 'blue'; 
                          break;
                      default:
                          textColor = 'black';
                  }
              
                  selectElement.style.color = textColor;
                  applicationContainer.style.backgroundColor = backgroundColor;
              }
              
              // Устанавливаем цвет текста и фон при загрузке страницы
              window.onload = function() {
                  const selectElement = document.getElementById('statusSelect');
                  updateStatus(selectElement);  // Установим начальное состояние
              }
              </script>
                                   
                </form>
              </td>
            </tr>       
          @endforeach 
        </table>
        {{ $reports->links() }}
      </div>  
    </div>
  </div>
</div>

@endsection

