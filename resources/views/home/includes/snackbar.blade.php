@if (Session::has('status'))
    <script>
        Snackbar.show({
            pos: 'top-center',
            backgroundColor: '#808080',
            textColor: '#fff',
            actionTextColor: '#fff',
            actionText: '<i class="bi bi-x-lg"></i>',
            text: @json(session()->get('status'))
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
            pos: 'top-center',
            backgroundColor: '#d12626',
            textColor: '#fff',
            actionTextColor: '#fff',
            actionText: '<i class="bi bi-x-lg"></i>',
            text: `<ul class="list-unstyled m-0">${message}</ul>`
        });
    </script>
@endif
