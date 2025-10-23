<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '5 Pesos Team')</title>

    <!-- Tailwind CSS -->
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

    <!-- Fuente global -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-steel-gray text-carbon font-sans min-h-screen">

    <!-- Contenido de la página -->
    @yield('content')

    <!-- Scripts opcionales -->
    @stack('scripts')
</body>
</html>
