

$form = $_POST(['form']);
$tab = json_decode($form);

foreach ($tab as $row) {
        $type = $row['type'];
        $options = $row['options'];


        switch ($type) {
                case 'avancer':
                        avancer($pas);
                        break;
                case 'mesure':
                        mesure($pas);
                        break;
                case 'reculer':
                        reculer($pas);
                        break;
                case 'goder':
                        goder($pas);
                        break;
                case 'photo':
                        photo($pas);
        }
}

