<?php
if ($argc < 3) {
    echo "Usage: php generate_pdf.php <template> <output>\n";
    exit(1);
}
$template = $argv[1];
$output = $argv[2];
$data = [
    'fields' => [
        [
            'page' => 0,
            'x' => 50,
            'y' => 50,
            'value' => 'Account Number: 12345678'
        ],
    ],
    'transactions' => [
        ['date' => '2023-06-01', 'memo' => 'Deposit', 'amount' => '100.00'],
        ['date' => '2023-06-02', 'memo' => 'Withdrawal', 'amount' => '-20.00'],
    ]
];
$tmpJson = tempnam(sys_get_temp_dir(), 'pdf');
file_put_contents($tmpJson, json_encode($data));
$cmd = escapeshellcmd("python3 " . __DIR__ . "/generate_pdf.py " . escapeshellarg($template) . " " . escapeshellarg($tmpJson) . " " . escapeshellarg($output));
`$cmd`;
unlink($tmpJson);
echo "Generated PDF saved to $output\n";
?>
