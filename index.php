$types = $_POST['types'];
$options = $_POST['options];

foreach ($types as $key => $type) {
        $pas = $options[$key];

        switch ($type) {
                case 'avancer':
                        $state = avancer($pas);
                        break;
                case 'mesure':
                        $state = mesure($pas);
                        break;
                case 'reculer':
                        $state = reculer($pas);
                        break;
                case 'goder':
                        $state = goder($pas);
                        break;
                case 'photo':
                        $state = photo($pas);
        }
}

echo $state;

