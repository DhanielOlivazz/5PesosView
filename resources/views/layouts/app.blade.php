<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '5 Pesos Team')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'carbon': '#0D0D0D',
                        'off-white': '#E0E0E0',
                        'blood-red': '#B71C1C',
                        'steel-gray': '#424242',
                        'vivid-red': '#EF233C',
                        'petrol-blue': '#1B4965'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-steel-gray text-off-white">
    @yield('content')
</body>
</html>