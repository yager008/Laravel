<ul>
    {{--  выводим значени таблицы typeresults --}}
    @foreach ($type_results as $result)
        <li>{{ $result }}</li>
    @endforeach
</ul>
