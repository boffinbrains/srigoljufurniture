@if (Session::has('status'))
    <script>
        var value = "{{ Session::get('status') }}";
        Snackbar.show({
            pos: 'bottom-center',
            backgroundColor: '#000',
            textColor: '#fff',
            actionTextColor: '#fff',
            actionText: '<i class="bi bi-x-lg"></i>',
            text: value
        });
    </script>
@endif
@if ($errors->any())
    <script>
        let array = @json($errors->all());
        let message = '';
        if (array.length) {
            array.map((value) => {
                message += `
                    <li>
                        ${value}
                    </li>
                `;
            })
        }
        Snackbar.show({
            pos: 'bottom-center',
            backgroundColor: '#d12626',
            textColor: '#fff',
            actionTextColor: '#fff',
            actionText: '<i class="bi bi-x-lg"></i>',
            text: `<ul class="list-unstyled m-0">${message}</ul>`
        });
    </script>
@endif
