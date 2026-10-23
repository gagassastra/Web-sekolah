<?php
$file = 'Referensi/biodata guru,kepala dan operator semuanya.xlsx';
$zip = new ZipArchive;
if ($zip->open($file) === TRUE) {
    $sharedStrings = [];
    if (($xml = $zip->getFromName('xl/sharedStrings.xml')) !== false) {
        $sx = simplexml_load_string($xml);
        foreach ($sx->si as $si) {
            $sharedStrings[] = (string)($si->t ?? $si->r->t ?? '');
        }
    }
    
    if (($xml = $zip->getFromName('xl/worksheets/sheet1.xml')) !== false) {
        $sx = simplexml_load_string($xml);
        $headers = [];
        foreach ($sx->sheetData->row as $row) {
            $r = (int)$row['r'];
            $cols = [];
            foreach ($row->c as $c) {
                $ref = preg_replace('/[0-9]/', '', (string)$c['r']);
                $type = (string)$c['t'];
                $val = (string)$c->v;
                if ($type === 's' && isset($sharedStrings[(int)$val])) {
                    $val = $sharedStrings[(int)$val];
                }
                $cols[$ref] = $val;
            }
            if ($r === 1 || $r === 5) {
                // Header row check
                echo "ROW $r: " . implode(' | ', $cols) . "\n";
            } else if ($r <= 12) {
                echo "ROW $r: " . json_encode($cols, JSON_UNESCAPED_UNICODE) . "\n";
            }
        }
    }
    $zip->close();
}
