{{-- resources/views/emails/contact.blade.php - COMPLETELY SAFE --}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin nhắn liên hệ mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }

        .header-nks {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .header-authenticated {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .header-guest {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .status-nks {
            background: #d1fae5;
            color: #065f46;
        }

        .status-authenticated {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-guest {
            background: #e0e7ff;
            color: #3730a3;
        }

        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
            border: 1px solid #e9ecef;
        }

        .info-row {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
        }

        .border-nks {
            border-left: 4px solid #059669;
        }

        .border-authenticated {
            border-left: 4px solid #3b82f6;
        }

        .border-guest {
            border-left: 4px solid #667eea;
        }

        .label {
            font-weight: bold;
            color: #495057;
            display: inline-block;
            width: 140px;
        }

        .message-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>

<body>
    {{-- ✅ SAFE VARIABLE CHECKS với isset() và ?? operators --}}
    @php
    $hasNksData = $hasNksData ?? false;
    $isAuthenticated = $isAuthenticated ?? false;
    $name = $name ?? 'Unknown';
    $email = $email ?? 'unknown@email.com';
    $phone = $phone ?? 'Không cung cấp';
    $subject = $subject ?? 'No subject';
    $messageContent = $messageContent ?? $message ?? 'No message';
    $submittedAt = $submittedAt ?? now()->format('d/m/Y H:i:s');
    $userId = $userId ?? null;
    $nksUserId = $nksUserId ?? $nksId ?? null;
    $nksUsername = $nksUsername ?? null;
    @endphp

    <!-- ✅ SAFE HEADER CLASS ASSIGNMENT -->
    <div class="header {{ $hasNksData ? 'header-nks' : ($isAuthenticated ? 'header-authenticated' : 'header-guest') }}">
        <h1>
            @if($hasNksData)
            🔐 Tin nhắn từ NKS User
            @elseif($isAuthenticated)
            👤 Tin nhắn từ Local User
            @else
            📧 Tin nhắn từ Guest
            @endif
        </h1>
        <p>Từ website Medik</p>

        <div class="status-badge {{ $hasNksData ? 'status-nks' : ($isAuthenticated ? 'status-authenticated' : 'status-guest') }}">
            @if($hasNksData)
            ✅ NKS AUTHENTICATED USER
            @elseif($isAuthenticated)
            👤 LOCAL AUTHENTICATED USER
            @else
            👤 GUEST USER
            @endif
        </div>
    </div>

    <div class="content">
        <h2>Thông tin người gửi:</h2>

        @php
        $borderClass = $hasNksData ? 'border-nks' : ($isAuthenticated ? 'border-authenticated' : 'border-guest');
        @endphp

        <div class="info-row {{ $borderClass }}">
            <span class="label">👤 Họ tên:</span>
            {{ $name }}
        </div>

        <div class="info-row {{ $borderClass }}">
            <span class="label">📧 Email:</span>
            <a href="mailto:{{ $email }}">{{ $email }}</a>
        </div>

        <div class="info-row {{ $borderClass }}">
            <span class="label">📱 Điện thoại:</span>
            {{ $phone }}
        </div>

        <div class="info-row {{ $borderClass }}">
            <span class="label">📋 Chủ đề:</span>
            {{ $subject }}
        </div>

        <div class="info-row {{ $borderClass }}">
            <span class="label">⏰ Thời gian:</span>
            {{ $submittedAt }}
        </div>

        {{-- ✅ SAFE CONDITIONAL SECTIONS --}}
        @if($isAuthenticated && $userId)
        <div class="info-row {{ $borderClass }}">
            <span class="label">🆔 Local User ID:</span>
            #{{ $userId }}
        </div>
        @endif

        @if($hasNksData && $nksUserId)
        <div class="info-row border-nks">
            <span class="label">🔐 NKS User ID:</span>
            #{{ $nksUserId }}
        </div>
        @endif

        @if($hasNksData && $nksUsername)
        <div class="info-row border-nks">
            <span class="label">👤 NKS Username:</span>
            {{ $nksUsername }}
        </div>
        @endif

        <div class="message-content">
            <h3>💬 Nội dung tin nhắn:</h3>
            <p>{{ $messageContent }}</p>
        </div>
    </div>

    <div class="footer">
        <p>Email này được gửi tự động từ hệ thống liên hệ của Medik.</p>
        @if($hasNksData)
        <p><strong>Lưu ý:</strong> Đây là tin nhắn từ người dùng đã xác thực qua NKS API.</p>
        @elseif($isAuthenticated)
        <p><strong>Lưu ý:</strong> Đây là tin nhắn từ người dùng đã đăng nhập local.</p>
        @endif
    </div>
</body>

</html>