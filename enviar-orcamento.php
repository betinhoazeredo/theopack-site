<?php
/**
 * THEOPACK — Backend de Orçamento
 * ─────────────────────────────────────────────────────────
 * Arquivo: enviar-orcamento.php
 * Hospedagem: Hostinger (PHP 8.x)
 *
 * O que faz quando recebe um orçamento do site:
 *   1. Cria oportunidade no Omie CRM
 *   2. Envia e-mail para betinho.azeredo@gmail.com
 *   3. Envia e-mail para betinho@theopack.com.br
 *   4. Retorna link do WhatsApp para o JS abrir no cliente
 *
 * INSTALAÇÃO:
 *   - Faça upload deste arquivo para a raiz do seu site na Hostinger
 *     (mesma pasta do index.html ou do WordPress)
 *   - Configure as variáveis SMTP abaixo com os dados do seu e-mail Hostinger
 * ─────────────────────────────────────────────────────────
 */

// ── CORS — permite chamadas do seu próprio domínio ────────
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'erro' => 'Método inválido.']);
    exit;
}

// ════════════════════════════════════════════════════════
// ╔══════════════════════════════════════════════════════╗
// ║              CONFIGURAÇÕES — EDITE AQUI              ║
// ╚══════════════════════════════════════════════════════╝
// ════════════════════════════════════════════════════════

// ── OMIE ──────────────────────────────────────────────────
define('OMIE_APP_KEY',    '3574648758681');
define('OMIE_APP_SECRET', '16a507b9ccd38cde0e0ee1e28828bbd3');
define('OMIE_API_URL',    'https://app.omie.com.br/api/v1/crm/oportunidades/');

// ── E-MAILS DESTINATÁRIOS ─────────────────────────────────
define('EMAIL_1', 'betinho.azeredo@gmail.com');
define('EMAIL_2', 'betinho@theopack.com.br');

// ── SMTP HOSTINGER ────────────────────────────────────────
// Encontre no painel Hostinger → E-mails → Gerenciar → Configurações SMTP
define('SMTP_HOST',     'smtp.hostinger.com');   // host SMTP da Hostinger
define('SMTP_PORT',     465);                     // 465 (SSL) ou 587 (TLS)
define('SMTP_USER',     'vendas@theopack.com.br'); // ← troque pelo seu e-mail
define('SMTP_PASS',     'SUA_SENHA_EMAIL');        // ← troque pela sua senha
define('EMAIL_FROM',    'vendas@theopack.com.br'); // remetente
define('EMAIL_FROM_NAME', 'Theopack — Site');

// ── WHATSAPP ──────────────────────────────────────────────
define('WHATSAPP_NUMBER', '5547996181452'); // 55 + DDD + número (sem traços)

// ════════════════════════════════════════════════════════
// ╔══════════════════════════════════════════════════════╗
// ║                  LÓGICA PRINCIPAL                    ║
// ╚══════════════════════════════════════════════════════╝
// ════════════════════════════════════════════════════════

// ── Recebe e sanitiza os dados ────────────────────────────
$dados = json_decode(file_get_contents('php://input'), true);
if (!$dados) {
    $dados = $_POST; // fallback form-data
}

$nome    = sanitizar($dados['nome']    ?? '');
$empresa = sanitizar($dados['empresa'] ?? '');
$tel     = sanitizar($dados['tel']     ?? '');
$email   = sanitizar($dados['email']   ?? '');
$produto = sanitizar($dados['produto'] ?? '');
$msg     = sanitizar($dados['mensagem'] ?? '');

if (empty($nome) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['ok' => false, 'erro' => 'Nome e e-mail são obrigatórios.']);
    exit;
}

$dataHora = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('d/m/Y H:i');

$resultado = [
    'ok'      => false,
    'omie'    => false,
    'email'   => false,
    'wa_link' => '',
    'erros'   => [],
];

// ── 1. OMIE CRM ───────────────────────────────────────────
$observacao = implode("\n", [
    "Orçamento via Site — " . ($empresa ?: 'Não informado'),
    "Contato: $nome",
    "Telefone: " . ($tel ?: 'Não informado'),
    "E-mail: $email",
    "Produto: " . ($produto ?: 'Não selecionado'),
    "Mensagem: " . ($msg ?: 'Sem mensagem'),
    "Data/Hora: $dataHora",
]);

$omiePayload = json_encode([
    'call'       => 'IncluirOportunidade',
    'app_key'    => OMIE_APP_KEY,
    'app_secret' => OMIE_APP_SECRET,
    'param'      => [[
        'identificacao' => [
            'cCodIntOp' => 'SITE-' . time(),
            'cDesOp'    => 'Orçamento Site — ' . ($empresa ?: $nome),
        ],
        'envolvidos'  => new stdClass(),
        'observacoes' => ['cObsOp' => $observacao],
    ]]
]);

$omieResp = curlPost(OMIE_API_URL, $omiePayload, ['Content-Type: application/json']);
$omieData = json_decode($omieResp, true);

if (isset($omieData['faultstring'])) {
    $resultado['erros'][] = 'Omie: ' . $omieData['faultstring'];
} else {
    $resultado['omie'] = true;
}

// ── 2. E-MAILS ────────────────────────────────────────────
$assunto = "🔔 Novo Orçamento — $nome" . ($empresa ? " ($empresa)" : '');

$corpoHtml = "
<!DOCTYPE html>
<html lang='pt-BR'>
<head><meta charset='UTF-8'></head>
<body style='font-family:Arial,sans-serif;background:#f4f4f4;margin:0;padding:20px'>
  <div style='max-width:560px;margin:0 auto;background:#ffffff;border-radius:4px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,.1)'>
    <div style='background:#0A2E7A;padding:24px 32px;display:flex;align-items:center'>
      <div>
        <div style='color:#ffffff;font-size:22px;font-weight:700;letter-spacing:2px'>THEOPACK</div>
        <div style='color:#7A9ECC;font-size:12px;letter-spacing:1px;margin-top:2px'>NOVO ORÇAMENTO VIA SITE</div>
      </div>
    </div>
    <div style='padding:32px'>
      <table style='width:100%;border-collapse:collapse'>
        <tr><td style='padding:10px 0;border-bottom:1px solid #eee;color:#888;font-size:12px;text-transform:uppercase;letter-spacing:1px;width:130px'>Nome</td><td style='padding:10px 0;border-bottom:1px solid #eee;font-size:15px;color:#222'>$nome</td></tr>
        <tr><td style='padding:10px 0;border-bottom:1px solid #eee;color:#888;font-size:12px;text-transform:uppercase;letter-spacing:1px'>Empresa</td><td style='padding:10px 0;border-bottom:1px solid #eee;font-size:15px;color:#222'>" . ($empresa ?: '—') . "</td></tr>
        <tr><td style='padding:10px 0;border-bottom:1px solid #eee;color:#888;font-size:12px;text-transform:uppercase;letter-spacing:1px'>Telefone</td><td style='padding:10px 0;border-bottom:1px solid #eee;font-size:15px;color:#222'>" . ($tel ?: '—') . "</td></tr>
        <tr><td style='padding:10px 0;border-bottom:1px solid #eee;color:#888;font-size:12px;text-transform:uppercase;letter-spacing:1px'>E-mail</td><td style='padding:10px 0;border-bottom:1px solid #eee;font-size:15px;color:#0A2E7A'><a href='mailto:$email' style='color:#0A2E7A'>$email</a></td></tr>
        <tr><td style='padding:10px 0;border-bottom:1px solid #eee;color:#888;font-size:12px;text-transform:uppercase;letter-spacing:1px'>Produto</td><td style='padding:10px 0;border-bottom:1px solid #eee;font-size:15px;color:#CC1520;font-weight:600'>" . ($produto ?: '—') . "</td></tr>
        <tr><td style='padding:10px 0;color:#888;font-size:12px;text-transform:uppercase;letter-spacing:1px;vertical-align:top'>Mensagem</td><td style='padding:10px 0;font-size:14px;color:#444;line-height:1.6'>" . nl2br(htmlspecialchars($msg ?: '—')) . "</td></tr>
      </table>
      <div style='margin-top:24px;padding:16px;background:#f8f9fa;border-left:3px solid #CC1520;font-size:12px;color:#888'>
        Recebido em: <strong>$dataHora</strong> (Horário de Brasília)
      </div>
      <div style='margin-top:24px;text-align:center'>
        <a href='https://wa.me/$tel' style='display:inline-block;padding:12px 28px;background:#25D366;color:#fff;font-weight:700;text-decoration:none;border-radius:2px;font-size:14px;margin-right:8px'>Responder no WhatsApp</a>
        <a href='mailto:$email' style='display:inline-block;padding:12px 28px;background:#0A2E7A;color:#fff;font-weight:700;text-decoration:none;border-radius:2px;font-size:14px'>Responder por E-mail</a>
      </div>
    </div>
    <div style='background:#0B0F14;padding:16px 32px;text-align:center;font-size:11px;color:#555'>
      theopack.com.br · vendas@theopack.com.br · (47) 99618-1452
    </div>
  </div>
</body>
</html>";

// Envia para os 2 destinatários
$emailEnviado1 = enviarEmailSMTP(EMAIL_1, $assunto, $corpoHtml);
$emailEnviado2 = enviarEmailSMTP(EMAIL_2, $assunto, $corpoHtml);

if ($emailEnviado1 || $emailEnviado2) {
    $resultado['email'] = true;
} else {
    $resultado['erros'][] = 'E-mail: falha ao enviar. Verifique as configurações SMTP.';
}

// ── 3. WHATSAPP LINK ──────────────────────────────────────
$waMensagem = urlencode(
    "🔔 *Novo Orçamento — Theopack*\n\n" .
    "👤 *Nome:* $nome\n" .
    "🏢 *Empresa:* " . ($empresa ?: 'Não informado') . "\n" .
    "📞 *Telefone:* " . ($tel ?: 'Não informado') . "\n" .
    "📧 *E-mail:* $email\n" .
    "📦 *Produto:* " . ($produto ?: 'Não selecionado') . "\n" .
    "💬 *Mensagem:* " . ($msg ?: 'Sem mensagem') . "\n" .
    "🕐 *Data/Hora:* $dataHora"
);
$resultado['wa_link'] = "https://wa.me/" . WHATSAPP_NUMBER . "?text=" . $waMensagem;

// ── Resultado final ───────────────────────────────────────
$resultado['ok'] = $resultado['omie'] || $resultado['email'];
echo json_encode($resultado, JSON_UNESCAPED_UNICODE);


// ════════════════════════════════════════════════════════
// ╔══════════════════════════════════════════════════════╗
// ║                    FUNÇÕES AUXILIARES                ║
// ╚══════════════════════════════════════════════════════╝
// ════════════════════════════════════════════════════════

function sanitizar(string $valor): string {
    return htmlspecialchars(strip_tags(trim($valor)), ENT_QUOTES, 'UTF-8');
}

function curlPost(string $url, string $body, array $headers = []): string {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $body,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);
    $resp = curl_exec($ch);
    curl_close($ch);
    return $resp ?: '{}';
}

function enviarEmailSMTP(string $para, string $assunto, string $corpoHtml): bool {
    // Hostinger suporta PHP mail() nativo ou SMTP via socket
    // Usando SMTP direto com stream_socket_client (sem PHPMailer)
    try {
        $host    = SMTP_HOST;
        $port    = SMTP_PORT;
        $user    = SMTP_USER;
        $pass    = SMTP_PASS;
        $from    = EMAIL_FROM;
        $fromName = EMAIL_FROM_NAME;

        $proto   = ($port === 465) ? 'ssl' : 'tls';
        $context = stream_context_create([
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ]
        ]);

        $sock = stream_socket_client(
            "{$proto}://{$host}:{$port}",
            $errno, $errstr, 15,
            STREAM_CLIENT_CONNECT,
            $context
        );
        if (!$sock) return false;

        $boundary = md5(uniqid());

        $leitura = function() use ($sock) {
            $resp = '';
            while ($line = fgets($sock, 515)) {
                $resp .= $line;
                if (substr($line, 3, 1) === ' ') break;
            }
            return $resp;
        };

        $cmd = function(string $c) use ($sock, $leitura) {
            fwrite($sock, $c . "\r\n");
            return $leitura();
        };

        $leitura(); // banner
        $cmd("EHLO theopack.com.br");
        if ($port === 587) {
            $cmd("STARTTLS");
            stream_socket_enable_crypto($sock, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            $cmd("EHLO theopack.com.br");
        }
        $cmd("AUTH LOGIN");
        $cmd(base64_encode($user));
        $cmd(base64_encode($pass));
        $cmd("MAIL FROM:<{$from}>");
        $cmd("RCPT TO:<{$para}>");
        $cmd("DATA");

        $headers  = "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <{$from}>\r\n";
        $headers .= "To: {$para}\r\n";
        $headers .= "Subject: =?UTF-8?B?" . base64_encode($assunto) . "?=\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= "Content-Transfer-Encoding: base64\r\n";
        $headers .= "X-Mailer: Theopack-Site/1.0\r\n";

        fwrite($sock, $headers . "\r\n" . chunk_split(base64_encode($corpoHtml)) . "\r\n.\r\n");
        $resp = $leitura();
        $cmd("QUIT");
        fclose($sock);

        return strpos($resp, '250') !== false;

    } catch (Throwable $e) {
        error_log('[Theopack Email] ' . $e->getMessage());
        return false;
    }
}
