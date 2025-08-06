<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Helvetica, Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            -webkit-font-smoothing: antialiased;
        }

        .wrapper {
            padding: 40px 20px;
            background-color: #f4f4f4;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #0ea5e9, #06b6d4);
            color: #fff;
            padding: 40px 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .body {
            padding: 30px;
            font-size: 16px;
            line-height: 1.7;
            color: #4b5563;
        }

        .body .field {
            margin-bottom: 16px;
        }

        .body .label {
            font-weight: 700;
            color: #0ea5e9;
            margin-bottom: 4px;
            display: block;
        }

        .body .value {
            color: #111827;
            font-size: 14px;
        }

        .body a {
            color: #0ea5e9;
            text-decoration: none;
        }

        .body a:hover {
            text-decoration: underline;
        }

        .footer {
            background-color: #f9fafb;
            padding: 20px 30px;
            font-size: 13px;
            color: #9ca3af;
            text-align: center;
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
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="card">
            <div class="header">
                <h1>👨‍🦲 New User Join Member</h1>
            </div>
            <div class="body">
                <h2 style="color: #1f2937; font-size: 20px; margin: 0 0 20px;">
                    Hi Admin!
                </h2>
                <p style="color: #6b7280; font-size: 16px; line-height: 1.6; margin: 0 0 20px;">
                    You’ve received a new register member. Here are the details:
                </p>

                <table width="100%" cellpadding="0" cellspacing="0" style="font-size:15px; color:#333;">
                    <tr>
                        <!-- Kolom Label -->
                        <td width="30%" style="padding:4px 0; font-weight:bold; color:#0ea5e9; vertical-align:top;">
                            Name
                        </td>
                        <!-- Kolom Value -->
                        <td width="70%" style="padding:4px 0;">
                            {{ $data['name'] }}
                        </td>
                    </tr>

                    <tr>
                        <td width="30%" style="padding:4px 0; font-weight:bold; color:#0ea5e9; vertical-align:top;">
                            Email
                        </td>
                        <td width="70%" style="padding:4px 0;">
                            <a href="mailto:{{ $data['email'] }}" style="color:#0ea5e9; text-decoration:none;">
                                {{ $data['email'] }}
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <!-- Kolom Label -->
                        <td width="30%" style="padding:4px 0; font-weight:bold; color:#0ea5e9; vertical-align:top;">
                            Phone
                        </td>
                        <!-- Kolom Value -->
                        <td width="70%" style="padding:4px 0;">
                            {{ $data['phone'] }}
                        </td>
                    </tr>

                    <tr>
                        <td width="30%" style="padding:4px 0; font-weight:bold; color:#0ea5e9; vertical-align:top;">
                            KTP / SIM
                        </td>
                        <td width="70%" style="padding:4px 0;">
                            {{ $data['ktp_sim'] }}
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" style="padding:4px 0; font-weight:bold; color:#0ea5e9; vertical-align:top;">
                            Addreess
                        </td>
                        <td width="70%" style="padding:4px 0;">
                            {{ $data['address'] }}
                        </td>
                    </tr>
                </table>

                <div class="btn-container" style="margin-top: 12px; padding-top: 20px;">
                    <a href="{{ route('filament.admin.resources.members.index') }}" class="btn"
                        style="color: #fff;">Lihat Detail
                        Member</a>
                </div>
            </div>
            <div class="footer">
                Sent from {{ config('app.name') }} &bull; {{ now()->format('d M Y H:i') }}
            </div>
        </div>
    </div>
</body>

</html>
