<?php
    $xml = new DOMDocument();
    $internalErrors = libxml_use_internal_errors(true);

   
    function task4($xml) {
        // Получаем HTML из текстового поля
        $html = $_POST['textarea'];
    
        // Паттерны для обезличенных местоимений и междометий с суффиксами
        $patterns = [
            '/\b(кто|где|что|как|когда|зачем|почему|каком|вот|так|туда|сюда|тут|здесь)\s+то\b/ui', // кто то -> кто-то
            '/\b(кое|вот|вон|либо|нибудь)\s+(что|где|как|кого|кто|куда|почему|так|там|такой|туда|сюда|тут)\b/ui', // кое что -> кое-что
            '/\b(вот|вон)\s+и\s+не\s+/ui'  // добавим примеры фраз, которые нужно соединить дефисом
        ];
        
        // Замены для каждого паттерна
        $replacements = [
            '$1-то',     // кто-то, где-то и т.д.
            '$1-$2',     // кое-что, вот-так и т.д.
            '$1-и'       // дефисы в сочетаниях
        ];
        
        // Выполняем замену и выводим результат
        $result = preg_replace($patterns, $replacements, $html);
    
        // Выводим заголовок и результат
        echo "<h3 id='task4'> Задание 4 (Автоматически расставить дефисы): </h3>";
        echo "<p>$result</p>";
    }
    
    
    

    function task7($xml) {
        $html = $_POST['textarea']; 
        $xml->loadHTML($html);
        $xml->preserveWhiteSpace = false;
        $content = "<h3 id='task7'> Задание 7 (Удалить повторяющиеся знаки препинания): </h3>";
        echo $content;
        // Задание массива паттернов для поиска многоточий, вопросов, знаков вопроса или запятых
		$patterns = array();
		$patterns[0] = '/\.{3,}/';
		$patterns[1] = '/\!{4,}/';
		$patterns[2] = '/\?{4,}/';
		$patterns[3] = '/\,{2,}/';
		
		// Задание массива для замен на одно троеточие, три восклицательных и вопросительных знака, 
		// одну запятую :
		$replacements = array();
		$replacements[3] = '…';
		$replacements[2] = '!!!';
		$replacements[1] = '???';
		$replacements[0] = ',';
		
		$result = preg_replace($patterns, $replacements, $html);

        // Проверяем, были ли выполнены замены
        if ($result !== $html) {
            // Выводим замененный текст
            echo $result;
        } else {
            // Если не было замен, выводим сообщение
            echo "Не найдено повторяющихся знаков препинания";
        }
    }




    function task11($xml) {
        $html = $_POST['textarea']; 
        $xml->loadHTML('<?xml encoding="UTF-8">' . $html);
        $xml->preserveWhiteSpace = false;
    
        // Ищем заголовки H1, H2 и H3
        $headers = [];
        foreach ($xml->getElementsByTagName('h1') as $h1) {
            $id = 'h1_' . uniqid(); // Уникальный id для каждого заголовка
            $headers[] = ['tag' => 'h1', 'text' => trim($h1->nodeValue), 'id' => $id];
            $h1->setAttribute('id', $id); // Присваиваем id каждому заголовку
        }
        foreach ($xml->getElementsByTagName('h2') as $h2) {
            $id = 'h2_' . uniqid();
            $headers[] = ['tag' => 'h2', 'text' => trim($h2->nodeValue), 'id' => $id];
            $h2->setAttribute('id', $id);
        }
        foreach ($xml->getElementsByTagName('h3') as $h3) {
            $id = 'h3_' . uniqid();
            $headers[] = ['tag' => 'h3', 'text' => trim($h3->nodeValue), 'id' => $id];
            $h3->setAttribute('id', $id);
        }
    
        // Обрезаем заголовки, если они длиннее 50 символов
        foreach ($headers as &$header) {
            if (mb_strlen($header['text']) > 50) {
                $header['text'] = mb_substr($header['text'], 0, 50) . '...';
            }
        }
    
        // Строим оглавление
        $content = "<h3 id='task11'> Задание 11 (Автоматическое оглавление): </h3>";
        $content .= "<ul>";
    
        foreach ($headers as $header) {
            if ($header['tag'] == 'h1') {
                $content .= "<li><a href='#{$header['id']}'>" . htmlspecialchars($header['text']) . "</a>";
            }
            if ($header['tag'] == 'h2') {
                $content .= "<ul><li><a href='#{$header['id']}'>" . htmlspecialchars($header['text']) . "</a></li></ul>";
            }
            if ($header['tag'] == 'h3') {
                $content .= "<ul><li><a href='#{$header['id']}'>" . htmlspecialchars($header['text']) . "</a></li></ul>";
            }
        }
    
        $content .= "</ul>";
    
        // Выводим оглавление
        echo $content;
    
        // Выводим полный текст
        echo "<div class='full-text'>" . $xml->saveHTML() . "</div>";

        // Форма для повторной отправки
        echo "<br><br>";
        echo "<form method='POST' action='text.php'>
            <textarea name='textarea' class='w-100 form-control' style='height: 300px;'>$html</textarea>
            <br>
            <button type='submit' name='lesgooo' class='btn btn-secondary'>Отправить</button>
        </form>";
    }
    


    
    function task18($xml) {
        $html = $_POST['textarea']; 
        $xml->loadHTML('<?xml encoding="UTF-8">' . $html);
        $xml->preserveWhiteSpace = false;
    
        $content = "<h3 id='task18'> Задание 18 (Подсветить в тексте литературные повторы): </h3>";
        echo $content;
    
        // Получаем все абзацы
        $paragraphs = $xml->getElementsByTagName('p');
    
        foreach ($paragraphs as $p) {
            $text = $p->ownerDocument->saveHTML($p);  // Сохраняем HTML целого абзаца
    
            // Приводим текст к нижнему регистру и разбиваем на слова
            preg_match_all('/\b\w+\b/ui', $text, $matches);
            $wordCount = array_count_values($matches[0]);

            // Подсветка повторяющихся слов, встречающихся более 3 раз в абзаце
            $text = preg_replace_callback('/\b\w+\b/ui', function($match) use ($wordCount) {
                $word = mb_strtolower($match[0]); // Приводим слово к нижнему регистру для корректного подсчета
    
                // Если слово повторяется более 3 раз в текущем абзаце, подсвечиваем его
                if (isset($wordCount[$word]) && $wordCount[$word] >= 3) {
                    return "<span class='highlight'>{$match[0]}</span>";
                }
    
                return $match[0]; // Возвращаем слово без изменений
            }, $text);            
        // Отладка: выводим измененный текст
        echo "<pre>$text</pre>";
        }
    }