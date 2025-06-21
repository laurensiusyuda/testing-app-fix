<!-- resources/views/components/app-layout.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>App</title>
</head>
<body>
    <div>
        {{ $header ?? '' }}
    </div>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
