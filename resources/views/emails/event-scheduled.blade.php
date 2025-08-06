<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $event->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Helvetica, Arial, sans-serif;
            background: #f4f4f4;
        }

        .wrapper {
            background: #f4f4f4;
            padding: 40px 20px;
        }

        .card {
            max-width: 720px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .1);

        }

        .header {
            background: linear-gradient(135deg, #0ea5e9, #06b6d4);
            padding: 30px;
            text-align: center;
            color: #fff;
        }

        .header img {
            height: 40px;
            margin-bottom: 10px;
            border-radius: 12px;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: .5px;
        }

        .hero {
            width: 100%;
            height: 240px;
            object-fit: cover;
            display: block;
        }

        .body {
            padding: 30px;
            color: #333;
            line-height: 1.6;
            background: #ffffff;
        }

        .subtitle {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .content {
            font-size: 15px;
            color: #444;
            margin-bottom: 30px;
        }

        .btn-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 14px 28px;
            background: #0ea5e9;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }

        .footer {
            background: #f9fafb;
            padding: 30px 20px;
            text-align: center;
            font-size: 13px;
            color: #777;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="card">
            <!-- Header -->
            <div class="header">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <h1 style="text-align: center;">🎉 Event Baru!</h1>
            </div>

            <!-- Hero Image -->
            <img src="{{ Storage::url($event->image) }}" alt="Flyer Event" class="hero">

            <!-- Body -->
            <div class="body" style="background: #fff; padding: 30px;">
                <h2 style="font-size: 22px; margin: 0 0 8px;">{{ $event->title }}</h2>
                <p class="subtitle">
                    📍 {{ $event->location }}<br>
                    📅 {{ \Carbon\Carbon::parse($event->start_date)->format('l, d F Y • H:i') }}
                </p>

                <div class="content">
                    {!! Str::limit($event->description, 180) !!}
                </div>

                <div class="btn-container" style="margin-top: 12px; padding-top: 20px;">
                    <a href="{{ route('event.schedule.show', $event->slug) }}" class="btn">Lihat Detail Event</a>
                </div>
            </div>

            <!-- Footer -->
            <div style="border-top: 1px solid #e5e7eb; padding-top: 20px; padding-bottom: 20px; text-align: center;">
                <p style="color: #9ca3af; font-size: 12px; margin: 0; text-align: center;">
                    Dikirim oleh Voxy Club Indonesia<br>
                    {{ now()->format('d M Y H:i') }}
                </p>
            </div>
        </div>
    </div>
</body>

</html>
