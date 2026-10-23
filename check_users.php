<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=ujian_sekolah', 'root', '');
    $stmt = $pdo->query("SELECT id, name, email, role, nisn FROM users WHERE role != 'siswa'");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo json_encode($row) . "\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
