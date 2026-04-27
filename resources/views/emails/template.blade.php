<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailSubject }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e2e8f0; border-radius: 8px;">
        <h2 style="color: #4f46e5; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">{{ $mailSubject }}</h2>
        <div style="margin-top: 20px; white-space: pre-line;">
            {{ $mailMessage }}
        </div>
        <p style="margin-top: 30px; font-size: 0.9em; color: #64748b;">
            Cordialement,<br>
            L'équipe du Cabinet Médical
        </p>
    </div>
</body>
</html>
