<!-- resources/views/emails/custom-reset-password.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 40px 40px 20px; text-align: center;">
                            <h1 style="color: white; font-size: 28px; margin: 0; font-weight: bold;">
                                🔧 Car Community
                            </h1>
                            <p style="color: #e0e7ff; font-size: 16px; margin: 10px 0 0;">
                                Password Reset Request
                            </p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="background: white; padding: 40px;">
                            <h2 style="color: #1f2937; font-size: 20px; margin: 0 0 20px;">
                                Hi there!
                            </h2>
                            <p style="color: #6b7280; font-size: 16px; line-height: 1.6; margin: 0 0 20px;">
                                We received a request to reset your password for your Car Community account.
                                Click the button below to create a new password:
                            </p>

                            <!-- CTA Button -->
                            <div style="text-align: center; margin: 30px 0;">
                                <a href="{{ route('auth.password.reset', ['token' => $token, 'email' => $email]) }}"
                                    style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; padding: 15px 30px; border-radius: 50px; font-weight: bold; font-size: 16px; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                                    Reset My Password
                                </a>
                            </div>

                            <p style="color: #6b7280; font-size: 14px; line-height: 1.6; margin: 20px 0;">
                                This link will expire in 60 minutes. If you didn't request this, you can safely ignore
                                this email.
                            </p>

                            <div style="border-top: 1px solid #e5e7eb; margin: 30px 0; padding-top: 20px;">
                                <p style="color: #9ca3af; font-size: 12px; margin: 0;">
                                    Car Community Team<br>
                                    This is an automated email, please don't reply.
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
