@php use Illuminate\Support\Str; @endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Kata Sandi - Idarma</title>
</head>
<body style="font-family: sans-serif; background-color: #f4f4f4; padding: 30px;">
    <table width="100%" style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px;">
        <tr>
            <td align="center" style="padding-bottom: 20px;">
                <h2 style="margin: 10px 0 0; font-size: 20px;">Idarma Digital Technology</h2>
            </td>
        </tr>

        <tr>
            <td>
                <p>Halo, {{ $user->name }}</p>
                <p>Kami menerima permintaan untuk mengatur ulang kata sandi akun Anda di platform <strong>Idarma Digital Technology</strong>.</p>
                <p>Silakan klik tombol di bawah ini untuk mengatur ulang kata sandi Anda:</p>

                <div style="text-align: center; margin: 30px 0;">
                    <a href="{{ $url }}"
                       style="background-color: #4f46e5; color: white; padding: 12px 24px; text-decoration: none; border-radius: 5px;">
                        Atur Ulang Kata Sandi
                    </a>
                </div>

                <p>Tautan reset ini hanya berlaku dalam waktu tertentu demi keamanan akun Anda.</p>
                <p>Jika Anda tidak pernah meminta pengaturan ulang, abaikan email ini. Tidak ada tindakan lebih lanjut yang diperlukan.</p>

                <p style="margin-top: 40px;">Salam hangat,<br><strong>Tim Idarma</strong></p>
            </td>
        </tr>

        <tr>
            <td style="border-top: 1px solid #ddd; padding-top: 20px; font-size: 12px; color: #777; text-align: center;">
                © {{ now()->year }} Idarma Digital Technology. Seluruh hak cipta dilindungi.
            </td>
        </tr>
    </table>
</body>
</html>
