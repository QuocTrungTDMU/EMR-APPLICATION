{{-- resources/views/emails/account-activation.blade.php --}}
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kích hoạt tài khoản</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }

        .content {
            padding: 40px 30px;
        }

        .welcome {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .activation-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 20px 0;
            transition: transform 0.3s ease;
        }

        .activation-button:hover {
            transform: translateY(-2px);
        }

        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }

        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
        }

        .token-display {
            background: #e3f2fd;
            border: 1px solid #bbdefb;
            border-radius: 8px;
            padding: 15px;
            margin: 15px 0;
            text-align: center;
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            color: #1976d2;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Chào mừng đến với {{ config('app.name') }}!</h1>
        </div>

        <div class="content">
            <div class="welcome">
                Xin chào <strong>{{ $user->name }}</strong>,
            </div>

            <p>Cảm ơn bạn đã đăng ký tài khoản tại <strong>{{ config('app.name') }}</strong>! Để hoàn tất quá trình đăng ký và bắt đầu sử dụng dịch vụ, vui lòng kích hoạt tài khoản của bạn.</p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ $activationUrl }}" class="activation-button">
                    ✨ Kích hoạt tài khoản ngay
                </a>
            </div>

            <div class="info-box">
                <strong>💡 Lưu ý quan trọng:</strong>
                <ul>
                    <li>Link kích hoạt này chỉ có hiệu lực trong 24 giờ</li>
                    <li>Chỉ click vào link từ email chính thức của chúng tôi</li>
                    <li>Nếu không thể click, hãy copy link bên dưới vào trình duyệt</li>
                </ul>
            </div>

            <p><strong>Link kích hoạt:</strong></p>
            <div style="background: #f8f9fa; padding: 10px; border-radius: 4px; word-break: break-all; font-size: 14px;">
                {{ $activationUrl }}
            </div>

            <p><strong>Mã kích hoạt của bạn:</strong></p>
            <div class="token-display">
                {{ $activationToken }}
            </div>

            <p>Nếu bạn không đăng ký tài khoản này, vui lòng bỏ qua email này.</p>

            <p>Trân trọng,<br>
                Đội ngũ {{ config('app.name') }}</p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. Tất cả quyền được bảo lưu.</p>
            <p>Đây là email tự động, vui lòng không trả lời email này.</p>
        </div>
    </div>
</body>

</html>