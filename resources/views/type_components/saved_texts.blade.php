<ul>
    {{--  выводим значени таблицы saved_texts --}}
    @foreach ($saved_texts as $result)
        <li>{{ $result }}</li>
    <form method="POST">
        @csrf
        <button name="saved_text_btn_{{ $result['id'] }}" id="saved_text_btn_{{ $result['id'] }}" value="{{ $result['text'] }}" >{{ $result['text_name'] }}</button>
        <?php
            if (isset($_POST["saved_text_btn_{$result['id']}"]))
            {
                ?>
            <script>
                InButtonText = document.getElementById('saved_text_btn_{{ $result['id'] }}').value;
                document.getElementById('inputTextBox').value = InButtonText;
            </script>

        <?php
            }
        ?>
    </form>

    @endforeach
</ul>
