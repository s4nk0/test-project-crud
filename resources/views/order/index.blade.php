<x-app-layout>
    <x-slot name="header">
        {{ __('Заказы') }}
    </x-slot>

    <x-datatable-slots :tables="['orders_table']" />

    <div class="row mb-3">
        <div class="col">
            <a href="{{route('order.create')}}" class="btn btn-primary">
                {{ __("Создать") }}
            </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <table id="orders_table">
                <thead>
                <tr>
                    <th>Дата</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>адрес</th>
                    <th>Товары(кол-во)</th>
                    <th>Сумма заказа</th>
                    <th>Удалить</th>
                    <th>Ред.</th>
                    <th>Показать.</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->date}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->coords}}</td>
                    <td>{{$order->products_count()}}</td>
                    <td>{{$order->sum}}</td>
                    <th>
                        <form method="post" action="{{route('order.destroy',['order'=>$order])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">Удалить</button>
                        </form>
                    </th>
                    <th><a href="{{route('order.edit',['order'=>$order])}}">Редактировать.</a></th>
                    <th><a href="{{route('order.show',['order'=>$order])}}">Показать.</a></th>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
